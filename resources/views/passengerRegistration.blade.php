@extends('layouts.app')
@section('content')
<div >
    <div class="mt-5">
        <h2 style="text-align:center;">Welcome</h2>
    </div>
    <div class="container my-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="shadow-lg p-3 mb-5 bg-body rounded row g-3" action="{{route('registration')}}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="col-md-6">
                <label for="first_name" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="First name"
                    name="first_name" value="{{old('first_name')}}">
                @error('first name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="last_name" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" name="last_name"
                    value="{{old('last_name')}}">
                @error('last name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationDefaultEmail" class="form-label">Email</label>
                <div class="input-group">

                    <input type="email" class="form-control" id="validationDefaultEmail"
                        aria-describedby="inputGroupPrepend2" name="email" placeholder="exemple@mail.com"
                        value="{{old('email')}}">
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="inputPhone" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="inputPassword4" name="phone" placeholder="01XXXX-XXXXX"
                    value="{{old('phone')}}">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Kuratoli, Khilkhet, Bangladesh"
                    name="address" value="{{old('address')}}">
                @error('address')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6">
                <label for="inputBirthday" class="form-label">Date of birth</label><br>
                <input type="date" id="birthday" name="dob">
            </div><br>
            <label for="inputGender" class="form-label">Gender</label>
            <div class="form-check col-1">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Male
                </label>
            </div>
            <div class="form-check col-1">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Female
                </label>
            </div>
            <div class="form-check col-1">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                <label class="form-check-label" for="flexRadioDefault3">
                    Other
                </label>
            </div>
            <div class="">
                <div class="col-md-6">
                    <label for="validationDefaultPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="validationDefaultCPass" class="form-label">Confrim Password</label>
                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm password"
                        name="password_confirmation">
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" name="terms"
                        value="{{old('terms')}}">
                    <label class="form-check-label" for="invalidCheck2">
                        Agree to <a href="">terms and conditions</a>
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>


</div>
@endsection