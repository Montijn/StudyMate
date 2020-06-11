@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div id="deadlines" class="card-header">Deadline overzicht
                        <select class="form-textbox" name="sort" id="sortdropdown">
                            <option selected>Docent</option>
                            <option>Module</option>
                            <option>Tijd</option>
                            <option>Categorie</option>
                        </select>
                    </div>

                    <div class="card-body">
                    @include('deadlines.partial-deadlines')

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ URL::to('js/sorting.js')}}"></script>
    @endsection



