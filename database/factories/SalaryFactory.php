<?php

namespace Database\Factories;

use App\Models\Salary;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'salary' => $this->faker->numberBetween(20000,2000000),
            'from_date' => $this->faker->dateTimeBetween('-5 years', '-3 years'),
            'to_date' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
