@extends('layouts.app')

@section('content')
{!! Form::open(['action' => 'AnimalController@store', 'method' => 'POST','enctype' =>'multipart/form-data']) !!}
    <div class="form-group">
            {{Form::label('name','Name:')}}
            {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'Name'])}}
            {{Form::label('age','Age:')}}
            {{Form::text('age','',['class' => 'form-control', 'placeholder' => 'Age'])}}
            {{Form::label('gender','Gender:')}}
            {{Form::text('gender','',['class' => 'form-control', 'placeholder' => 'Gender'])}}
            {{Form::label('animal_type','Animal Type:')}}
            {{Form::text('animal_type','',['class' => 'form-control', 'placeholder' => 'Animal Type'])}}
            {{Form::label('animal_breed','Animal Breed:')}}
            {{Form::text('animal_breed','',['class' => 'form-control', 'placeholder' => 'Animal Breed'])}}

            {{Form::label('Image','Upload Image')}}
            {{Form::file('image',['id' => 'animal_image','class' => 'form-control'])}}


             <div class="form-group">
                    {{Form::label('health','Health Status')}}
                    {{Form::select('health_id', $animal_health,null,['class' => 'form-select'])}}
             </div>

    </div>

   {{Form::submit('Submit',['class' => 'btn btn-primary']) }}
   {!! Form::close() !!}
@endsection
