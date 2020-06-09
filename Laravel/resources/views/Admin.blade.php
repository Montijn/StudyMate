@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin pagina</div>

                    <div class="card-body">
                        <form action="{{ route('teachers.index') }}">
                            <button class="btn btn-primary">Docenten overzicht</button>
                        </form>
                        <br>
                        <form action="{{ route('modules.index' )}}">
                            <button class="btn btn-primary">Modules overzicht</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
