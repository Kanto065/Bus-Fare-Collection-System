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
                <a class="navbar-brand" href="#">FCS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('admin')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('ListOfRoute')}}">Route List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('ListOfBus')}}">Bus List</a>
                        </li>

                        
                    </ul>
                </div>
            </div>
        </nav>
        <div class="mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Bus Name</th>
                <th scope="col">Amount of Bus</th>
                <th scope="col">Trade Licence</th>
                <th scope="col">Route No</th>
                </tr>
            </thead>
            <tbody>
                @foreach($busListArr as $AddBus)
                <tr>
                    <td>{{$AddBus->bus_name}}</td>
                    <td>{{$AddBus->amount_bus}}</td>
                    <td>{{$AddBus->trade_licence}}</td>
                    <td>{{$AddBus->route_no}}</td>
                    <td><a href="bus_delete/{{$AddBus->id}}">delete</a></td>
                    <td><a href="bus_update/{{$AddBus->id}}">update</a></td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</body>

</html>
@endsection