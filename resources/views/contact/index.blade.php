@extends('layouts.app')

@section('content')
 {{-- <div class="card-container d-flex w-50 justify-content-between mt-3"> --}}
    <div class="d-flex justify-content-between align-items-center">

    <h3 class="mt-3">Messages</h3>
    </div>
    <table class="table mt-3">
    <thead class="thead table-dark p-3">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody class="data-messages">

    @foreach($messages as $message)

        <tr>
            <th scope="row">{{ $message->name }}</th>
            <td>{{ $message->email }}</td>
            <td>{{ $message->message }}</td>

            <td>{!! Form::open(['action' => ['ContactUsController@destroy', $message->id], 'method' => 'POST','class'=> 'pull-right']) !!}
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
