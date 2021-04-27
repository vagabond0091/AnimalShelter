
@extends('layouts.app')

@section('content')
 {{-- <div class="card-container d-flex w-50 justify-content-between mt-3"> --}}
    <div class="d-flex justify-content-between align-items-center">

    <h3 class="mt-3">List of Personel</h3>
    <a href="/user/create" class="btn btn-primary mt-2">Create New Personel</a>
    </div>
    <table class="table  mt-3">
    <thead class="thead table-dark p-3">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Employee Type</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>


@foreach($users as $user)

        <tr>
            <th scope="row">{{ $user->name }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->employee_type }}</td>

            <td><a href="/user/{{$user->id}}/edit" class="btn btn-primary ml-5">Edit</a></td>
           {{--  @if(user::user()->employee_type  == "employee" )
                @if($user->name == Auth::user()->name  )

                @else --}}
                <td>{!! Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'POST','class'=> 'pull-right']) !!}
                    {{Form::hidden('_method', 'DELETE') }}
                    {{Form::submit('DELETE',['class' => 'btn btn-danger']) }}
                    {!! Form::close() !!}
                </td>
               {{--  @endif
            @endif --}}
        </tr>


 @endforeach
    </tbody>
 </table>
       {{-- </div> --}}
@endsection
