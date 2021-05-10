
@extends('layouts.app')

@section('content')
 {{-- <div class="card-container d-flex w-50 justify-content-between mt-3"> --}}
    <div class="d-flex justify-content-between align-items-center">

    <h3 class="mt-3">List of Rescuer</h3>
    <a href="/rescuer/create" class="btn btn-primary mt-2">Create Rescuer</a>
    </div>
    <table class="table mt-3">
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
    <tbody>


@foreach($rescuers as $rescuer)

        <tr>
            <th scope="row">{{ $rescuer->res_name }}</th>
            <td>{{ $rescuer->res_lname }}</td>
            <td>{{ $rescuer->res_addr }}</td>
            <td>{{ $rescuer->res_phone }}</td>
            <td>{{ $rescuer->animal[0]->name }}</td>
             <td><img src="{{  asset('storage/images/'.$rescuer->animal[0]->img_path)}}" alt="" style="width: 150px;height: 150px;"></td>
            <td><a href="/rescuer/{{$rescuer->id}}/edit" class="btn btn-primary ml-5">Edit</a></td>
            <td>{!! Form::open(['action' => ['RescuerController@destroy', $rescuer->id], 'method' => 'POST','class'=> 'pull-right']) !!}
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
