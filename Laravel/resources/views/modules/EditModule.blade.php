@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bewerk module</div>

                    <div class="card-body">

                        <form  action="{{ route('modules.update', $data['module']->id) }}" method="POST"
                               enctype="multipart/form-data">
                            @csrf
                            <p >Naam</p>
                            <input id="name" name="name"
                                   class="form-textbox profile-textbox @error('name') error-border @enderror"
                                   type="text"
                                   value="{{ $data['module']->moduleName }}" autocomplete="name" autofocus>

                            @error('name')
                            <div>
                                <p  role="alert">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror

                            <p >Jaar</p>
                            <input id="year" name="year"
                                   class="form-textbox profile-textbox @error('year') error-border @enderror"
                                   value="{{ $data['module']->year }}" type="number" min = "2010" max = "2025"   autocomplete="year" autofocus>

                            @error('year')
                            <div >
                                <p role="alert">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror

                            <p>Periode</p>
                            <input id="period" name="period"
                                   class="form-textbox profile-textbox @error('period') error-border @enderror"
                                   value="{{ $data['module']->period }}" type="number" min = "1" max="4" autocomplete="period" autofocus>

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
                                   value="{{ $data['module']->credits }}" type="number" min = "1" max="4"  autocomplete="credits" autofocus>

                            @error('credits')
                            <div class="error-container">
                                <p class="error form-error" role="alert">
                                    {{ $message }}
                                </p>
                            </div>
                            @enderror
                            <p>Toets</p>
                            <select name="exam_id" id="exam_id" class="form-textbox @error('role') error-border @enderror">
                                @foreach ($data['exams'] as $exam)
                                    @if($exam->id == $data['module']->exam_id)
                                        <option selected value="{{$exam->id}}">
                                            {{$exam->name . " " . $exam->deadline}}
                                        </option>
                                        @else
                                        <option value="{{$exam->id}}">
                                            {{$exam->name . " " . $exam->deadline}}
                                        </option>
                                    @endif

                                @endforeach
                            </select>


                            <p>Docent(en)</p>
                            <select multiple name="teacher_id[]" id="teacher_id" >
                                @foreach ($data['teachers'] as $teacher)
                                        @if($teacher->TeacherModules()->where('module_id', $data['module']->id)->first()
                                            && $teacher->TeacherModules()->where('module_id', $data['module']->id)->first()->pivot->is_coordinator == 0)
                                            <option selected value="{{$teacher->id}}">
                                                {{$teacher->firstname . " " . $teacher->infix . " " . $teacher->lastname}}
                                            </option>
                                            @else
                                            <option  value="{{$teacher->id}}">
                                            {{$teacher->firstname . " " . $teacher->infix . " " . $teacher->lastname}}
                                            </option>
                                        @endif

                                @endforeach
                            </select>
                            <p>Coordinator</p>
                            <select name="coordinator_id" id="coordinator_id" >
                                @foreach ($data['teachers'] as $teacher)
                                    @if($teacher->TeacherModules()->where('module_id', $data['module']->id)->first()
                                        && $teacher->TeacherModules()->where('module_id', $data['module']->id)->first()->pivot->is_coordinator == 1)
                                        <option selected value="{{$teacher->id}}">
                                            {{$teacher->firstname . " " . $teacher->infix . " " . $teacher->lastname}}
                                        </option>
                                    @else
                                        <option  value="{{$teacher->id}}">
                                            {{$teacher->firstname . " " . $teacher->infix . " " . $teacher->lastname}}
                                        </option>
                                    @endif

                                @endforeach
                            </select>

                            @method('PUT')
                            <button type="submit" class="btn btn-success" >Opslaan</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

