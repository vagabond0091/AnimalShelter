@extends('layouts.app')

@section('content')
{!! Form::open(['action' => ['UserController@update',$user->id], 'method' => 'POST']) !!}
    <div class="form-group">
            {{Form::label('name','Name:')}}
            {{Form::text('name',$user->name,['class' => 'form-control', 'placeholder' => 'Name'])}}
            {{Form::label('email','Email:')}}
            {{Form::text('email',$user->email,['class' => 'form-control', 'placeholder' => 'Email'])}}

                       <label for="employee_type" class="col-md-4 col-form-label text-md-right">Employee Type</label>
                            <div class="  mb-3">
                                <select name="employee_type" id="">
                                    <option value="employee">Employee</option>
                                    <option value="veterinarians">Veterinarians</option>
                                    <option value="volunteers">Volunteers</option>
                                </select>
                            </div>




    </div>
    {{Form::hidden('_method','PUT') }}
   {{Form::submit('Submit',['class' => 'btn btn-primary']) }}
   {!! Form::close() !!}
@endsection
