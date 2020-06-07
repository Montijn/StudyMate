@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin pagina</div>

                    <div class="card-body">
                        @foreach($teachers as $teacher)
                            <div>{{$teacher->firstname}}</div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
