<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Freelance;
use App\Models\Project;
use App\Models\ProjectResponse;

class ProjectResponseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProjectResponse::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'freelance_id' => Freelance::factory(),
            'project_id' => Project::factory(),
            'content' => $this->faker->paragraphs(3, true),
            'bid_amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'status' => $this->faker->randomElement(["pending","approved","rejected"]),
        ];
    }
}
