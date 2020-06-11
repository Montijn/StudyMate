<?php

use App\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create(['firstname' => 'Bart', 'lastname' => 'Gelens']);
        Teacher::create(['firstname' => 'Stefan', 'infix' => 'van', 'lastname' => 'Dockum']);
        Teacher::create(['firstname' => 'Jasper', 'infix' => 'van', 'lastname' => 'Rosmalen']);
        Teacher::create(['firstname' => 'Bob', 'lastname' => 'Polis']);
        Teacher::create(['firstname' => 'Jos', 'infix' => 'van', 'lastname' => 'Weert']);
    }
}
