@extends('layouts.app')

@section('content')
{!! Form::open(['action' => ['AnimalController@update',$animal->id], 'method' => 'POST']) !!}
    <div class="form-group">
            {{Form::label('name','Name:')}}
            {{Form::text('name',$animal->name,['class' => 'form-control', 'placeholder' => 'Name'])}}
            {{Form::label('age','Age:')}}
            {{Form::text('age',$animal->age,['class' => 'form-control', 'placeholder' => 'Age'])}}
            {{Form::label('gender','Gender:')}}
            {{Form::text('gender',$animal->gender,['class' => 'form-control', 'placeholder' => 'Gender'])}}
            {{Form::label('animal_type','Animal Type:')}}
            {{Form::text('animal_type',$animal->animal_type,['class' => 'form-control', 'placeholder' => 'Animal Type'])}}
            {{Form::label('animal_breed','Animal Breed:')}}
            {{Form::text('animal_breed',$animal->animal_breed,['class' => 'form-control', 'placeholder' => 'Animal Breed'])}}
    </div>
    {{Form::hidden('_method','PUT') }}
    {{Form::submit('Submit',['class' => 'btn btn-primary']) }}
   {!! Form::close() !!}
@endsection
