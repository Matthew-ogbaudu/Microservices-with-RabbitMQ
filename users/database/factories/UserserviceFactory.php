<?php

namespace Database\Factories;

use App\Models\Userservice;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserserviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Userservice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
        ];
    }
}
