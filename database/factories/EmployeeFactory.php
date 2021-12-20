<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'hire_date' => $this->faker->date(),
            'phone' => $this->faker->e164PhoneNumber(),
            'gender' => $this->faker->randomElement(['M','F']),
            'salary' => $this->faker->randomFloat(2, 0, 100000)
        ];
    }
}
