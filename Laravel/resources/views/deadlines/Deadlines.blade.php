@extends('layouts.app')

@section('content')
    @foreach($modules as $module)
        <p>{{$module->moduleName}}</p>
    <label>{{$module->exam->name}}</label>
        <label>{{$module->exam->examType}}</label>
        <p>{{$module->exam->deadline}}</p>
        @foreach($module->Coordinator as $coordinator)
            <p>{{$coordinator->firstname}} {{$coordinator->infix}} {{$coordinator->lastname}}</p>
            @endforeach
        <form action="{{route('deadlines.edit', $module->exam_id)}}">
            <button class="btn btn-primary">Bekijk deadline</button>
        </form>
    @endforeach
@endsection
