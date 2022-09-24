<?php

namespace Database\Factories\Blog;

use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'content' => $this->faker->word(),
            'published_at' => $this->faker->randomElement([now(), null]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'is_featured' => $this->faker->boolean(),

            'user_id' => User::factory(),
            'blog_category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
        ];
    }
}
