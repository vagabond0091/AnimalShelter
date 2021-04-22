@extends('layouts.app')

@section('content')
{!! Form::open(['action' => 'AdopterController@store', 'method' => 'POST']) !!}
    <div class="form-group">
            {{Form::label('adpt_fname','Name:')}}
            {{Form::text('adpt_name','',['class' => 'form-control', 'placeholder' => 'Name'])}}
            {{Form::label('adpt_lname','Last Name:')}}
            {{Form::text('adpt_lname','',['class' => 'form-control', 'placeholder' => 'Last Name'])}}
            {{Form::label('adpt_addr','Address:')}}
            {{Form::text('adpt_addr','',['class' => 'form-control', 'placeholder' => 'Address'])}}
            {{Form::label('adpt_phone','Phone:')}}
            {{Form::text('adpt_phone','',['class' => 'form-control', 'placeholder' => 'Phone'])}}

             <div class="form-group">
                    {{Form::label('animal_id','Animal Id')}}
                    {{Form::select('animal_id', $animal_id,null,['class' => 'form-select'])}}
             </div>

    </div>

   {{Form::submit('Submit',['class' => 'btn btn-primary']) }}
   {!! Form::close() !!}
@endsection
