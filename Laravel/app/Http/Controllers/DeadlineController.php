<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Module;
use App\Tag;
use http\Client\Curl\User;
use Illuminate\Cache\TagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeadlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user != null) {
            $modules = $user->Modules()->with('exam')->get();
            return view('deadlines/Deadlines', ['modules' => $modules]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tags = Tag::get();
        $exam = Exam::whereId($id)->first();
        return view('deadlines/ShowDeadline', ['tags' => $tags, 'exam' => $exam]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::get();
        $exam = Exam::whereId($id)->first();
        return view('deadlines/ShowDeadline', ['tags' => $tags, 'exam' => $exam]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $exam = Exam::find($id);
        $tag_id = $request->tag_id;
        $user_id = Auth::user()->id;


        $exam->Tags()->attach($tag_id, ['user_id' => $user_id]);


        return redirect()->route('deadlines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sortRequest(Request $request)
    {
        $user = Auth::user();
        if($request->ajax()) {
            if(!empty($request->get('sort'))) {
                $sort = $request->get('sort');
                dd($sort);
                if($sort = 'Docent') {
                    $modules = $user->Modules()->with('exam')->orderBy('module_teachers.teacher_id', 'asc')->get();
                }
                else if($sort = 'Module') {
                    $modules = $user->Modules()->orderBy('moduleName', 'asc');
                }
                else if($sort = 'Tijd') {
                    $modules = $user->Modules()->with('Exam')->orderBy('exam.deadline', 'asc');
                }
                else if($sort = 'Categorie') {
                    $modules = $user->Modules()->with('Exam')->orderBy('exam.examType', 'asc');
                }

                $returnview = view('deadlines.partial-deadlines')->with('modules', $modules)->render();
                return response()->json(array('success' => true, 'html' => $returnview));
            }
        }
    }
}
