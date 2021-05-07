
@extends('layouts.app')

@section('content')
   <h2>Contact Us</h2>
    @if($message = Session::get('sent'))
        <div class="alert alert-success">
            {{session('sent') }}
        </div>
    @endif
    <p id="append">

    </p>
   {!! Form::open(['action' => 'ContactUsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
            {{Form::label('name','Name')}}
            {{Form::text('name','',['class' => 'form-control', 'id' =>'name', 'placeholder' => 'Enter your name'])}}
    </div>
     <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email','',['class' => 'form-control', 'id' =>'email', 'placeholder' => 'Enter your email'])}}
    </div>
     <div class="form-group">
            {{Form::label('message','Message')}}
            {{Form::textarea('message','',['class' => 'form-control', 'id' =>'message', 'placeholder' => 'Enter your message here'])}}
    </div>
    {{Form::submit('Submit',['class' => 'btn btn-primary mt-3']) }}
   {!! Form::close() !!}
@endsection
