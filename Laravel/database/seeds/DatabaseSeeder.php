<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TeacherSeeder::class,
            ExamSeeder::class,
            ModuleSeeder::class,
            ModuleTeacherSeeder::class,
            ModuleUsersSeeder::class,
            TagSeeder::class
        ]);
    }
}
