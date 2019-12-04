@if(Auth::user()->image)
    {{-- <img src="{{ url('/user/avatar/'.Auth::user()->image) }}" alt="">--}}
    <img src="{{ route('user.avatar',['filename'=>Auth::user()->image]) }}" alt="" height="60" class="mb-2">
@endif
