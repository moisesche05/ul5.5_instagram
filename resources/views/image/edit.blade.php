@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar mi imagen</div>
                    <div class="card-body">
                        <form action="{{ route('image.update') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="image_id" value="{{ $image->id }}">

                            <div class="form-group row">
                                <label for="image_path" class="col-md-3 col-form-label text-md-right">Imagen</label>
                                <div class="col-md-7">
                                    @if($image->image_path)
                                        <img src="{{ route('image.file',['filename'=>$image->image_path]) }}" alt=""
                                             height="70" class="mb-2">
                                    @endif
                                    <input id="image_path" type="file"
                                           class="form-control-file {{ $errors->has('image_path') ? 'is-invalid' : '' }}"
                                           name="image_path" autofocus>
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
                                              name="description" required>{{ $image->description }}</textarea>
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
                                        Actualizar Imagen
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
