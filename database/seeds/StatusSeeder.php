<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = factory(Status::class)->times(1000)->make();
        Status::insert($statuses->toArray());
    }
}
