<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Conversation;
use App\Models\Freelancer;
use App\Models\User;

class ConversationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conversation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'freelancer_id' => Freelancer::factory(),
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(["pending","finished"]),
        ];
    }
}
