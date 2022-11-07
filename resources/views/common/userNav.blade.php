<html>
<div class=" mt-5 text-end container">
    @if(Session::get('loginId')) {{Session::get('loginId')}}
    <a class="btn btn-danger" href="{{route('logout')}}">Log Out</a>

    @endif

</div>

</html>