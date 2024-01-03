<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
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
        return [
            'user_id' => '1',
            'slug' => fake()->jobTitle(),
            'main_title' => fake()->jobTitle(),
            'topic_title' => fake()->unique()->jobTitle(),
            'content' => fake()->realText($maxNbChars = 200, $indexSize = 2),
            'tags' => json_encode(['PHP', 'Laravel', 'React']), // Örneğin, sabit etiketleri burada ekledik.
        ];
    }
}
