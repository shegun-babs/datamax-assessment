<?php

namespace Database\Factories;

use App\Domain\Book\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(20),
            'isbn' => (string) $this->faker->isbn13(),
            'authors' => $this->faker->name() . ", " . $this->faker->name(),
            'country' => $this->faker->country(),
            'number_of_pages' => $this->faker->randomNumber(3),
            'publisher' => $this->faker->randomElement(['Wrox', "O'Reily", 'Packt', 'Wrox', 'Manning', 'Apress']),
            'release_date' => $this->faker->date(),
        ];
    }
}
