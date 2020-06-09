@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Module gegevens</div>

                    <div class="card-body">

                        <h5>Naam</h5>
                         <p>{{ $module->moduleName }}</p>
                        <h5>Jaar</h5>
                        <p>{{ $module->year }}</p>
                        <h5>Studiepunten</h5>
                        <p>{{ $module->credits }}</p>
                        <h5>Toets</h5>
                        @foreach ($exams as $exam)
                            @if($exam->id == $module->exam_id)
                                <p>{{$exam->id . " " . $exam->name . " " . $exam->deadline}}</p>
                            @endif
                        @endforeach
                        <h5>Docent(en)</h5>
                        @foreach($module->TeacherModules as $teacher)
                            @if($teacher->pivot->is_coordinator == 0)
                                <p>{{$teacher->firstname . " " . $teacher->infix . " " . $teacher->lastname}}</p>
                            @endif
                        @endforeach
                        <h5>Coordinator</h5>
                        @foreach($module->TeacherModules as $teacher)

                            @if($teacher->pivot->is_coordinator == 1)
                                <p>{{$teacher->firstname . " " . $teacher->infix . " " . $teacher->lastname}}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

