<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelicula>
 */
class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "titulo"=>ucfirst($this->faker->unique()->words(random_int(2,4), true)),
            "sinopsis"=>$this->faker->text(),
            "doblada"=>random_int(1,2),
            "duracion"=>$this->faker->numberBetween(1,8),
            "category_id"=>Category::all()->random()->id
        ];
    }
}
