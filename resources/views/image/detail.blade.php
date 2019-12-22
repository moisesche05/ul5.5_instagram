@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card mb-4">
                    <div class="card-header">
                        @if($image->users->image)
                            <img src="{{ route('user.avatar',['filename'=>$image->users->image]) }}" alt=""
                                 height="35" width="35" class="rounded-circle mr-2">
                        @endif
                        {{ $image->users->name.' '.$image->users->surname}}
                        <span class="text-secondary">{{ ' | @'.$image->users->nick  }}</span>
                    </div>

                    <div class="card-body p-0">
                        <div class="container-image w-100" style="max-height: 500px; overflow: hidden">
                            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt=""
                                 width="100%">
                        </div>
                        <div class="description px-4 py-2">
                            <span class="text-secondary">{{ '@'.$image->users->nick  }}</span>
                            <span class="text-secondary"
                                  style="font-size: 14px;">{{ ' | '.\FormatTime::LongTimeFilter($image->created_at) }}</span>
                            <p class="m-0">{{ $image->description }}</p>
                        </div>
                        <div class="likes pl-4">
                            <?php $user_like = false; ?>

                            @foreach($image->likes as $like)
                                @if($like->users->id == Auth::user()->id)
                                    <?php $user_like = true; ?>
                                @endif
                            @endforeach

                            @if($user_like)
                                <img src="{{ asset('images/heart-red.png') }}" data-id="{{ $image->id }}" alt=""
                                     width="17" class="btn-like">
                            @else
                                <img src="{{ asset('images/heart-grey.png') }}" data-id="{{ $image->id }}" alt=""
                                     width="17" class="btn-dislike">
                            @endif
                            <span>{{ count($image->likes) }}</span>
                            <span class="ml-2">Comentarios ({{ count($image->comments) }})</span>
                            @if(Auth::user() && Auth::user()->id == $image->users->id)
                                <a href="" class="btn btn-sm btn-primary ml-1">Actualizar</a>
{{--                                    {{ route('image.delete', ['id' => $image->id]) }}--}}
                                <a href="" data-toggle="modal"
                                   class="btn btn-sm btn-danger ml-1" data-target="#deleteModal">Borrar</a>
                            @endif
                        </div>
                        <hr class="mx-4">
                        <div class="comments px-4 pb-3">
                            <form method="POST" action="{{ route('comment.save') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="image_id" value="{{ $image->id }}">
                                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}"
                                          name="content"></textarea>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                                <button class="btn btn-success mt-3" type="submit">Enviar</button>
                            </form>
                            <hr>
                            @foreach($image->comments as $comment)
                                <div class="mt-3">
                                    <span class="text-secondary">{{ '@'.$comment->users->nick  }}</span>
                                    <span class="text-secondary"
                                          style="font-size: 12px;">{{ ' | '.\FormatTime::LongTimeFilter($comment->created_at) }}</span>
                                    <p class="m-0" style="font-size: 12px;">{{ $comment->content }}</p>
                                    @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->images->user_id == Auth::user()->id))
                                        <a href="{{ route('comment.delete', ['id' => $comment->id]) }}"
                                           class="btn btn-sm btn-danger">
                                            Eliminar
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert-warning p-2">
                    Si eliminas esta imagen nunca podras recuperarla, ¿Estas seguro de querer de eliminarla?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <a href="{{ route('image.delete', ['id' => $image->id]) }}" class="btn btn-danger">Borrar</a>
            </div>
        </div>
    </div>
</div>
