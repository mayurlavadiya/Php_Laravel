<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customers;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
        * Run the database seeds.
    */
    public function run()
    {
        $faker = Faker::create();
        for($i=1; $i<=100; $i++){
            $customers = new Customers;
            $customers->name = $faker->name;
            $customers->email = $faker->email;
            $customers->gender = "Male";
            $customers->address = $faker->address;
            $customers->city = $faker->city;
            $customers->state = $faker->state;
            $customers->dob = $faker->date;
            $customers->status = "1";
            $customers->password = $faker->password;
            $customers->save();
        }
    }
}
