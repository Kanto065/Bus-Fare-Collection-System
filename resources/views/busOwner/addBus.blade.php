@extends('layouts.userView')
@section('userContent')
<div>
    <div class="mt-5">
        <h2 style="text-align:center;">ADD Bus</h2>
    </div>
    <div class="container my-5">
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
                <label for="A_O_B" class="form-label">Amount of Bus</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Amount of Bus" name="A_O_B"
                    value="{{old('A_O_B')}}">
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
                <label for="validationDefaultEmail" class="Route_id">Route ID</label>
                <div class="input-group">

                    <input type="Route_id" class="form-control" id="validationDefaultEmail"
                        aria-describedby="inputGroupPrepend2" name="Route_id" placeholder="1"
                        value="{{old('Route_id')}}">
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