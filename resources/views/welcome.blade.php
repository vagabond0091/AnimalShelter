@extends('layouts.app')

@section('content')
 {{-- <div class="card-container d-flex w-50 justify-content-between mt-3"> --}}



    <div class="container">
         <div class="card-deck d-flex  ">
    @foreach($animals as $animal)


            <div class="card"style="width: 18rem; margin-right: 25px;">
                <img class="card-img-top" style="width:100%; height:163px" src="{{ asset('storage/images/'. $animal->img_path)}}" alt="No Available Image">
                <div class="card-body">
                <h5 class="card-title"><span>Age: </span>&nbsp;<b>{{ $animal->name }}</b></h5>
                  <p class="card-text"><span>Age: </span>&nbsp;<b>{{ $animal->age }}</b></p>
                  <p class="card-text"><span>Gender: </span>&nbsp;<b>{{ $animal->gender }}</b></p>
                  <p class="card-text"><span>Animal Type: </span>&nbsp;<b>{{ $animal->animal_type }}</b></p>
                  <p class="card-text"><span>Animal Breed: </span>&nbsp;<b>{{ $animal->animal_breed }}</b></p>
                  <p class="card-text"><span>Health Status: </span>&nbsp;<b>{{$animal->health->status}}</b></p>
                </div>

            </div>


 @endforeach
 </div>
    </div>
       {{-- </div> --}}
@endsection
