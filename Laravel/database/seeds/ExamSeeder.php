<?php

use App\Exam;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam::create([
            'name' => 'StudyMate',
            'deadline' => '2020-06-11 00:00:00',
            'examType' => 'assessment'
        ]);

        Exam::create([
            'name' => 'Invy',
            'deadline' => '2020-06-11 00:00:00',
            'examType' => 'assessment'
        ]);

        Exam::create([
            'name' => 'Remindo toets',
            'deadline' => '2020-06-09 13:10:00',
            'examType' => 'prelim'
        ]);

        Exam::create([
            'name' => 'Remindo toets',
            'deadline' => '2020-01-15 08:30:00',
            'examType' => 'prelim'
        ]);

        Exam::create([
            'name' => 'Eindopdracht',
            'deadline' => '2019-10-15 00:00:00',
            'examType' => 'assessment'
        ]);

    }
}
