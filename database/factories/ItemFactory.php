<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\User;
use App\Models\Category;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(1),
            'price' => $this->faker->randomNumber(5),
            'size' => $this->faker->sentence(1),
            'brand' => $this->faker->sentence(1),
            // 'user_id' => User::pluck('id')->random(),
            'category_id' => Category::pluck('id')->random(),
        ];
    }
}
