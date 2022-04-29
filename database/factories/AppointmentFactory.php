<?php

namespace Database\Factories;

use App\Models\Organization;
use App\Models\Patient;
use App\Models\Practitioner;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->text(),
            'patient_id' => Patient::all()->random()->id,
            'practitioner_id' => Practitioner::all()->random()->id,
            'organization_id' => Organization::all()->random()->id,
        ];
    }
}
