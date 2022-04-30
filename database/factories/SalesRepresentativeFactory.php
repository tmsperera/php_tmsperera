<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Domain\SalesRepresentatives\Models\SalesRepresentative;

/**
 * @extends Factory
 */
class SalesRepresentativeFactory extends Factory
{
    protected $model = SalesRepresentative::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'telephone' => $this->faker->phoneNumber(),
            'joined_date' => $this->faker->date(),
            'route' => $this->faker->randomElement(array_keys(SalesRepresentative::ROUTES)),
            'comments' => $this->faker->text(),
        ];
    }
}
