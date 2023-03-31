<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Freelance;
use App\Models\User;

class FreelanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Freelance::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word,
            'prenom' => $this->faker->word,
            'identifiant' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'description' => $this->faker->text,
            'langue' => '{}',
            'diplome' => '{}',
            'certificat' => '{}',
            'site' => $this->faker->word,
            'competences' => '{}',
            'taux_journalier' => $this->faker->randomFloat(2, 0, 999999.99),
            'comptes' => '{}',
            'Sub_categorie' => '{}',
            'localisation' => '{}',
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'level' => $this->faker->randomElement(["basic","premium","extra"]),
        ];
    }
}
