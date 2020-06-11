@extends('layouts.app')


@section('content')
    <div class="alert">
        <div class="row">
            <div class="col-sm-8">
                @foreach($modules->unique('year') as $year)
                    <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#schooljaar{{$year->year}}" role="button" aria-expanded="false" aria-controls="schooljaar{{$year->year}}">Schooljaar {{$year->year}}</button>
                    <div class="collapse" id="schooljaar{{$year->year}}">
                        @foreach($modules->unique('period') as $period)
                            <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#blok{{$period->period}}" role="button" aria-expanded="false" aria-controls="blok{{$period->period}}">Blok {{$period->period}}</button>
                        <div class="collapse" id="blok{{$period->period}}">
                        @foreach($modules as $module)
                            @if($module->period === $period->period)
                                <label for="module-progress">{{$module->moduleName}}</label>
                            @if($module->pivot->result > 5.5)
                                <progress id="module-progress" max="{{$module->credits}}" value="{{$module->credits}}"></progress>
                                <label>Aantal te behalen EC: {{$module->credits}}</label>
                                <label>Aantal behaalde EC: {{$module->credits}}</label>
                            @else
                                <progress id="module-progress" max="{{$module->credits}}" value="0"></progress>
                                    <label>Aantal te behalen EC: {{$module->credits}}</label>
                                    <label>Aantal behaalde EC: 0</label>
                            @endif
                            <label>Jouw cijfer: {{$module->pivot->result}}</label>
                            @endif
                        @endforeach

                            <label>Totaal behaalde EC: {{$user->PeriodCredits($year->year, $period->period)}}</label>
                    </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
