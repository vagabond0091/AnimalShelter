@extends('layouts.app')

@section('content')
{!! Form::open(['action' => 'IllnessController@store', 'method' => 'POST']) !!}
    <div class="form-group">
            <label for="animal_type" class="col-md-4 col-form-label text-md-right">Illness Status</label>
                <div class="  mb-3">
                    <select name="illness_status" id="">
                        <option value="not fully cured">Not fully Cured</option>
                        <option value="cured">Cured</option>
                        <option value="rehabilitated ">Rehabilitated </option>
                    </select>
                </div>
            {{Form::label('description','Description:')}}
            {{Form::textarea('description','',['class' => 'form-control', 'placeholder' => 'Description'])}}

             <div class="form-group">
                    {{Form::label('animal_id','Animal Name')}}
                    {{Form::select('animal_id', $animal_id,null,['class' => 'form-select'])}}
             </div>


    </div>

   {{Form::submit('Submit',['class' => 'btn btn-primary']) }}
   {!! Form::close() !!}
@endsection
