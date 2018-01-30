@extends('layouts.app')

@section('css')
 <link rel="stylesheet" href="{{asset('css/error.css')}}">
@stop

@section('content')
<div class="erreur-cont">
	<div class="flex-cont">
		<h2>{{$e->msg}}</h2>

		<p>{{$e->descp}}</p>
	</div>
</div>
@endsection
