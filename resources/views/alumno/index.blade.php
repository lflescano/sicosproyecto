@extends('layout')
@section('content')

<h1>Alumnos</h1>

@foreach($alumnos as $key => $value)
	{{ $value->id }}
	{{ $value->nombre }}
	{{ $value->apellido }}
@endforeach	


@endsection