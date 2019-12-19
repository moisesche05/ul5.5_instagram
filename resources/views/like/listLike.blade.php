@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Mis Imagenes favoritas</h2>
                @foreach($likes as $like)
                    @include('includes.image', ['image' => $like->images])
                @endforeach
                <div class="clearfix"></div>
                {{ $likes->links() }}
            </div>
        </div>
    </div>
@endsection
