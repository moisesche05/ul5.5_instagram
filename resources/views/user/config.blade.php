@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Configuración de mi cuenta</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('user.update') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                           name="name"
                                           value="{{ Auth::user()->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Surname</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                           class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}"
                                           name="surname"
                                           value="{{ Auth::user()->surname }}" required>
                                    @if ($errors->has('surname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nick" class="col-md-4 col-form-label text-md-right">Nick</label>
                                <div class="col-md-6">
                                    <input id="nick" type="text"
                                           class="form-control {{ $errors->has('nick') ? 'is-invalid' : '' }}"
                                           name="nick"
                                           value="{{ Auth::user()->nick }}" required>
                                    @if ($errors->has('nick'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nick') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                           name="email"
                                           value="{{ Auth::user()->email }}" required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image_path" class="col-md-4 col-form-label text-md-right">Avatar</label>
                                <div class="col-md-6">
                                    @include('includes.avatar')
                                    <input id="image_path" type="file"
                                           class="form-control-file {{ $errors->has('image_path') ? 'is-invalid' : '' }}"
                                           name="image_path">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image_path') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar Cambios
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection