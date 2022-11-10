<?php

namespace Database\Seeders;

use App\Models\UserCart;
use Illuminate\Database\Seeder;
use Faker\Factory;

class UserCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Factory::create();

        $this->callOnce(OrderItemSeeder::class);

        $items = [];
        for ($i = 1; $i <= 10; $i++) {
            $items[] = [
                'user_id' => random_int(1, 5),
                'name' => $faker->name,
                'created_at' => $faker->dateTime(),
            ];
        }

        UserCart::insert($items);
    }
}
