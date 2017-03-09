@extends('layouts.main')
@section('page_title','Post Product')
@stop
@section('content')
  <h1 class="page-title">POST Product</h1><hr>
  @include('errors.list')
  {!! Form::open(['url'=>'products' , 'files' => true ]) !!}
      <div class="form-group">
          {!! Form::label('pro_name','Product name: ') !!}
          {!! Form::text('pro_name', null, ['class'=>'form-control ']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('detail','Details: ') !!}
          {!! Form::text('detail', null, ['class'=>'form-control'])!!}
      </div>

      <div class="form-group">
          {!! Form::label('price','Price: ') !!}
          {!! Form::text('price', null, ['class'=>'form-control'])!!}
      </div>

      <div class="form-group">
          {!! Form::label('quantity','Quantity : ') !!}
          {!! Form::text('quantity', null, ['class'=>'form-control'])!!}
      </div>

  <div class="form-group">
          {!! Form::label('images','Product Image: ') !!}
          {!! Form::file('images', null )!!}
      </div>

<!--      <div class="form-group">
          {!! Form::label('images','Image : ') !!}
          {!! Form::text('images', null, ['class'=>'form-control'])!!}
      </div>    -->

      <div class="form-group">
          {!! Form::select('brand_id', $retrieve, Input::old('id')) !!}
      </div>

      <div class="form-group">
          {!! Form::button('',['style' => 'width:250px' ,'class'=>'glyphicon glyphicon-pencil btn btn-primary' , 'type' => 'submit' ]) !!}
      </div>
  {!! Form::close() !!}
@stop