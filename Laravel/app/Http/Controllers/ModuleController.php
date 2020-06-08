<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use App\Exam;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $modules = Module::get();
        return view('modules/ModulesOverview', ['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $exams = Exam::get();
        return view('modules/AddModule', ['exams' => $exams]);
    }
    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return Factory|RedirectResponse|Redirector|View
     */
    public function show($id)
    {
        $exams = Exam::get();
        $module = Module::whereId($id)->first();
        return view('modules/ShowModule', ['exams' => $exams], ['module' => $module]);
    }

    protected function store(Request $request)
    {        $exam = $request->input('exam_id');
            $exam_id = explode(" ", $exam);

        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'year' => ['required'],
            'period' => ['required' ],
            'credits' => ['required'],
            'exam_id' =>['required']
        ]);

         Module::create([

            'moduleName' => $request->input('name'),
            'year' => $request->input('year'),
            'period' => $request->input('period'),
            'credits' => $request->input('credits'),
            'exam_id' => $exam_id[0]
        ]);

        return redirect()->action('ModuleController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id){
        $module = Module::whereId($id)->first();
        $exams = Exam::get();
        return view('modules/EditModule', ['module' => $module], ['exams' => $exams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $module = Module::where('id', $id)->first();
        $exam = $request->input('exam_id');
        $exam_id = explode(" ", $exam);
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'year' => ['required'],
            'period' => ['required'],
            'credits' => ['required'],
            'exam_id' =>['required']
        ]);

        $module
            ->update([
                'moduleName' => $request->input('name'),
                'year' => $request->input('year'),
                'period' => $request->input('period'),
                'credits' => $request->input('credits'),
                'exam_id' => $exam_id[0]
            ]);



        return redirect()->action('ModuleController@index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {


        $module = Module::whereId($id)->first();

        if(count($module->TeacherModules) == 0 && count($module->ModuleUsers) == 0 ){
            $module->delete();
        }


        return redirect()->action('ModuleController@index');

    }
}
