<?php

use App\Domain\Book\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('can create a book', function(){
    $attributes = Book::factory()->raw();
    $response = $this->postJson('/api/v1/books', $attributes);
    $response->assertStatus(201)->assertJson(["status" => "success"]);
});


it ('can read/fetch books', function(){
    Book::factory(20)->create();

    $response = $this->getJson('/api/v1/books');
    $response->assertStatus(200)->assertJson(["status" => "success"]);
    $response->assertJson(
        fn (AssertableJson $json) => $json->has('data')->has('data', 20)->etc()
    );
});


it('can update a book', function (){
    $book = Book::factory()->create();
    $updatedName = ['name' => 'a game of shadows'];

    $response = $this->putJson("/api/v1/books/{$book->id}", $updatedName);
    $response->assertStatus(200)->assertJson(["status" => "success"]);
    $this->assertDatabaseHas('books', $updatedName);
});


it ('can delete a book', function(){
    $book = Book::factory()->create();
    $response = $this->deleteJson("/api/v1/books/{$book->id}");
    $response->assertStatus(200)->assertJson(["status_code" => 204, "status" => "success"]);
    $this->assertCount(0, Book::all());
});


it('can fetch a book', function (){
    $book = Book::factory()->create();
    $response = $this->getJson("/api/v1/books/{$book->id}");
    $response->assertStatus(200)->assertJson(["status" => "success"]);
    $this->assertDatabaseHas('books', ['id' => $book->id]);
});


it('can fetch 10 books', function (){
    Book::factory(20)->create();
    $response = $this->getJson("/api/v1/books?limit=10");
    $response->assertStatus(200)->assertJson(["status" => "success"]);
    $response->assertJson(
        fn (AssertableJson $json) => $json->has('data')->has('data', 10)->etc()
    );
});
