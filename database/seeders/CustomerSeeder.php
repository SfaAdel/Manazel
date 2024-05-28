<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'customer1',
            'phone' => '01012076064',
            'gender' => 'female',
            'password' => bcrypt('password'),
        ]);
        Customer::create([
            'name' => 'بسنت',
            'phone' => '01012026064',
            'gender' => 'female',
            'password' => bcrypt('password'),
        ]);
        Customer::create([
            'name' => 'صفا',
            'phone' => '01012073064',
            'gender' => 'female',
            'password' => bcrypt('password'),
        ]);
        Customer::create([
            'name' => 'احمد',
            'phone' => '01012976064',
            'gender' => 'male',
            'password' => bcrypt('password'),
        ]);
    }
}
