<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
use App\Models\Klima;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'sbs',
            'email' => 'sbslord@gmail.com',
			'phone' => '06302084302',
			'password' => Hash::make('asdasd123')
        ]);
		
		 // 5 brand és mindegyikhez 5 klíma
        Brand::factory()
            ->count(5)
            ->has(Klima::factory()->count(5))
            ->create();

        // + opcionálisan további klímák random branddel
        Klima::factory()->count(10)->create();
		
		//20 Contact-t hozzáadása
		Contact::factory()->count(20)->create();
		
		//Felhasználóhoz kötve
		Contact::factory()->count(5)->create([
			'user_id' => $user->id,
		]);
		
    }
}
