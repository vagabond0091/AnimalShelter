@extends('layouts.app')

@section('content')
{!! Form::open(['action' => 'AnimalController@store', 'method' => 'POST','enctype' =>'multipart/form-data','id' => 'Forms']) !!}
    <div class="form-group d-block">
            {{Form::label('name','Name:',['class'=>'d-block'])}}
            {{Form::text('name','',['class' => 'form-control name', 'placeholder' => 'Name'])}}
            {{Form::label('age','Age:',['class'=>'d-block'])}}
            {{Form::text('age','',['class' => 'form-control', 'placeholder' => 'Age'])}}
            {{Form::label('gender','Gender:',['class'=>'d-block'])}}
            {{Form::text('gender','',['class' => 'form-control', 'placeholder' => 'Gender','id'=>'gender'])}}
            <label for="animal_type" class="col-md-4 col-form-label text-md-right d-block">Animal Type</label>
                            <div class="  mb-3">
                                <select name="animal_type" id="">
                                    <option value="Dog">Dog</option>
                                    <option value="Cat">Cat</option>
                                    <option value="Bird">Bird</option>
                                </select>
                            </div>
           {{--  {{Form::label('animal_type','Animal Type:')}}
            {{Form::text('animal_type','',['class' => 'form-control', 'placeholder' => 'Animal Type'])}} --}}
            {{Form::label('animal_breed','Animal Breed:',['class'=>'d-block'])}}

            {{Form::text('animal_breed','',['class' => 'form-control', 'placeholder' => 'Animal Breed'])}}

            {{Form::label('Image','Upload Image',['class'=>'d-block'])}}
            {{Form::file('image',['id' => 'animal_image','class' => 'form-control'])}}


             <div class="form-group">
                    {{Form::label('health','Health Status')}}
                    {{Form::select('health_id', $animal_health,null,['class' => 'form-select'])}}
             </div>

    </div>

   {{Form::submit('Submit',['class' => 'btn btn-primary']) }}
   {!! Form::close() !!}
@endsection
