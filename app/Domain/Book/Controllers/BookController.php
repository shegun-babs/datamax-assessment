<?php


namespace App\Domain\Book\Controllers;


use App\Domain\Book\Actions\ResponseHelper;
use App\Domain\Book\Models\Book;
use App\Domain\Book\Traits\BookValidationRules;
use App\Domain\Book\Transformers\BookCollectionTransformer;
use App\Domain\Book\Transformers\BookTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class  BookController
{
    use BookValidationRules;

    public function index(Request $request, ResponseHelper $responseHelper): JsonResponse
    {
        $hasQuery = $request->hasAny(['name', 'country', 'publisher', 'release_date']);
        $limit = $request->query('limit');

        $books = $hasQuery
            ? Book::where($request->all())->get()
            : ( $limit ?  Book::limit($limit)->get() : Book::all() );

        if ($books->count())
        {
            $responseHelper->setStatusCode(200)->setStatus("success")
                ->setData((new BookCollectionTransformer($books))->toArray());

            return response()->json($responseHelper->toArray());
        }

        return response()->json(
            $responseHelper->setStatusCode(200)->setStatus("success")->setData([])->toArray()
        );
    }


    public function store(Request $request, ResponseHelper $responseHelper): JsonResponse
    {
        $validator = Validator::make($request->all(), $this->rulesForStore());

        if ($validator->fails()) {
            return response()->json(
                $responseHelper->setStatusCode(422)->setStatus("error")->setData([$validator->errors()])->toArray(),
                $responseHelper->status_code);
        }

        $book = Book::create($request->all());
        return response()->json(
            $responseHelper->setStatusCode(201)
                ->setStatus("success")
                ->setData(["book" => (new BookTransformer($book))->toArray()])
                ->toArray(),
            $responseHelper->status_code);
    }


    public function show($id, ResponseHelper $responseHelper)
    {
        return response()->json(
            $responseHelper->setStatusCode(200)->setStatus("success")
                ->setData((new BookTransformer(Book::findOrFail($id)))->toArray())
                ->toArray()
        );
    }


    public function update(Request $request, $id, ResponseHelper $responseHelper)
    {
        $validator = Validator::make($request->all(), $this->rulesForUpdate());

        if ($validator->fails()) {
            return response()->json(
                $responseHelper->setStatusCode(422)->setStatus("error")->setData([$validator->errors()])->toArray(),
                $responseHelper->status_code);
        }

        $book = tap(Book::findOrFail($id))->update($validator->validated());

        return response()->json(
            $responseHelper->setStatusCode(200)->setStatus("success")
                ->setMessage("The book {$book->name} was updated successfully")
                ->setData((new BookTransformer($book))->toArray())->toArray()
        );
    }


    public function destroy($id, ResponseHelper $responseHelper)
    {
        $book = Book::findOrFail($id);
        $bookName = $book->name;

        if ( $book->delete() )
        {
            return response()->json(
                $responseHelper->setStatusCode(204)
                    ->setStatus("success")
                    ->setMessage("The book {$bookName} was deleted successfully")
                    ->setData([])->toArray()
            );
        }
    }
}
