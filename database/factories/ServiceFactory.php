<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Freelance;
use App\Models\Service;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text,
            'basic_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'basic_support' => $this->faker->word,
            'basic_revision' => $this->faker->numberBetween(-10000, 10000),
            'basic_delivery_time' => $this->faker->numberBetween(-10000, 10000),
            'premium_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'premium_support' => $this->faker->word,
            'premium_revision' => $this->faker->numberBetween(-10000, 10000),
            'premium_delivery_time' => $this->faker->numberBetween(-10000, 10000),
            'extra_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'extra_support' => $this->faker->word,
            'extra_revision' => $this->faker->numberBetween(-10000, 10000),
            'extra_delivery_time' => $this->faker->numberBetween(-10000, 10000),
            'samples' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'files' => $this->faker->word,
            'format' => $this->faker->word,
            'video_url' => $this->faker->word,
            'view_count' => $this->faker->numberBetween(-100000, 100000),
            'like' => $this->faker->numberBetween(-100000, 100000),
            'is_publish' => $this->faker->randomElement(["0","1"]),
            'freelance_id' => Freelance::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
