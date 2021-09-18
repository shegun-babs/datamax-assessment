<?php

namespace App\Domain\Book\Controllers;

use App\Domain\Book\DTOs\BookDataCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchBookController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $bookApiUrl = sprintf("%s?%s=%s", config('services.misc.fire_n_ice_api_url'), 'name', $request->query('name'));
        $response = Http::withOptions(['ssl' => ['allow_self_signed' => true]])->get($bookApiUrl);

        $bookDataCollection = BookDataCollection::create($response->json());
        $responseBody = [
            "status_code" => $response->status(),
            "status" => "success",
        ];

        if ($bookDataCollection->count() > 0)
        {
            $bookResponse = $this->getDataFromCollection($bookDataCollection);
            return response()->json(
                array_merge($responseBody, ["data" => $bookResponse])
            );
        }

        return response()->json(
            array_merge($responseBody, ["data" => []])
        );
    }


    private function getDataFromCollection(BookDataCollection $collection): array {
        $responseArray = [];
        foreach ( $collection as $bookData ){
            $responseArray[] = [
                "name" => $bookData->name,
                "isbn" => $bookData->isbn,
                "authors" => $bookData->authors,
                "number_of_pages" => $bookData->numberOfPages,
                "publisher" => $bookData->publisher,
                "country" => $bookData->country,
                "released" => $bookData->released,
            ];
        }
        return $responseArray;
    }
}
