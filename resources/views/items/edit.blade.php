@extends('layout')
@section('content')
{!! Form::open(array('route' => ['items.update', $item->id],'method'=>'PATCH')) !!}
         @include('items.form-edit')
{!! Form::close() !!}
@endsection