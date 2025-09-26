<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use App\Models\User;

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
        // Garantáljuk, hogy $coolMinTemp < $coolMaxTemp
        $coolMinTemp = $this->faker->numberBetween(-25, 10);
        $coolMaxTemp = $this->faker->numberBetween($coolMinTemp + 1, 45);
		
		// Garantáljuk, hogy $heatMinTemp < $heatMaxTemp
        $heatMinTemp = $this->faker->numberBetween(-25, 10);
        $heatMaxTemp = $this->faker->numberBetween($heatMinTemp + 1, 45);

        return [
			'user_id' => User::factory(),
            'brand_id' => Brand::factory(),
            'name' => $this->faker->word . ' Klima',
            'image' => $this->faker->imageUrl(640, 480, 'technics'),
            'price' => $this->faker->randomFloat(2, 200, 5000),
            'description' => $this->faker->sentence(),

            'cooling_capacity' => $this->faker->randomFloat(2, 2, 6), // kW
            'heating_capacity' => $this->faker->randomFloat(2, 2, 6), // kW

            'seer' => $this->faker->randomFloat(2, 3, 10), // hatékonyság
            'scop' => $this->faker->randomFloat(2, 3, 6),  // hatékonyság

            'noise_level' => $this->faker->numberBetween(20, 70), // dB
            'warranty_years' => $this->faker->numberBetween(1, 5),

			'cooling_min_temp' => $coolMinTemp,
            'cooling_max_temp' => $coolMaxTemp,
			
            'heating_min_temp' => $heatMinTemp,
            'heating_max_temp' => $heatMaxTemp,

            'wifi_enabled' => $this->faker->boolean(),
            'refrigerant_type' => $this->faker->randomElement(['R32', 'R410A', 'R290']),
            'extra_filter' => $this->faker->boolean(),
			
			'h_tarifa' => $this->faker->boolean(),
			'in_stock' => $this->faker->boolean(),
			'featured' => $this->faker->boolean(),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
