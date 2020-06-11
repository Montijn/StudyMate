<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use App\Exam;
use App\Teacher;

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
        $teachers = Teacher::get();
        return view('modules/AddModule', ['exams' => $exams], ['teachers' => $teachers]);
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
    {

        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'year' => ['required'],
            'period' => ['required' ],
            'credits' => ['required'],
            'exam_id' =>['required'],
            'teacher_id' =>['required']
        ]);

        $module=  Module::create([

            'moduleName' => $request->input('name'),
            'year' => $request->input('year'),
            'period' => $request->input('period'),
            'credits' => $request->input('credits'),
            'exam_id' => $request->input('exam_id')
        ])->id;

         $teachers = $request->input('teacher_id');
        foreach($teachers as $teacherid){
            $teacher = Teacher::whereId($teacherid)->first();
            $teacher->TeacherModules()->attach($module,['is_coordinator' => false]);
        }
        $coordinator = Teacher::whereId( $request->input('coordinator_id'))->first();
        $coordinator->TeacherModules()->detach($module);
        $coordinator->TeacherModules()->attach($module,['is_coordinator' => true]);
        return redirect()->action('ModuleController@show', $module);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id){
        $data['module']=Module::whereId($id)->first();
        $data['exams']=Exam::get();
        $data['teachers']=Teacher::get();
        return view('modules/EditModule', ['data'=>$data]);
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
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'year' => ['required', 'digits:4','integer', 'min:2019','max:2021'],
            'period' => ['required','digits:1','integer', 'min:1','max:4'],
            'credits' => ['required','digits:1','integer', 'min:1','max:5'],
            'exam_id' =>['required','integer']
        ]);

        $module
            ->update([
                'moduleName' => $request->input('name'),
                'year' => $request->input('year'),
                'period' => $request->input('period'),
                'credits' => $request->input('credits'),
                'exam_id' => $exam = $request->input('exam_id')
            ]);

        $allteachers = Teacher::get();
        foreach($allteachers as $teacher){
            $teacher->TeacherModules()->detach($id);
        }

        $teachers = $request->input('teacher_id');
        foreach($teachers as $teacherid){
            $teacher = Teacher::whereId($teacherid)->first();
            $teacher->TeacherModules()->attach($id,['is_coordinator' => false]);
        }
        $coordinator = Teacher::whereId( $request->input('coordinator_id'))->first();
        $coordinator->TeacherModules()->detach($id);
        $coordinator->TeacherModules()->attach($id,['is_coordinator' => true]);

        return redirect()->action('ModuleController@show',$id);
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
        if(count($module->ModuleUsers) == 0 ){
            foreach($module->TeacherModules as $teacher){
                $teacher->TeacherModules()->detach($id);
            }
            $module->delete();
        }
        return redirect()->action('ModuleController@index')->with('failed-delete', 'U kunt deze module niet verwijderen, omdat een Student dit vak volgt');;

    }
}
