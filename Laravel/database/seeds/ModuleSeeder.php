<?php

use App\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create(['moduleName' => 'JavaScript',
            'year' => 2019,
            'period' => 3,
            'credits' => 4,
            'exam_id' => 1
        ]);

        Module::create(['moduleName' => 'PHP',
            'year' => 2019,
            'period' => 3,
            'credits' => 3,
            'exam_id' => 2
        ]);

        Module::create(['moduleName' => 'Databases 4',
            'year' => 2019,
            'period' => 4,
            'credits' => 3,
            'exam_id' => 3
        ]);

        Module::create(['moduleName' => 'Software Engineering',
            'year' => 2019,
            'period' => 3,
            'credits' => 4,
            'exam_id' => 4
        ]);

        Module::create(['moduleName' => 'Programmeren 5',
            'year' => 2019,
            'period' => 1,
            'credits' => 5,
            'exam_id' => 5
        ]);
    }
}
