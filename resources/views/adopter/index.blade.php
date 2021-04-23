
@extends('layouts.app')

@section('content')
 {{-- <div class="card-container d-flex w-50 justify-content-between mt-3"> --}}
    <div class="d-flex justify-content-between align-items-center">

    <h3 class="mt-3">List of Adopters</h3>
    <a href="/adopter/create" class="btn btn-primary mt-2">Create New Adopters</a>
    </div>
    <table class="table  mt-3">
    <thead class="thead table-dark p-3">
        <tr>
            <th>Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Animal ID</th>
            <th>Animal Name</th>
            <th></th>
            <th></th>

            <th></th>
        </tr>
    </thead>
    <tbody>


@foreach($adopters as $adopter)

        <tr>
            <th scope="row">{{ $adopter->adpt_name }}</th>
            <td>{{ $adopter->adpt_lname }}</td>
            <td>{{ $adopter->adpt_addr }}</td>
            <td>{{ $adopter->adpt_phone }}</td>
            <td>{{ $adopter->animal[0]->id}}</td>
            <td>{{ $adopter->animal[0]->name}}</td>

            <td><a href="/adopter/{{$adopter->id}}/edit" class="btn btn-primary ml-5">Edit</a></td>
            <td>{!! Form::open(['action' => ['AdopterController@destroy', $adopter->id], 'method' => 'POST','class'=> 'pull-right']) !!}
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
