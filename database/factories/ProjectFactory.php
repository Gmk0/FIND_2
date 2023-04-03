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
        $category=Category::inRandomOrder()->first()->id;
        return [
            'title' => $this->faker->sentence(4),
            'user_id' => 101,
            'category_id' => $category,
            'description' => $this->faker->text,
            'files' => '{}',
            'bid_amount' => $this->faker->randomFloat(2, 0, 999999.99),
            'begin_project' =>$this->faker->date(),
            'end_project' => $this->faker->date(),
            'status' => $this->faker->randomElement(["active","inactive","completed"]),
        ];
    }
}
