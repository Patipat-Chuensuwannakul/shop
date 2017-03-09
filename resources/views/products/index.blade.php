@extends('layouts.main')
@section('page_title','Index')
@stop
@section('content')
  <h2><a href="{{ url('products/create') }}">Post a new products</a></h2><hr/>
  <div class="col-sm-12">

  <div class="panel-group">
  @foreach($retrieve as $key)
    <br><br>
    <div class="panel panel-danger">
      <div class="panel-heading">
      Product name : {{ $key->pro_name }}
    <!-- This is the same as Route::('articles/{id}', 'ArticlesController@show');   -->
      </div>
      <div class="panel-body">DetailS : {{ $key->detail }}</div>
      <div class="panel-body">Price : {{ $key->price }}</div>
      <div class="panel-body">Quantity : {{ $key->quantity }}</div>
      <div class="panel-body">
        @if($key->images)
          <img src="{{ url($key->images) }}" class="img-responsive" style="max-width: 200px">
        @else
          <img src="{{ url('images/laravel.png') }}" class="img-responsive" style="max-width: 200px">
        @endif
      </div>
      <div class="panel-footer"><p class="text-xs-right">Created at : {{ $key->created_at }} </p>
          <div class="pull-sm-left"><a href="{{ url('products/'.$key->id.'/edit') }}">  {!! Form::button('',['style' => 'width:250px' ,'class'=>'glyphicon glyphicon-pencil btn btn-primary']) !!} </a> 
          </div> 
          <div class="pull-sm-right">{!! Form::open(array('route' => array('products.destroy', $key->id), 'method' => 'delete')) !!}<button style="width:250px" class="glyphicon glyphicon-trash btn btn-danger" type="submit" ></button>{!! Form::close() !!}
          </div>

      </div>
    </div>
  @endforeach
  </div>
  </div>
@stop