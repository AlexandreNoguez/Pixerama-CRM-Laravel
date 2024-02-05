<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'leadTitle' => Str::limit($this->faker->sentence(), 55),
            'leadName' => Str::limit($this->faker->name(), 55),
            'companyName' => Str::limit($this->faker->company(), 55),
            'leadStage' => $this->faker->randomElement(['New', 'WaitingApproval', 'OnGoing', 'Finished']),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'description' => Str::limit($this->faker->sentence(), 255),
        ];
    }
}
