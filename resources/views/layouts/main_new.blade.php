<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shop -@yield('page_title')</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */
    .navbar {
    margin-bottom: 50px;
    border-radius: 0;
    }
    div.panel-heading{
      text-align: center;
    }
    /* Add a gray background color and some padding to the footer */
    footer {
    background-color: #f2f2f2;
    padding: 25px;
    }
    </style>
   
    {!! HTML::script('js/jquery.slide.js') !!}
    {!! HTML::script('js/jquery-func.js') !!}
    {!! HTML::script('js/jquery.jcarousel.pack.js') !!}
  </head>
  <body>
  <!-- Carousel -->
      <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="1500" data-pause="hover">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="{{ url('bg/oni1.jpg') }}" style="width:100%; height:700px; ">
            <div class="carousel-caption">
              <h3>New York</h3>
              <span>The atmosphere in New York is lorem ipsum.</span>
            </div>
          </div>
          <div class="item">
            <img src="{{ url('bg/oni2.jpg') }}" style="width:100%; height:700px; ">
            <div class="carousel-caption">
              <h3>Chicago</h3>
              <span>Thank you, Chicago - A night we won't forget.</span>
            </div>
          </div>
          
          <div class="item">
            <img src="{{ url('bg/oni3.jpg') }}"  style="width:100%; height:700px; ">
            <div class="carousel-caption">
              <h3>LA</h3>
              <span>Even though the traffic was a mess, we had the best time playing at Venice Beach!</span>
            </div>
          </div>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

  <!-- END Carousel -->


  <!--  <div class="jumbotron">
      <div class="container text-center">
        <h1>Online Store</h1>
        <p>Mission, Vission & Values</p>
      </div>
    </div>  -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/index') }}">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          @if(Auth::guest())
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url('/index') }}">Home</a></li>
            <li><a href="{{ url('index/register') }}">Register</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('index/login') }}"><span class="glyphicon glyphicon-user"></span> Login</a>
            </li>
          </ul>
          @else
          <ul class="nav navbar-nav">
          {{session()->flash('flash_message',Auth::user()->id)}}
            <li class="active"><a href="#">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a id="reference" auth="{{ Auth::user()->name }}" href="#myPage">{{ Auth::user()->name }}</a></li>
            <li><a href="{{ url('index/account') }}"><span class="glyphicon glyphicon-user"></span> your Account</a></li>
            <li><a href="{{ url('index/checkout/'.Auth::user()->name)}}"><span class="glyphicon glyphicon-shopping-cart"></span> Cart<span id="cart-count" class="badge">0</span></a></a></li>
            <li><a href="{{ url('index/logout') }}">Logout</a></li>
          </ul>
          @endif
        </div>
      </div>
    </nav>




    @yield('content')




    <footer class="container-fluid text-center">
      <span>Online Store Copyright</span>
      <form class="form-inline">Get deals:
        <input type="email" class="form-control" size="50" placeholder="Email Address">
        <button type="button" class="btn btn-danger">Sign Up</button>
      </form>
    </footer>
<script>
CartCount();
<!-- THIS IS LAST -->
/*  $(document).ready(function(){
    $("button#details").click(function(){
            var data_id = $(this).attr('data-id');
            var data_detail = $(this).attr('data-detail');
            var data_images = $(this).attr('data-images');
            var data_quantity = $(this).attr('data-quantity');
                $("#myModal").modal();
                $('.modal-title').html($(this).attr('data-pro_name'));
                $('p').html("Detail : "+data_detail);
                $('#image_src').attr('src', data_images);
//              $('#quantity').attr('max', data_quantity);
//           var data_size1 = document.getElementById("select").value;
//           var data_size2 = $("#select option:selected" ).text();
    $(document).on('click' , 'button#add' , function() {
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });
                var data_auth = $('a#reference').attr('auth');
  //            var data_size1 = document.getElementById("select").value;
                var data_size = $("#select option:selected" ).text();
                var quantity = document.getElementById("quantity").value;
                if(quantity>data_quantity){
                  alert('quantity is over !!');
                }else{
                 $.ajax({
                  type: 'POST' ,
                  url: 'ajax',
                  data: {
                    'pro_id': data_id ,
                    'quantity' : data_quantity ,
                    'size' : data_size ,
                    'session' : data_auth ,
                   },
                  success: function (result) {
                            $('#cart-count').html(result);
                  },
                  error: function(){
                            alert('FAIL!!');
                  }
            });
            }
    });
 });
});       */
<!--END THIS IS LAST -->

  function CartCount(){
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });
      var data_auth = $('a#reference').attr('auth');
      // alert(data_auth);
    $.ajax({
      type: 'post',
      url: 'ajax/getcart',
      data: { 
        'session' : data_auth ,
      },
      success: function(result){
        $('#cart-count').html(result);
      }
    });
  }
  $(document).ready(function(){
    $("button#details").click(function(){
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });
            var data_id = $(this).attr('data-id');
             $.ajax({
                  type: 'POST' ,
                  url: 'ajax/getdata',
                  data: {
                    'id': data_id ,
                   },
                  success: function (result) {
                            $("#myModal").modal();
                            $('div#get_pro_id').attr('data_id',result[0]['id']);
                            $('.modal-title').html(result[0]['pro_name']);
                            $('p').html(result[0]['detail']);
                            $('#image_src').attr('src', result[0]['images']);
                            // $('#quantity').attr('max', result[0]['quantity']);
                            // $('#quantity').attr('value',);
                //            alert(result[0]['id']+" AND "+result[0]['images']);
                  },
                  error: function(){
                            alert('Getdata FAIL!!');
                  }
            });
      });
      //   $("button#delete").click(function(){
      //  $.ajaxSetup({
      //   headers: {
      //       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //   }
      //  });
      //       var data_id = $(this).attr('data-id');
      //        $.ajax({
      //             type: 'POST' ,
      //             url: 'ajax/delete',
      //             data: {
      //               'id': data_id ,
      //              },
      //             success: function (result) {
      //                       alert('SUCCESS');
      //             },
      //             error: function(){
      //                       alert('Delete FAIL!!');
      //             }
      //       });
      // });

//              $('#quantity').attr('max', data_quantity);
//           var data_size1 = document.getElementById("select").value;
//           var data_size2 = $("#select option:selected" ).text();

    $(document).on('click' , 'button#add' , function() {
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });
                var data_id = $('div#get_pro_id').attr('data_id');
                var data_auth = $('a#reference').attr('auth');
  //            var data_size1 = document.getElementById("select").value;
                var data_size = $("#select option:selected" ).text();
                var data_quantity = document.getElementById("quantity").value;
  
                 $.ajax({
                  type: 'POST' ,
                  url: 'ajax/store',
                  data: {
                    'pro_id': data_id ,
                    'quantity' : data_quantity ,
                    'size' : data_size ,
                    'session' : data_auth ,
                   },
                  success: function (result) {
                            $('#cart-count').html(result);
                  },
                  error: function(){
                            alert('FAIL!!');
                  }
            });
    });

}); 
</script>
  </body>
</html>