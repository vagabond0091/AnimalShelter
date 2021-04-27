@extends('layouts.app')

@section('content')
{!! Form::open(['action' => 'RescuerController@store', 'method' => 'POST']) !!}
    <div class="form-group">
            {{Form::label('fname','Name:')}}
            {{Form::text('res_name','',['class' => 'form-control', 'placeholder' => 'Name'])}}
            {{Form::label('lname','Last Name:')}}
            {{Form::text('res_lname','',['class' => 'form-control', 'placeholder' => 'Last Name'])}}
            {{Form::label('addr','Address:')}}
            {{Form::text('res_addr','',['class' => 'form-control', 'placeholder' => 'Address'])}}
            {{Form::label('res_phone','Phone:')}}
            {{Form::text('res_phone','',['class' => 'form-control', 'placeholder' => 'Phone'])}}

             <div class="form-group">
                    {{Form::label('animal_id','Animal Name')}}
                    {{Form::select('animal_id', $animal_id,null,['class' => 'form-select'])}}
             </div>

    </div>

   {{Form::submit('Submit',['class' => 'btn btn-primary']) }}
   {!! Form::close() !!}
@endsection
