@extends('layouts.main')
@section('page_title','Edit')
@stop
@section('content')
	<h1 class="page-title">Edit: {{ $retrieve->pro_name }}</h1>
	@include('errors.list')
		{!! Form::model($retrieve , ['method' => 'PUT' , 'action' =>['ProductController@update' , $retrieve->id] ,  'files' => true ]) !!}
			@include('layouts._form' , ['submitButtonText' => '<i class="glyphicon glyphicon-pencil"></i>Edit Products'])
		{!!  Form::close() !!}
@stop