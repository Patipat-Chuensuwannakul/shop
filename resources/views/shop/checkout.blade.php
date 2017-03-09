@extends('layouts.main_new')
@section('page_title','CheckOut')
@stop
@section('content')
<div class="container">
  <div class="row">
    
    
    <div class="col-md-12">
      <h4>Carts of <strong>{{ Auth::user()->name }}</strong></h4>
      <div class="table-responsive">
        
        <table id="mytable" class="table table-bordred table-striped">
          
          <thead>
            
            <th>quantity</th>
            <th>size</th>
            <th>price</th>
            <th>product name</th>
            <th>brand name</th>
            <th>date</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            @foreach($data_carts as $key)
            <tr>
              <td>{!! Form::model($key, ['method' => 'PUT' , 'action' =>['CartController@update' , $key->id]]) !!}<input id="quantity" type="number" name="quantity" value="{{ $key->quantity }}" min="1" max=""></td>
              <td>{{ $key->size }}</td>
              <td>{{ $key->price }}</td>
              <td>{{ $key->pro_name }}</td>
              <td>{{ $key->brand_name }}</td>
              <td>{{ $key->created_at }}</td>
              <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button>{!!  Form::close() !!}</p></td>
              <td>{!! Form::open(array('route' => array('cart.destroy', $key->id), 'method' => 'delete')) !!}<p data-placement="top" data-toggle="tooltip" title="Delete"><button data-id="{{ $key->id }}" class="btn btn-danger btn-xs" data-title="Delete" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>{!! Form::close() !!}</td>
            </tr>
            @endforeach
            <tr>
              <td><strong>Total Price : {{ $total }} BATH</strong></td>
            </tr>
          </tbody>
          
        </table>
      </div>
      
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $("#mytable #checkall").click(function () {
          if ($("#mytable #checkall").is(':checked')){
            $("#mytable input[type=checkbox]").each(function (){
            $(this).prop("checked", true);
        });
        }else{
             $("#mytable input[type=checkbox]").each(function () {
              $(this).prop("checked", false);
           });
         }
        });
        $("[data-toggle=tooltip]").tooltip();
      });
</script>
@stop