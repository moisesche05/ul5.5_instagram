@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Peolple</h2>

                <form action="{{ route('user.index') }}" method="get" class="d-flex" id="buscador">
                    <input type="text" id="search" class="form-control mr-2">
                    <input type="submit" class="btn btn-sm btn-success" value="Buscar">
                </form>
                
                <hr>
                @foreach($users as $user)
                    @if($user->image)
                        <img src="{{ route('user.avatar',['filename'=>$user->image]) }}" alt=""
                             height="180" width="180" class="rounded-circle mr-4 float-left">
                    @endif
                    <div class="float-left pt-2">
                        <h2>{{'@'.$user->nick }}</h2>
                        <h3>{{ $user->name.' '.$user->surname }}</h3>
                        <h6>{{ 'Se unió: '.\FormatTime::LongTimeFilter($user->created_at) }}</h6>
                        <a href="{{ route('user.profile', ['id' => $user->id]) }}" class="btn btn-success">Ver perfil</a>
                    </div>
                    
                    <div class="clearfix"></div>
                    <hr>
                @endforeach

                <div class="clearfix"></div>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
