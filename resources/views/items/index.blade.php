@extends('layout')
@section('content')

<h1>Items</h1>

@foreach($itemsToList as $itemList)
	<p>
	{{ $itemList->id }}
	{{ $itemList->nombre }}
	{{ $itemList->codigo }}
	<a href="{{ route('items.show', ['id' => $itemList->id]) }}" >Ir</a>
	{!! Form::open(['method' => 'DELETE','route' => ['items.destroy', $itemList->id],'style'=>'display:inline']) !!}
	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
	{!! Form::close() !!}
	</p>
@endforeach	

@endsection
