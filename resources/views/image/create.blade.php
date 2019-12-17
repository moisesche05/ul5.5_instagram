@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Subir nueva imagen</div>
                    <div class="card-body">
                        <form action="{{ route('image.save') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
                                <div class="col-md-7">
                                    <input id="image_path" type="file"
                                           class="form-control-file {{ $errors->has('image_path') ? 'is-invalid' : '' }}"
                                           name="image_path"
                                           value="{{ Auth::user()->image_path }}" required autofocus>
                                    @if ($errors->has('image_path'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-3 col-form-label text-md-right">Descripcion</label>
                                <div class="col-md-7">
                                    <textarea id="description"
                                              class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                              name="description" value="{{ Auth::user()->description }}" required>
                                    </textarea>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        Subir Imagen
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
