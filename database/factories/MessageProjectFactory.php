<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\MessageProject;
use App\Models\ProjectResponse;
use App\Models\User;

class MessageProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MessageProject::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'sender_id' => User::factory(),
            'receiver_id' => User::factory(),
            'projectResponse_id' => ProjectResponse::factory(),
            'body' => $this->faker->text,
            'is_read' => $this->faker->randomElement(["1","0"]),
        ];
    }
}
