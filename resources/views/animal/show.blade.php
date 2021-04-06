@extends('layouts.app')

@section('content')

<a href="/posts" class="btn btn-primary">Go back</a>
     <h1>{{ $animal->name }}</h1>
     <div>
         {{ $animal->age }}
     </div>
@endsection
