<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Freelance;
use App\Models\Service;
use App\Models\SubCategory;

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
        $freelance=Freelance::inRandomOrder()->first();

        $category=Category::find($freelance->category_id)->id;

        $sousCategory=SubCategory::where('category_id',$category)->Limit(2)->get();
        foreach($sousCategory as $SubCategory){
            $sousCat[]=$SubCategory->name;
        };
        
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text,
            'basic_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'basic_support' => "<li>number 2</li><li>number 2</li>",
            'basic_revision' => $this->faker->numberBetween(1, 10),
            'basic_delivery_time' => $this->faker->numberBetween(-10000, 10000),
            //'premium_price' => $this->faker->randomFloat(2, 0, 999999.99),
            //'premium_support' => $this->faker->word,
            //'premium_revision' => $this->faker->numberBetween(-10000, 10000),
            //'premium_delivery_time' => $this->faker->numberBetween(-10000, 10000),
            //'extra_price' => $this->faker->randomFloat(2, 0, 999999.99),
            //'extra_support' => $this->faker->word,
            //'extra_revision' => $this->faker->numberBetween(-10000, 10000),
            //'extra_delivery_time' => $this->faker->numberBetween(-10000, 10000),
            'samples' => $this->faker->regexify('[A-Za-z0-9]{500}'),
            'files' => ['https://source.unsplash.com/200x200/?fashion?2',$this->faker->imageUrl()],
            'format' => $this->faker->word,
             'sub_categorie' =>  $sousCat,
            //'video_url' => $this->faker->word,
            'view_count' =>0,
            'like' => 0,
            'is_publish' => $this->faker->randomElement(["0","1"]),
            'freelance_id' => $freelance->id,
            'category_id' => $category,
        ];
    }
}
