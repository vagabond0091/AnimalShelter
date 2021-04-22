@extends('layouts.app')

@section('content')
{!! Form::open(['action' => ['AdopterController@update',$adopter->id], 'method' => 'POST']) !!}
    <div class="form-group">
            {{Form::label('adpt_name','Name:')}}
            {{Form::text('adpt_name',$adopter->adpt_name,['class' => 'form-control', 'placeholder' => 'Name'])}}
            {{Form::label('adpt_lname','Last Name:')}}
            {{Form::text('adpt_lname',$adopter->adpt_lname,['class' => 'form-control', 'placeholder' => 'Last Name'])}}
            {{Form::label('adpt_addr','Address:')}}
            {{Form::text('adpt_addr',$adopter->adpt_addr,['class' => 'form-control', 'placeholder' => 'Address'])}}
            {{Form::label('adpt_phone','Phone:')}}
            {{Form::text('adpt_phone',$adopter->adpt_phone,['class' => 'form-control', 'placeholder' => 'Phone'])}}



    </div>

   {{Form::hidden('_method','PUT') }}
    {{Form::submit('Submit',['class' => 'btn btn-primary']) }}
   {!! Form::close() !!}
@endsection
