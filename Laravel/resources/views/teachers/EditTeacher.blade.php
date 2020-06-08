@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bewerk docent</div>

                    <div class="card-body">

                        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                                    <p >Voornaam</p>
                                    <input id="first_name" name="first_name"
                                           class="form-textbox profile-textbox @error('first_name') error-border @enderror"
                                           type="text"
                                           value="{{ $teacher->firstname }}" autocomplete="first_name" autofocus>

                                    @error('first_name')
                                    <div >
                                        <p  role="alert">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror

                                    <p >Tussenvoegsel</p>
                                    <input id="infix" name="infix"
                                           class="form-textbox profile-textbox @error('infix') error-border @enderror"
                                           type="text" value="{{ $teacher->infix }}" autocomplete="infix" autofocus>

                                    @error('infix')
                                    <div >
                                        <p role="alert">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror

                                    <p >Achternaam</p>
                                    <input id="last_name" name="last_name"
                                           class="form-textbox profile-textbox @error('last_name') error-border @enderror"
                                           type="text" value="{{ $teacher->lastname }}" autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <div class="error-container">
                                        <p class="error form-error" role="alert">
                                            {{ $message }}
                                        </p>
                                    </div>
                                    @enderror



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
