<?php


namespace App\Domain\Book\Controllers;


use App\Domain\Book\Actions\BookValidation;
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

    public function index()//: JsonResponse
    {
        $books = Book::all();
        $r = new BookCollectionTransformer($books);
        //return $r->toArray();

        return response()->json([
            "status_code" => 200,
            "status" => "success",
            "data" => $r->toArray(),
        ]);
    }


    public function store(Request $request): JsonResponse
    {
        $bookValidation = BookValidation::init();
        $validator = Validator::make($request->all(), $this->rulesForStore());

        if ($validator->fails())
        {
            return response()->json([
                "status_code" => 422,
                "status" => "error",
                "data" => [
                    $validator->errors()
                ],
            ]);
        }

        $book = Book::create($request->all());

        $bookTransformer = new BookTransformer($book);
        return response()->json([
            "status_code" => 201,
            "status" => "success",
            "data" => [
                [
                    "book" => $bookTransformer->toArray()
                ]
            ],
        ]);
    }


    public function show($id){}


    public function update(Request $request, $id){
        $formData = $request->all();
        $validator = Validator::make($request->all(), $this->rulesForUpdate());
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
