@extends('layouts.main_new')
@section('page_title','Show Product')
@stop
@section('content')
<div class="container">
    <br><br>
    <div class="row">
    <?php 
      $i=0;
      count($retrieve); 
    ?>
    <div class="row">
    @foreach($retrieve as $key)
    <?php $i++;?>
      <div class="col-sm-2">
        <div class="panel panel-primary">
          <div class="panel-heading">{{ $key->pro_name }}</div>
          <div class="panel-body"><img src="{{ url($key->images) }}" class="img-responsive" style="margin-right:auto; margin-left:auto; width:80px" alt="Image"></div>
          <div class="panel-footer" ><span><strong>PRICE : </strong>{{ $key->price }} BATH</span>
          <div class="model" style="display:inline; margin-left:auto;"><button id="details" type="button" class="btn btn-info" data-id="{{ $key->id }}" >details</button></div>
        </div>
        </div>
      </div>
      <?php 
          if($i%6==0){
            echo "</div>";
            echo "<br>";
            echo "<div class='row'>";
          }
      ?>
    @endforeach
    </div>
    <!-- Modal  -->
        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content  -->
          <div class="modal-content">
            <div id="get_pro_id" data_id="" class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><strong>Modal1</strong></h4>
            </div>
            <div class="modal-body"><img id="image_src" src="" class="img-responsive" style="margin-right:auto; margin-left:auto; width:55%" alt="Image">
              <br><br><p>Modal</p>
            </div>
            <div class="modal-footer">
             {!! Form::open(array('url'=>'ajax/store','method'=>'POST', 'id'=>'dialog-form' , 'class' => 'form-inline' )) !!}
                <div class="form-group" style="float:left;padding:15px">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input id="quantity" type="number" name="quantity" value="1" min="1" max="">
                  <select class="form-control" id="select">
                    <option id="option1" value="SIZE 39.5EURO">SIZE 39.5EURO</option>
                    <option id="option2" value="SIZE 40.5EURO">SIZE 40.5EURO</option>
                    <option id="option3" value="SIZE 41.5EURO">SIZE 41.5EURO</option>
                    <option id="option4" value="SIZE 42.5EURO">SIZE 42.5EURO</option>
                  </select>
                  </div>
                @if(Auth::check())
                  <div class="form-group" style="padding:15px">   <button id="add" type="submit" class="btn btn-success" data-dismiss="modal">ADD</button></div>
                @endif
                  <div class="form-group" style="float:right; padding:15px">   <button id="close" type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button></div>
                   {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
  <!--  End Modal -->
</div><br>
@stop
