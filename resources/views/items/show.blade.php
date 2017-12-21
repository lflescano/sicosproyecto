@extends('layout')
@section('content')
<h1>Item Show</h1>
{{ $item->id }}
{{ $item->codigo }}
{{ $item->nombre }}

@endsection