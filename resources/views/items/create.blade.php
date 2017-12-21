@extends('layout')
@section('content')
{!! Form::open(array('route' => 'items.store','method'=>'POST')) !!}
         @include('items.form')
{!! Form::close() !!}
@endsection