@extends('layouts.app')

@section('content')
{!! Form::open(['action' => 'HealthController@store', 'method' => 'POST']) !!}
    <div class="form-group ">
        <div class="label-container">
                   <label for="employee_type" class="col-md-4 col-form-label text-md-right ">Health Status</label>
        </div>
        <div class="select-container">
            <select name="status" id="">
                <option value="Not fully cured">Not fully cured</option>
                <option value="fully cured">fully cured</option>
                <option value="rehabilitated ">rehabilitated </option>
            </select>
        </div>



    </div>

   {{Form::submit('Submit',['class' => 'btn btn-primary mt-3 d-block']) }}
   {!! Form::close() !!}
@endsection
