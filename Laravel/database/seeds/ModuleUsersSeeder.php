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
        $user->ModuleUsers()->attach(1,['result' => 5.8]);
        $user->ModuleUsers()->attach(3,['result' => 3.7]);
        $user->ModuleUsers()->attach(4,['result' => 8.6]);

        $user = App\User::find(4);
        $user->ModuleUsers()->attach(1,['result' => 7.3]);
        $user->ModuleUsers()->attach(2);
        $user->ModuleUsers()->attach(5,['result' => 5.6]);

        $user = App\User::find(5);
        $user->ModuleUsers()->attach(2);
        $user->ModuleUsers()->attach(4,['result' => 6.6]);


        $user = App\User::find(6);
        $user->ModuleUsers()->attach(1,['result' => 7.2]);
        $user->ModuleUsers()->attach(3,['result' => 6.4]);
        $user->ModuleUsers()->attach(4,['result' => 8.1]);
        $user->ModuleUsers()->attach(5,['result' => 9.0]);

        $user = App\User::find(7);
        $user->ModuleUsers()->attach(1,['result' => 9.2]);
        $user->ModuleUsers()->attach(2);
        $user->ModuleUsers()->attach(3,['result' => 7.8]);
        $user->ModuleUsers()->attach(4,['result' => 3.6]);
        $user->ModuleUsers()->attach(5);
    }
}
