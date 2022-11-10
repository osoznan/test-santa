<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = \Faker\Factory::create();

        $this->callOnce(OrderSeeder::class);

        $items = [];
        for ($i = 0; $i < 30; $i++) {
            $items[] = [
                'order_id' => random_int(1, 10),
                'name' => join(' ', $faker->words(3))
            ];
        }

        OrderItem::insert($items);
    }
}
