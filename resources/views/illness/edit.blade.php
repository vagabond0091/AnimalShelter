@extends('layouts.app')

@section('content')
{!! Form::open(['action' => ['IllnessController@update',$illness->id], 'method' => 'POST']) !!}
    <div class="form-group">
            <label for="animal_type" class="col-md-4 col-form-label text-md-right">Illness Status</label>
                <div class="  mb-3">
                    <select name="illness_status" id="">
                        @if($illness->illness_status == "cured")
                        <option value="{{ $illness->illness_status }}">{{ $illness->illness_status }}</option>
                        <option value="not fully cured">Not fully cured</option>
                        <option value="rehabilitated ">Rehabilitated </option>
                        @elseif($illness->illness_status == "not fully cured")
                        <option value="{{ $illness->illness_status }}">{{ $illness->illness_status }}</option>
                        <option value="cured">Cured</option>
                        <option value="rehabilitated ">Rehabilitated </option>
                        @else
                        <option value="{{ $illness->illness_status }}">{{ $illness->illness_status }}</option>
                        <option value="cured">Cured</option>
                        <option value="not fully cured ">Not Fully Cured </option>
                        @endif
                    </select>
                </div>
            {{Form::label('description','Description:')}}
            {{Form::textarea('description',$illness->description,['class' => 'form-control', 'placeholder' => 'Description'])}}



    </div>
   {{Form::hidden('_method','PUT') }}
   {{Form::submit('Submit',['class' => 'btn btn-primary']) }}
   {!! Form::close() !!}
@endsection
