<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Example 21-4</title>
    <style>
    </style>
    <script src="js/jquery-2.1.1.min.js"> </script>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    </script>
    <script>
    $(document).on('click' , 'button#add' , function() {
    //  var data_id = $('#data_id').val();
    //    alert($('#dialog-form').serializeArray());
    var data = $('#quantity').val();
    $.ajax({
        type: 'POST',
        url: 'ajax',
        data: data ,
        success: function (result) {
          alert(result);
          $('#cart-count').html(result);
        },
        error: function(){
          alert('fail');
        }
    });
    });
    </script>
  </head>
  <body>
    <!--  Nav bar -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Deals</a></li>
            <li><a href="#">Stores</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<span id="cart-count" class="badge">7</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Nav bar -->
    <!-- Content -->
    <div id="content">
      <!-- Tabs -->
      <div class="tabs">
        <ul>
          <li><a href="#" class="active"><span>Safety Shoes</span></a></li>
        </ul>
      </div>
      <!-- Tabs -->
      <!-- Container -->
      <div id="container">
        <div class="tabbed">
          <!-- First Tab Content -->
          <div class="tab-content" style="display:block;">
            <div class="items">
              <div class="cl">&nbsp;</div>
              <ul>
                <li>
                  <div class="image"> <a href="#"><img src="css/images/image1.jpg" alt="" /></a> </div>
                  <p>Brand Name: Nike</p>
                  <p>Price: <strong>4500 BATH</strong></p>
                  <div class="model"><button id="details" data-id="40" type="button" class="btn btn-info" >details</button></div>
                </li>
              </ul>
              <div class="cl">&nbsp;</div>
            </div>
          </div>
          <!-- End First Tab Content -->
        </div>
      </div>
      <!-- End Container -->
    </div>
    <!-- End Content -->
    
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <p>Some text in the modal.</p>
          </div>
          <div class="modal-footer">
            {!! Form::open(array('url'=>'test','method'=>'POST', 'id'=>'dialog-form' , 'class' => 'form-inline' )) !!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group" style="float:left;padding:15px">
              <input id="quantity" type="number" name="quantity" value="1" min="1"></div>
              <div class="form-group" style="padding:15px">   <button id="add" type="submit" class="btn btn-success" data-dismiss="modal">ADD</button></div>
              <div class="form-group" style="float:right; padding:15px">   <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button></div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
      <!--End Modal -->
      <script>
      $(document).ready(function(){
      $("#details").click(function(){
      $("#myModal").modal();
      });
      });
      </script>
    </body>
  </html>