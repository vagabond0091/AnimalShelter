@extends('layouts.app')

@section('content')
 {{-- <div class="card-container d-flex w-50 justify-content-between mt-3"> --}}
    <div class="d-flex justify-content-between align-items-center">

    <h3 class="mt-3">List of Animals</h3>
    <a href="/animal/create" class="btn btn-primary mt-2">Add Animal</a>
    </div>
    <table class="table mt-3">
    <thead class="thead table-dark p-3">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Animal Type</th>
            <th>Animal Breed</th>
            <th>Health Status</th>
            <th>Images</th>
            <th></th>
            <th></th>
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
            <td>{{$animal->health->status}}</td>
            <td><img src="{{ asset('storage/images/'. $animal->img_path)}}" alt="" style="width: 150px; height: 150px;"></td>
            <td><a href="/animal/{{$animal->id}}/edit" class="btn btn-primary">Edit</a></td>
            <td>{!! Form::open(['action' => ['AnimalController@destroy', $animal->id], 'method' => 'POST','class'=> 'pull-right']) !!}
                {{Form::hidden('_method', 'DELETE') }}
                {{Form::submit('DELETE',['class' => 'btn btn-danger']) }}
                {!! Form::close() !!}
            </td>
        </tr>


 @endforeach
    </tbody>
 </table>
       {{-- </div> --}}
@endsection
