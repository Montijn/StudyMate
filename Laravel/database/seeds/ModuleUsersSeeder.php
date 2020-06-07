<?php

use Illuminate\Database\Seeder;

class ModuleUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::find(3);
        $user->ModuleUsers()->attach(1);
        $user->ModuleUsers()->attach(3);
        $user->ModuleUsers()->attach(4);

        $user = App\User::find(4);
        $user->ModuleUsers()->attach(1);
        $user->ModuleUsers()->attach(2);
        $user->ModuleUsers()->attach(5);

        $user = App\User::find(5);
        $user->ModuleUsers()->attach(2);
        $user->ModuleUsers()->attach(4);


        $user = App\User::find(6);
        $user->ModuleUsers()->attach(1);
        $user->ModuleUsers()->attach(3);
        $user->ModuleUsers()->attach(4);
        $user->ModuleUsers()->attach(5);

        $user = App\User::find(7);
        $user->ModuleUsers()->attach(1);
        $user->ModuleUsers()->attach(2);
        $user->ModuleUsers()->attach(3);
        $user->ModuleUsers()->attach(4);
        $user->ModuleUsers()->attach(5);
    }
}
