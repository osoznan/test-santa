<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Faker\Factory;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Factory::create();

        $this->callOnce(UserSeeder::class);

        $items = [];
        for ($i = 0; $i < 10; $i++) {
            $items[] = [
                'user_id' => random_int(1, 5),
                'created_at' => $faker->dateTime()
            ];
        }

        Order::insert($items);
    }
}
