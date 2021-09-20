<?php


namespace App\Domain\Book\Controllers;


use App\Domain\Book\Models\Book;
use App\Domain\Book\Traits\BookValidationRules;
use App\Domain\Book\Transformers\BookCollectionTransformer;
use App\Domain\Book\Transformers\BookTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController
{
    use BookValidationRules;

    public function index(Request $request): JsonResponse
    {
        $hasQuery = $request->hasAny(['name', 'country', 'publisher', 'release_date']);
        $limit = $request->query('limit');

        $books = $hasQuery
            ? Book::where($request->all())->get()
            : ( $limit ?  Book::limit($limit)->get() : Book::all() );

        if ($books->count())
        {
            return response()->json([
                "status_code" => 200,
                "status" => "success",
                "data" => (new BookCollectionTransformer($books))->toArray(),
            ], 200);
        }

        return response()->json([
            "status_code" => 200,
            "status" => "success",
            "data" => [],
        ], 200);
    }


    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), $this->rulesForStore());

        if ($validator->fails()) {
            return response()->json([
                "status_code" => 422,
                "status" => "error",
                "data" => [
                    $validator->errors()
                ],
            ], 422);
        }

        $book = Book::create($request->all());

        $bookTransformer = new BookTransformer($book);
        return response()->json([
            "status_code" => 201,
            "status" => "success",
            "data" => [
                    "book" => (new BookTransformer($book))->toArray()
            ],
        ], 201);
    }


    public function show($id)
    {
        return response()->json([
            "status_code" => 200,
            "status" => "success",
            "data" => (new BookTransformer(Book::findOrFail($id)))->toArray()
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rulesForUpdate());

        if ($validator->fails()) {
            return response()->json([
                "status_code" => 422,
                "status" => "error",
                "data" => [
                    $validator->errors()
                ],
            ], 422);
        }

        $book = tap(Book::findOrFail($id))->update($validator->validated());

        return response()->json([
            "status_code" => 200,
            "status" => "success",
            "message" => "The book {$book->name} was updated successfully",
            "data" => (new BookTransformer($book))->toArray(),
        ], 200);
    }


    public function destroy($id)
    {

        $book = Book::findOrFail($id);
        $bookName = $book->name;

        if ( $book->delete() )
        {
            return response()->json([
                "status_code" => 204,
                "status" => "success",
                "message" => "The book {$bookName} was deleted successfully",
                "data" => []
            ]);
        }
    }
}
