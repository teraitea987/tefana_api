<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = \App\Models\Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Benjamin', 'Cadet', 'Poussin', 'Minime'];

        foreach ($categories as $category) {
            return [
                'name' => $category,
            ];
        }
    }
}
