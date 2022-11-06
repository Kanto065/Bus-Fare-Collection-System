@extends('layouts.userView')
@section('userContent')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light mt-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">FCS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Balance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Travel History</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="mt-5 d-flex">
            <div class="col-md-3">
                <input type="name" class="form-control" id="startingPoint" placeholder="From" >
            </div>
            <div class="col-md-3 mx-2">
                <input type="name" class="form-control" id="startingPoint" placeholder="TO" >
            </div>
            <div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
        </div>
        <div>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Route</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Disteance</th>
                <th scope="col">Fare</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
            </tbody>
            </table>
        </div>
    </div>
</body>

</html>
@endsection