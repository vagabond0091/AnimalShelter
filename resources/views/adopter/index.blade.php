
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
            <th>Animal Name</th>
            <th>Animal Image</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody class="data-adopter">


           {{--  <td>{!! Form::open(['action' => ['AdopterController@destroy', $adopter->id], 'method' => 'POST','class'=> 'pull-right']) !!}
                {{Form::hidden('_method', 'DELETE') }}
                {{Form::submit('DELETE',['class' => 'btn btn-danger']) }}
                {!! Form::close() !!}
            </td> --}}
    </tbody>
 </table>
@endsection
