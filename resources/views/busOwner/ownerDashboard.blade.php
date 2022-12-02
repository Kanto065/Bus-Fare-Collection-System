@extends('layouts.userView')
@section('userContent')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>owner DashBoard</title>
</head>

<body>
    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">BFCS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-5">
                        <li class="nav-item ms-5">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="{{route('BusAdd')}}">Add Bus</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="{{route('routeList')}}">Route List</a>
                        </li>
                        <li class="nav-item pe-5 me-5 mx-2">
                            <a class="nav-link active pe-5 me-5" aria-current="page" href="{{route('busList')}}">Bus List</a>
                        </li>
                    </ul>
                </div>
                <div class="ps-5 ms-5">
                    <a class="nav-link active ps-5 ms-5" type="button" aria-expanded="false" aria-current="page" href="{{route('editProfile')}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>   
                        
                        </svg>
                    </a>
                     
                </div>
            </div>
        </nav>
    </div>
</body>

</html>
@endsection