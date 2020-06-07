<?php

use Illuminate\Database\Seeder;

class ModuleTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = App\Teacher::find(1);
        $teacher->TeacherModules()->attach(1,['is_coordinator' => false]);
        $teacher->TeacherModules()->attach(3,['is_coordinator' => true]);

        $teacher = App\Teacher::find(2);
        $teacher->TeacherModules()->attach(3,['is_coordinator' => false]);
        $teacher->TeacherModules()->attach(1,['is_coordinator' => true]);
        $teacher->TeacherModules()->attach(2,['is_coordinator' => false]);

        $teacher = App\Teacher::find(3);
        $teacher->TeacherModules()->attach(4,['is_coordinator' => false]);
        $teacher->TeacherModules()->attach(2,['is_coordinator' => true]);

        $teacher = App\Teacher::find(4);
        $teacher->TeacherModules()->attach(2,['is_coordinator' => false]);
        $teacher->TeacherModules()->attach(4,['is_coordinator' => true]);
        $teacher->TeacherModules()->attach(1,['is_coordinator' => false]);

        $teacher = App\Teacher::find(5);
        $teacher->TeacherModules()->attach(5,['is_coordinator' => true]);
    }
}
