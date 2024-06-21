<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ProviderSeeder::class);
        $this->call(SubServiceSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(AboutUsCounterSeeder::class);
        $this->call(AdvantageSeeder::class);
        $this->call(TitleSeeder::class);
        $this->call(WhyUsSeeder::class);
        $this->call(SubServiceAvailabilitySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DistrictSeeder::class);




    }
}
