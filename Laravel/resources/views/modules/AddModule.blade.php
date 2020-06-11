@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Module aanmaken</div>

                    <div class="card-body">

                        <form  action="{{ route('modules.store') }}" method="POST"
                               enctype="multipart/form-data">
                            @csrf
                            <p >Naam</p>
                            <input id="name" name="name"
                                   class="form-textbox profile-textbox @error('name') error-border @enderror"
                                   type="text"
                                   autocomplete="name" autofocus>

                            @error('name')
                            <div>
                                <p  role="alert">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror

                            <p >Jaar</p>
                            <input id="year" name="year"
                                   class="form-textbox profile-textbox @error('jaar') error-border @enderror"
                                   type="number" min = "2019" max = "2021"   autocomplete="year" autofocus>

                            @error('jaar')
                            <div >
                                <p role="alert">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror

                            <p>Periode</p>
                            <input id="period" name="period"
                                   class="form-textbox profile-textbox @error('period') error-border @enderror"
                                   type="number" min = "1" max="4" autocomplete="period" autofocus>

                            @error('period')
                            <div class="error-container">
                                <p class="error form-error" role="alert">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror

                            <p>Studiepunten</p>
                            <input id="credits" name="credits"
                                   class="form-textbox profile-textbox @error('credits') error-border @enderror"
                                   type="number" min = "1" max="5"  autocomplete="credits" autofocus>

                            @error('credits')
                            <div class="error-container">
                                <p class="error form-error" role="alert">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror

                            <p>Toets</p>
                            <select name="exam_id" id="exam_id" class="form-textbox @error('role') error-border @enderror">
                                @foreach ($exams as $exam)
                                    <option value="{{$exam->id}}">
                                        {{$exam->name . " " . $exam->deadline}}
                                    </option>
                                @endforeach
                            </select>

                            <p>Docent(en)</p>
                            <select multiple name="teacher_id[]" id="teacher_id">
                                @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->id}}">
                                        {{$teacher->firstname . " " . $teacher->infix . " " . $teacher->lastname}}
                                    </option>
                                @endforeach
                            </select>
                            <p>Coordinator</p>
                            <select  name="coordinator_id" id="coordinator_id" >
                                @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->id}}">
                                        {{$teacher->firstname . " " . $teacher->infix . " " . $teacher->lastname}}
                                    </option>
                                @endforeach
                            </select>

                            <button type="submit" class="btn btn-success" >Opslaan</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

