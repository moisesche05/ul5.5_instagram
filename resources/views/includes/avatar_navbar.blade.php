@if(Auth::user()->image)
    {{-- <img src="{{ url('/user/avatar/'.Auth::user()->image) }}" alt="">--}}
    <img src="{{ route('user.avatar',['filename'=>Auth::user()->image]) }}" alt="" height="40" width="40" class="rounded-circle ml-3">
@endif
