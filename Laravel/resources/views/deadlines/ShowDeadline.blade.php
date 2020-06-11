@extends('layouts.app')

@section('content')
    <p>{{$exam->name}}</p>
    <p>{{$exam->deadline}}</p>
    @foreach($exam->Tags as $tag)
        @if($tag->pivot->user_id == Auth::User()->id)
            <p>{{$tag->description}}</p>
            @endif
        @endforeach

    <form action="{{route('deadlines.update', $exam->id)}}" method="POST"
          enctype="multipart/form-data">
        @csrf
        <select name="tag_id" id="tag_id" class="form-textbox">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}">
                    {{$tag->description}}
                </option>
                @endforeach
        </select>

        @method('PUT')
        <button type="submit" class="btn btn-success">Voeg tag toe</button>
        @csrf
    </form>
@endsection
