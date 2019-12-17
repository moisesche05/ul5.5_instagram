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

                @foreach($images as $image)
                    <div class="card mb-4">
                        <div class="card-header">
                            @if($image->users->image)
                                <img src="{{ route('user.avatar',['filename'=>$image->users->image]) }}" alt=""
                                     height="35" width="35" class="rounded-circle mr-2">
                            @endif
                            <a href="{{ route('image.detail', ['id' => $image->id]) }}" class="text-secondary">
                                {{ $image->users->name.' '.$image->users->surname}}
                                <span class="text-secondary">{{ ' | @'.$image->users->nick  }}</span>
                            </a>
                        </div>

                        <div class="card-body p-0">
                            <div class="container-image w-100" style="max-height: 400px; overflow: hidden">
                                <img src="{{ route('image.file', ['filename' => $image->image_path]) }}" alt=""
                                     width="100%">
                            </div>
                            <div class="description px-4 py-2">
                                <span class="text-secondary">{{ '@'.$image->users->nick  }}</span>
                                <span class="text-secondary" style="font-size: 14px;">{{ ' | '.\FormatTime::LongTimeFilter($image->created_at) }}</span>
                                <p class="m-0">{{ $image->description }}</p>
                            </div>
                            <div class="likes pl-4 pb-3">
                                <img src="{{ asset('images/heart-grey.png') }}" alt="" width="25">
                                <a href="" class="btn btn-warning btn-sm ml-2">
                                    Comentarios ({{ count($image->comments) }})
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
                {{ $images->links() }}
            </div>
        </div>
    </div>
@endsection
