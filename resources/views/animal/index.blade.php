@extends('layouts.app')

@section('content')
 {{-- <div class="card-container d-flex w-50 justify-content-between mt-3"> --}}
    <div class="d-flex justify-content-between align-items-center">

    <h3 class="mt-3">List of Animals</h3>
    <a href="/animal/create" class="btn btn-primary mt-2">Add Animal</a>
    </div>
    <table class="table mt-3">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Animal Type</th>
            <th scope="col">Animal Breed</th>
        </tr>
    </thead>
    <tbody>

    @foreach($animals as $animal)

        {{-- <div class="card-deck ">
            <div class="card">
                <img class="card-img-top" src="" alt="No Available Image">
                <div class="card-body">
                 <a href="/animal/{{$animal->id}}"> <h5 class="card-title">{{ $animal->name }}</h5></a>
                  <p class="card-text"><p>{{ $animal->age }}</p></p>
                  <p class="card-text"><p>{{ $animal->gender }}</p></p>
                  <p class="card-text"><p>{{ $animal->animal_type }}</p></p>
                  <p class="card-text"><p>{{ $animal->animal_breed }}</p></p>
                </div>

            </div>
        </div> --}}

        <tr>
            <th scope="row">{{ $animal->name }}</th>
            <td>{{ $animal->age }}</td>
            <td>{{ $animal->gender }}</td>
            <td>{{ $animal->animal_type }}</td>
            <td>{{ $animal->animal_breed }}</td>
            <td><a href="/animal/{{$animal->id}}/edit" class="btn btn-primary">Edit</a></td>
        </tr>


 @endforeach
    </tbody>
 </table>
       {{-- </div> --}}
@endsection
