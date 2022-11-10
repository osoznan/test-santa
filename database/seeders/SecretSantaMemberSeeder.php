<?php

namespace Database\Seeders;

use App\Models\SecretSantaMember;
use Illuminate\Database\Seeder;

class SecretSantaMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = \Faker\Factory::create();

        $this->callOnce(UserSeeder::class);

        $userIds = range(1, 10);

        // shuffle for random hierarchy
        shuffle($userIds);

        // select random users for membership (must be an even count of members)
        $memberIds = array_slice($userIds, 0, 6);

        // pairs of member -> child member
        $items = [];
        $i = 0;
        while ($i < count($memberIds)) {
            $items[] = [
                'user_id' => $memberIds[$i],
                'name' => $faker->name(),
                'child_id' => $memberIds[$i + 1] ?? $memberIds[0] // the last user is over the first one
            ];

            $i += 1;
        }

        SecretSantaMember::insert($items);
    }
}
