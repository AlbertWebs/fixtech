<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->text(),
            'slug' => Str::slug($this->faker->text()),
            'description' => $this->faker->paragraph()
        ];
    }
}
