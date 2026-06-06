<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'        => fake()->jobTitle(),
            'company_name' => fake()->company(),
            'salary'       => fake()->numberBetween(30000, 200000),
            'description'  => fake()->paragraphs(3, true),
            'location'     => fake()->city() . ', ' . fake()->state(),
            'category_id'  => Category::inRandomOrder()->first()?->id ?? 1,
            'status'       => Job::STATUS_APPROVED,
        ];
    }

    /** Indicate the listing is pending approval. */
    public function pending(): static
    {
        return $this->state(fn (array $attrs) => [
            'status' => Job::STATUS_PENDING,
        ]);
    }

    /** Indicate the listing is rejected. */
    public function rejected(): static
    {
        return $this->state(fn (array $attrs) => [
            'status' => Job::STATUS_REJECTED,
        ]);
    }
}
