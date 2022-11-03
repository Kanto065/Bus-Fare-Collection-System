@extends('layouts.app')
@section('content')
<div>
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
        <form class=" shadow-lg p-3 mb-5 bg-body rounded row g-3" action="{{route('ownerReg')}}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="col-md-6">
                <label for="company_name" class="form-label">Company name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Company name" name="company_name"
                    value="{{old('company_name')}}">
                @error('company name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-6">
                <label for="owner_name" class="form-label">Owner name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="Owner name"
                    name="owner_name" value="{{old('owner_name')}}">
                @error('owner name')
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