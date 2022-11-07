@extends('layouts.userView')
@section('userContent')
<div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">FCS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('ownerdash')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Add Bus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('routeList')}}">Route List</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="mt-5">
        <h2 style="text-align:center;">ADD Bus</h2>
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
        <form class="shadow-lg p-3 mb-5 bg-body rounded row g-3" action="{{route('addBus')}}" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="col-md-7">
                <label for="bus_name" class="form-label">Bus name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="bus name" name="bus_name"
                    value="{{old('bus_name')}}">
                @error('bus name')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-7">
                <label for="Amount of Bus" class="form-label">Amount of Bus</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Amount of Bus" name="Amount_of_Bus"
                    value="{{old('Amount of Bus')}}">
                @error('Amount of Bus')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <br>
            <div class="col-md-7">
                <label for="validationDefaultEmail" class="Trade_Licence">Trade Licence</label>
                <div class="input-group">

                    <input type="Trade_Licence" class="form-control" id="validationDefaultEmail"
                        aria-describedby="inputGroupPrepend2" name="Trade_Licence" placeholder="1234567"
                        value="{{old('Trade_Licence')}}">
                </div>
                @error('Trade Licence')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-md-7">
                <label for="validationDefaultEmail" class="Route_no">Route No.</label>
                <div class="input-group">

                    <input type="Route_no" class="form-control" id="validationDefaultEmail"
                        aria-describedby="inputGroupPrepend2" name="Route_no" placeholder="A-101"
                        value="{{old('Route_no')}}">
                </div>
                @error('Trade Licence')
                <span class="text-danger">{{$message}}</span>
                @enderror
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