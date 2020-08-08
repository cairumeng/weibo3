<?php

use App\Models\Follower;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $followers = factory(Follower::class)->times(50)->make();
        Follower::insert($followers->toArray());
    }
}
