@extends('layouts.main_new')
@section('page_title','Show Product')
@stop
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
      
      
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">{{Auth::user()->name}}</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
            <div class=" col-md-9 col-lg-9 ">
              <table class="table table-user-information">
                <tbody>
                @foreach($data_user as $key)
                  <tr>
                  <td>ID : </td>
                    <td>{{ $key->id }}</td>
                  </tr>
                  <tr>
                    <td>Firstname :</td>
                    <td>{{ $key->name }}</td>
                  </tr>
                  <tr>
                    <td>Lastname : </td>
                    <td>{{ $key->lastname }}</td>
                  </tr>
                  <tr>
                    <td>Email : </td>
                    <td>{{ $key->email }}</td>
                  </tr>
                  <tr>
                    <td>Address : </td>
                    <td>{{ $key->address }}</td>
                  </tr>
                  <tr>
                    <td>Tel : </td>
                    <td>{{ $key->tel }}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer">
            <a href="#" data-original-title="Edit this user" data-toggle="tooltip" type="button" style="width:50px;" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
          $(document).ready(function(){
                var panels = $('.user-infos');
                var panelsButton = $('.dropdown-user');
                panels.hide();
                //Click dropdown
                panelsButton.click(function() {
                //get data-for attribute
                var dataFor = $(this).attr('data-for');
                var idFor = $(dataFor);
                //current button
                var currentButton = $(this);
                idFor.slideToggle(400, function() {
                //Completed slidetoggle
            if(idFor.is(':visible')){
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
             }else{
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
             }
          })
          });
          $('[data-toggle="tooltip"]').tooltip();
          $('button').click(function(e) {
                e.preventDefault();
                alert("This is a demo.\n :-)");
                });
          });
</script>
@stop