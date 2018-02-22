@extends('admin.layouts.app')
@section('navbar')
@if(Auth::guest('admin'))
@include('admin.layouts.partial.top-navbar')
@else
@include('admin.layouts.partial.main-header') 
@endif
@endsection
@section('main-sidebar')
@if(Auth::user()->role())
@include('admin.layouts.partial.main-sidebar')
@endif
@endsection
@section('main-content')
<div id="message" class="navbar-fixed-top"></div>
<div class="col-md-5 col-sm-5">
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
    <form id="create-user" action="#" method="post">
    	{{ csrf_field() }}
    	<input type="hidden" name="userId" id="userId">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" id="name" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      	<label for="" id="error-name" class="text-red"></label>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      	<label for="" id="error-email" class="text-red"></label>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback" ></span>
      	<label for="" id="error-password" class="text-red"></label>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password-confirm" id="password-confirm" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
    </form>
      <div class="row">
        <div class="col-xs-6">
        	<a href="{{ url('admin/create-user') }}" id="close"  class="btn btn-danger btn-danger btn-block">Cancel</a>
          {{-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div> --}}
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button id="register" class="btn btn-primary btn-block btn-flat">Register</button>
          <button id="updateUser" class="btn btn-primary btn-block btn-flat">Update</button>
        </div>
        <!-- /.col -->
      </div>
  </div>
  <!-- /.form-box -->
  </div>
  <div class="col-md-7 col-md-7">
  	<div class="box">
            <div class="box-header">
              <h3 class="box-title">User Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="loadtable">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                	@php
                		$i=0;
                	@endphp
                @foreach ($data as $d)
                @php
                	$i++;
                @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $d->name }}</td>
                  <td>{{ $d->email }}</td>
                  <td>@foreach (App\role::where('id',$d->role_id)->get() as $r)
                      {{$r->name}}
                    @endforeach
                </td>
                  <td><a  class="btn btn-flat btn-warning" onclick="editUser('{{ $d->id }}')"><i class="fa fa-edit"></i></a></td>
                  <td>@if (Auth::user())
                    {{-- expr --}}
                    @else
                    <a id="delete_user{{ $d->id }}" class="btn btn-flat btn-danger" onclick="deleteUser('{{ $d->id }}')"><i class="fa fa-trash"></i></a>
                  @endif
                </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  </div>
@endsection
@push('js')
<script type="text/javascript">
	 $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });

$('#error-name').hide();	 
$('#error-email').hide();	 
$('#error-password').hide();
$('#register').show()
$('#updateUser').hide()
$('#close').hide()

$('#register').on('click',function(){
   $(this).html("");
    $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Registering..');
	var name=$('#name').val();
	var email=$('#email').val();

	if (name=="") {
		$('#error-name').show();
		$('#error-name').html('Your name is missing');
	}

	if (email=="") {
	$('#error-email').show();
		$('#error-email').html('Your E-Mail is missing');
	}
	var password=$('#password').val();
	var password_confirm=$('#password-confirm').val();
	if (password!=password_confirm) {
	$('#error-password').show();
	$('#error-password').html('Password is not matched');
	};

var dataReset=new FormData($("#create-user")[0]);
$.ajax({
	url:'createUser',
          data:new FormData($("#create-user")[0]),
          dataType:'json',
          type:'post',
          processData: false,
          contentType: false,
          success:function(response){
            $('#create-user').trigger("reset");
          	console.log(response);
          	if (response.message=='success') {
          $('#register').html("");
          $('#register').html('Register');
          $('#message').html('<div class="callout callout-success text-center"><h4>User Register successfully!</h4>Please Assign a role for this user. After assigning this user will be visible in your table</div>');
          $("#message").show().fadeOut(10000).queue(function(n) {   
          $(this).hide(); n();
          });
          $('#loadtable').load(location.href+' #loadtable');
          	}
            else{
              $('#message').html('<div class="callout callout-danger text-center"><h4>Failed!</h4>Something Wrong</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          });
            }
          }
});

});


function editUser(i){
	$('#close').show()

	$('#register').hide()
	$('#updateUser').show()
	$('#password').hide()
	$('#password-confirm').hide()
	$.post('editUser',{'id':i,'_token':$('input[name=_token]').val()},function(response){
		$('#name').val(response.data[0].name);
		$('#email').val(response.data[0].email);
		$('#userId').val(response.data[0].id);

	});
};

$('#updateUser').on('click',function(){
  $(this).html("");
    $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Updating..');
	var name=$('#name').val();
	var email=$('#email').val();
	var userId=$('#userId').val();
	$.post('updateUser',{'id':userId,'name':name,'email':email,'_token':$('input[name=_token]').val()},function(res){
		if (res.data=='success') {
      $('#updateUser').html("");
      $('#updateUser').html('Update');
			$('#message').html('<div class="callout callout-success text-center"><h4>Reminder!</h4>Record update successfully!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          });
          $('#loadtable').load(location.href+' #loadtable');
          	}
	})
});


function deleteUser(i){
   $('#delete_user'+i).text("");
    $('#delete_user'+i).html('<i class="fa fa-circle-o-notch fa-spin"></i>');
	$.post('deleteUser',{'id':i,'_token':$('input[name=_token]').val()},function(res){
		if (res.data=='success') {
      $('#delete_user'+i).html("");
      $('#delete_user'+i).html('<i class="fa fa-trash"><i>');
			$('#message').html('<div class="callout callout-danger text-center"><h4>Reminder!</h4>Record deleted successfully!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          });
          $('#loadtable').load(location.href+' #loadtable');
          	}
	})
}


</script>
@endpush