
@extends('layouts.app')

@section('content')
 {{-- <div class="card-container d-flex w-50 justify-content-between mt-3"> --}}
    <div class="d-flex justify-content-between align-items-center">

    <h3 class="mt-3">List of Illness</h3>
    <a href="/illness/create" class="btn btn-primary mt-2">Create New Data</a>
    </div>
    <table class="table  mt-3">
    <thead class="thead table-dark p-3">
        <tr>
            <th>Illness Status</th>
            <th>Description</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Action</th>

            <th></th>
        </tr>
    </thead>
    <tbody>

@foreach($illnesses as $illness)

        <tr>
            <th scope="row">{{ $illness->illness_status }}</th>
            <td>{{ $illness->description }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="/illness/{{$illness->id}}/edit" class="btn btn-primary ml-5">Edit</a></td>
            <td>{!! Form::open(['action' => ['IllnessController@destroy', $illness->id], 'method' => 'POST','class'=> 'pull-right']) !!}
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
