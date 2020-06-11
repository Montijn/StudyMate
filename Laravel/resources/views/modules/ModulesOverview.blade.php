@extends('layouts.app')

@section('content')
    @if (Session::has('failed-delete'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>{!! Session::get('failed-delete') !!}</p>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Module overzicht</div>

                    <div class="card-body">
                        <form action="{{ route('modules.create') }}">
                            <button class="btn btn-primary">Module aanmaken</button>
                        </form>
                        <br>
                        @foreach($modules as $module)
                            <div>
                                <p>{{$module->moduleName}}</p>
                                <form action="{{ route('modules.show',$module->id) }}">
                                    <button class="btn btn-primary">Bekijk</button>
                                </form>
                                <br>
                                <form action="{{ route('modules.edit',$module->id) }}">
                                    <button class="btn btn-primary">Bewerk</button>
                                </form>
                                <br>
                                <form action="{{ route('modules.destroy', $module->id) }}" method="POST">
                                    <div>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                                onclick="return confirm('Weet je zeker dat je deze module wilt verwijderen?')">
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
