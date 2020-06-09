@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Docent overzicht</div>

                    <div class="card-body">
                        <form action="{{ route('teachers.create') }}">
                            <button class="btn btn-primary">Docent aanmaken</button>
                        </form>
                        <br>
                        @foreach($teachers as $teacher)
                            <div>
                                <p>{{$teacher->firstname}}  {{$teacher->infix}}  {{$teacher->lastname}}</p>
                                <form action="{{ route('teachers.edit',$teacher->id) }}">
                                    <button class="btn btn-primary">Bewerk</button>
                                </form>
                                <br>
                                <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                                    <div>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                                onclick="return confirm('Weet je zeker dat je deze docent wilt verwijderen?')">
                                            Verwijder
                                        </button>
                                    </div>
                                </form>
                                <br>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
