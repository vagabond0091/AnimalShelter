
@extends('layouts.app')

@section('content')
 {{-- <div class="card-container d-flex w-50 justify-content-between mt-3"> --}}
    <div class="d-flex justify-content-between align-items-center">

    <h3 class="mt-3">List of Health Status</h3>
    <a href="/health/create" class="btn btn-primary mt-2">Create New Health Status</a>
    </div>
    <table class="table  mt-3">
    <thead class="thead table-dark p-3">
        <tr>
            <th>Health ID</th>
            <th>Status</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>

            <th></th>
        </tr>
    </thead>
    <tbody>


@foreach($healths as $health)

        <tr>
            <td>{{ $health->id }}</td>
            <td>{{ $health->status }}</td>

            <td><a href="/health/{{$health->id}}/edit" class="btn btn-primary ml-5">Edit</a></td>
            <td>{!! Form::open(['action' => ['HealthController@destroy', $health->id], 'method' => 'POST','class'=> 'pull-right']) !!}
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
