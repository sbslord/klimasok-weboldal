<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Klima>
 */
class KlimaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Garantáljuk, hogy heating_min_temp < heating_max_temp
        $minTemp = $this->faker->numberBetween(-25, 10);
        $maxTemp = $this->faker->numberBetween($minTemp + 1, 45);

        return [
            'brand_id' => Brand::factory(),
            'name' => $this->faker->word . ' Klima',
            'image' => $this->faker->imageUrl(640, 480, 'technics'),
            'price' => $this->faker->randomFloat(2, 200, 5000),
            'description' => $this->faker->sentence(),

            'cooling_capacity' => $this->faker->randomFloat(2, 2, 6), // kW
            'heating_capacity' => $this->faker->randomFloat(2, 2, 6), // kW

            'cooling_energy_class' => $this->faker->randomElement(['A+', 'A++', 'A+++']),
            'heating_energy_class' => $this->faker->randomElement(['A+', 'A++', 'A+++']),

            'seer' => $this->faker->randomFloat(2, 3, 10), // hatékonyság
            'scop' => $this->faker->randomFloat(2, 3, 6),  // hatékonyság

            'noise_level' => $this->faker->numberBetween(20, 70), // dB
            'warranty_years' => $this->faker->numberBetween(1, 5),

            'heating_min_temp' => $minTemp,
            'heating_max_temp' => $maxTemp,

            'wifi_enabled' => $this->faker->boolean(),
            'refrigerant_type' => $this->faker->randomElement(['R32', 'R410A', 'R290']),
            'extra_filter' => $this->faker->randomElement(['Plasma', 'Nano Silver', null]),
			
			'h_tarifa' => $this->faker->boolean(),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
