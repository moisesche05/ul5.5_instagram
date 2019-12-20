@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($user->image)
                    <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" alt=""
                         height="200" width="200" class="rounded-circle mr-4 float-left">
                @endif
                <div class="float-left pt-4 mt-1">
                    <h2>{{'@'.$user->nick }}</h2>
                    <h3>{{ $user->name.' '.$user->surname }}</h3>
                    <h6>{{ 'Se unió: '.\FormatTime::LongTimeFilter($user->created_at) }}</h6>
                </div>
                <div class="clearfix"></div>

                <hr>

                @foreach($user->images as $image)
                    @include('includes.image', ['image' => $image])
                @endforeach
            </div>
        </div>
    </div>
@endsection
