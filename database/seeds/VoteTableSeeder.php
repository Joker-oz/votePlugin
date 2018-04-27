<?php

use Illuminate\Database\Seeder;
use App\Models\Vote;

class VoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $votes = factory(Vote::class)
                      ->times(40)
                      ->make();
        $vote_array = $votes->toArray();

        Vote::insert($vote_array);
    }
}
