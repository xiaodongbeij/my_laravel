<?php

use Illuminate\Database\Seeder;
use App\Models\Statuse;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = ['1', '2', '3'];
        $faker = app(Faker\Generator::class);
        $statuses = factory(Statuse::class)->times(1000)->make()->each(function ($status) use ($faker, $user_ids) {
            $status->user_id = $faker->randomElement($user_ids);
        });
        Statuse::insert($statuses->toArray());
    }
}
