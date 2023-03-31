<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'sub_category' => '{}',
            'description' => $this->faker->text,
            'files' => '{}',
            'bid_amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'delivery_time' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->randomElement(["active","inactive","completed"]),
        ];
    }
}
