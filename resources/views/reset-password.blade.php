@extends('layouts.app')
@section('content')
<div class="container">
    <div class="mt-5">
        <h2 style="text-align:center;">Reset Password </h2>
    </div>
    <div class="mx-5 my-5">
        <form class="mx-5 col-lg-5" action="" method="put">
            
            <div class="mx-5">
                <label for="validationDefaultEmail" class="form-label ">Email</label>
                <div style="text-align:center;" class="input-group">
                    <input type="email" class="form-control" id="validationDefaultEmail"
                        aria-describedby="inputGroupPrepend2" name="email" placeholder="exemple@mail.com"
                        value="{{old('email')}}">
                </div>
            </div>
            <div class="mx-5">
                <label for="validationDefaultPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                
            </div>
            <div class="mx-5">
                <label for="validationDefaultPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password" placeholder="cPassword" name="cpassword">
            </div>
            <div class="mx-5 my-2">
                <button type="submit" class="btn btn-primary">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection