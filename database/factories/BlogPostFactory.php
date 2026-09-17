<?php

namespace Database\Factories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'slug' => BlogPost::createUniqueSlug($title),
            'content' => $this->faker->paragraph(3),
            'created_at' => $this->faker->dateTimeBetween('2019-06-06', 'now'),
        ];
    }
}
