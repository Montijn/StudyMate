<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['description' => 'Moeilijk']);
        Tag::create(['description' => 'Simpel']);
        Tag::create(['description' => 'Kost veel tijd']);
        Tag::create(['description' => 'Herkansing']);
        Tag::create(['description' => 'Tweetallen']);
    }
}
