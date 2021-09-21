<?php

use Illuminate\Testing\Fluent\AssertableJson;

it('it sees external-books api url', function() {
    $bookName = "A Game of Thrones";
    $response = $this->get("/api/external-books?{$bookName}");
    $response->assertStatus(200)
        ->assertJson(["status" => "success"])
        ->assertJson(
        fn (AssertableJson $json) =>
            $json->has('status')
                ->has('data.0',  fn($json) =>
                    $json->where('name', $bookName)
                        ->etc()
                )
                ->etc()
    );
});
