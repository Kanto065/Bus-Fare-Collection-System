@extends('layouts.app')
@section('content')
<div class="container">
    <div class="mt-5">
        <h2 style="text-align:center;">Forgot Password</h2>
    </div>
    <div class="mx-5 my-5">
        <form class="mx-5 col-lg-5" action="{{route('forget-password-link')}}" method="post">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="mx-5">
            <p>Enter your email address and we will send you a link to reset your password</p>
                <label for="validationDefaultEmail" class="form-label ">Email</label>
                <div style="text-align:center;" class="input-group">
                    <input type="email" class="form-control" id="validationDefaultEmail"
                        aria-describedby="inputGroupPrepend2" name="email" placeholder="exemple@mail.com"
                        value="{{old('email')}}">
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mx-5 my-2">
                <button type="submit" class="btn btn-primary">Send Reset Password Link</button>
                <a href="{{route('log.in')}}"></a>
            </div>
        </form>
    </div>
</div>
@endsection