<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word.' '.$this->faker->uuid;
        return [
           'created_by_id'=> 21,
           'updated_by_id'=> 21,
            'name'=> $name,
            'slug'=> Str::slug($name),
            'status'=> Category::STATUS_ACTIVE,
            'description'=> $this->faker->paragraph,
            'image'=> $this->faker->imageUrl(Category::IMAGE_WIDTH, Category::IMAGE_HEIGHT),
        ];
    }
}
