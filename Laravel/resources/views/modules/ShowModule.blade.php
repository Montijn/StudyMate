@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Module gegevens</div>

                    <div class="card-body">

                        <p >Naam</p>
                         <p >{{ $module->moduleName }}</p>
                        <p >Jaar</p>
                        <p >{{ $module->year }}</p>
                        <p >Studiepunten</p>
                        <p>{{ $module->credits }}</p>
                        <p >Toets</p>
                        @foreach ($exams as $exam)
                            @if($exam->id == $module->exam_id)
                                <p>{{$exam->id . " " . $exam->name . " " . $exam->deadline}}</p>
                            @endif
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

