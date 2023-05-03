<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Freelance;
use App\Models\SubCategory;
use App\Models\User;
use Faker\Provider\ar_SA\Address;

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
        $usersId = $this->getIdFreelancer();
        $category = Category::inRandomOrder()->first()->id;

        $sousCategory = SubCategory::where('category_id', $category)->Limit(3)->get();
        foreach ($sousCategory as $SubCategory) {
            $sousCat[] = $SubCategory->name;
        };

        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->firstName(),
            'identifiant' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'description' => $this->faker->text,
            'description' => $this->faker->text(200),
            'langue' => [[
                'langue' => $this->faker->randomElement(array('Francais', 'Anglais')),
                'level' => $this->faker->randomElement(array('Debutant', 'Intermediaire', 'Avancee')),
            ]],
            'diplome' => ['diplome' => 'FSI', 'universite' => $this->faker->city(), 'annee' => $this->faker->year('now')],
            'certificat' => [['certificate' => $this->faker->jobTitle(), 'delivrer' => $this->faker->company(), 'annee' => $this->faker->year('now')]],
            'site' => $this->faker->domainName(),
            'competences' => [['skill' => $this->faker->randomElement(array('Debutant', 'Intermediaire', 'Avancee')), 'level' => $this->faker->randomElement(array('Debutant', 'Intermediaire', 'Avancee'))]],
            'taux_journalier' => $this->faker->randomFloat(2, 0, 999.99),
            'comptes' => [[
                'tiktok' => $this->faker->userName(),
                'youtube' => $this->faker->userName()
            ]],
            'Sub_categorie' =>  $sousCat,
            'localisation' => [[
                'avenue' => $this->faker->Address(),
                'commune' => $this->faker->city(),
                'ville' => $this->faker->city()
            ]],
            'user_id' => $usersId,
            'category_id' => $category,
            'level' => $this->faker->randomElement(["basic", "premium", "extra"]),
        ];
    }

    public function getIdFreelancer()
    {

        $count = \App\Models\Freelance::all()->count();

        return $count + 1;
    }
}