<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $teachers = Teacher::get();
        return view('Teachers/TeacherOverview', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('Teachers/AddTeacher');
    }

    protected function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:20'],
            'infix' => ['max:10'],
            'last_name' => ['required', 'string', 'max:20'],

        ]);

        $teacherID = Teacher::create([
            'firstname' => $request->input('first_name'),
            'infix' => $request->input('infix'),
            'lastname' => $request->input('last_name'),
        ])->id;

        return redirect()->action('TeacherController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id){
        $teacher = Teacher::whereId($id)->first();
        return view('Teachers/EditTeacher', ['teacher' => $teacher]);
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
        $teacher = Teacher::where('id', $id)->first();

        $request->validate([
            'first_name' => ['required', 'string', 'max:20'],
            'infix' => ['max:10'],
            'last_name' => ['required', 'string', 'max:20']
        ]);

        $teacher
            ->update([
                'firstname' => $request->input('first_name'),
                'infix' => $request->input('infix'),
                'lastname' => $request->input('last_name'),

            ]);



        return redirect()->action('TeacherController@index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {


        $teacher = Teacher::whereId($id)->first();

        if(count($teacher->TeacherModules) == 0){
            $teacher->delete();
        }


        return redirect()->action('TeacherController@index');

    }
}
