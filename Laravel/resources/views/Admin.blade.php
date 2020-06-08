@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin pagina</div>

                    <div class="card-body">
                        <div>
                            @for ($i = 1; $i < 5; $i++)
                            <h3>Blok {{$i}}</h3>

                            @foreach($modules as $module)

                                @if($module->period == $i)
                                    <p>{{$module->moduleName}}</p>
                                @endif

                            @endforeach
                            @endfor
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
