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
  <div class="col-md-6 col-md-6">
    <div class="register-box-body">
    <p class="login-box-msg">Add Role</p>
    <form id="add-role" action="#" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="userId" id="userId">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="name" id="name" placeholder="Role name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <label for="" id="error-name" class="text-red"></label>
      </div>
    </form>
      <div class="row">
        <div class="col-xs-6">
          <a href="{{ url('admin/add-role') }}" id="close"  class="btn btn-danger btn-danger btn-block">Cancel</a>
          {{-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div> --}}
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button id="addrole" class="btn btn-primary btn-block btn-flat"><i class="fa fa-plus "></i> Add Role</button>
          <button id="updateRole" class="btn btn-primary btn-block btn-flat">Update</button>
        </div>
        <!-- /.col -->
      </div>
  </div>
  	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Role Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="loadtable">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Role Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                	@php
                		$i=0;
                	@endphp
                @foreach ($role as $d)
                @php
                	$i++;
                @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $d->name }}</td>
                  <td><a  class="btn btn-flat btn-warning" onclick="editRole('{{ $d->id }}')"><i class="fa fa-edit"></i></a></td>
                  <td><a id="delete_role{{ $d->id }}" class="btn btn-flat btn-danger" onclick="deleteRole('{{ $d->id }}')"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>SL</th>
                  <th>Role Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  </div>
<div class="col-md-6 col-sm-6">
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Role Assigning Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="loadtable">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>User</th>
                  <th>Assign</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $i=0;
                  @endphp
                @foreach ($user as $u)
                @php
                  $i++;
                @endphp
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $u->name }}</td>
                  <td>
                    @foreach (App\role::where('id',$u->role_id)->get() as $r)
                      {{$r->name}}
                    @endforeach
                  </td>
                  <td>
                    <input type="hidden" value="{{ $u->id }}" name="uId" id="uId">
                  <select name="roleId" id="roleId" class="form-control">
                    <option>Assign auth...</option>
                    @foreach ($role as $d)
                      <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                  </select>
                  </td>
                  <td><a id="assing_role{{ $u->id }}" class="btn btn-flat btn-success" onclick="assignRole('{{ $u->id }}')"><i class="fa fa-send"></i> Assign Role</a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>SL</th>
                  <th>User</th>
                  <th>Assign</th>
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
$('#addrole').show()
$('#updateRole').hide()
$('#close').hide()

$('#addrole').on('click',function(){
    $(this).html("");
    $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Adding..');
	var name=$('#name').val();
	if (name=="") {
		$('#error-name').show();
		$('#error-name').html('Role name is missing');
	}


$.ajax({
	url:'createRole',
          data:new FormData($("#add-role")[0]),
          dataType:'json',
          type:'post',
          processData: false,
          contentType: false,
          success:function(response){
          	console.log(response);
          	if (response.message=='success') {
            $('#addrole').html("");
            $('#addrole').html('<i class="fa fa-plus "></i> Add Role');
          $('#message').html('<div class="callout callout-success text-center"><h4>Reminder!</h4>Record add successfully!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          });
         location.href="{{ url('admin/add-role') }}";
          	}
          }
});

});


function editRole(i){
	$('#close').show()

	$('#addrole').hide()
	$('#updateRole').show()
	$.post('editRole',{'id':i,'_token':$('input[name=_token]').val()},function(response){
    $('#name').val(response.data[0].name);
		$('#userId').val(response.data[0].id);

	});
};

$('#updateRole').on('click',function(){
   $(this).html("");
    $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Updating..');
	var name=$('#name').val();
	var email=$('#email').val();
	var userId=$('#userId').val();
	$.post('updateRole',{'id':userId,'name':name,'_token':$('input[name=_token]').val()},function(res){
		if (res.data=='success') {
    $('#updateRole').html("");
    $('#updateRole').html('Update');
			$('#message').html('<div class="callout callout-success text-center"><h4>Reminder!</h4>Record update successfully!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          });
          location.href="{{ url('admin/add-role') }}";
          	}
	})
});


function deleteRole(i){
   $('#delete_role'+i).html("");
    $('#delete_role'+i).html('<i class="fa fa-circle-o-notch fa-spin"></i> Deleting..');
	$.post('deleteRole',{'id':i,'_token':$('input[name=_token]').val()},function(res){
		if (res.data=='success') {
       $('#delete_role'+i).html("");
    $('#delete_role'+i).html('<i class="fa fa-trash"></i>');
			$('#message').html('<div class="callout callout-danger text-center"><h4>Reminder!</h4>Record deleted successfully!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          });
          location.href="{{ url('admin/add-role') }}";
          	}
	})
};

function assignRole(i){
  $('#assing_role'+i).html("");
    $('#assing_role'+i).html('<i class="fa fa-circle-o-notch fa-spin"></i> Assigning..');
  var uId=$('#uId').val();
  var roleId=$('#roleId').val();

  $.post('assignRole',{'uId':uId,'roleId':roleId,'_token':$('input[name=_token]').val()},function(res){
    console.log(res);
    if (res.data='success') {
      $('#assing_role'+i).html("");
    $('#assing_role'+i).html('<i class="fa fa-send"></i> Assign Role');
      $('#message').html('<div class="callout callout-success text-center"><h4>Reminder!</h4>Role assigned successfully!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          });
          location.href="{{ url('admin/add-role') }}";
            
    }
  })
}


</script>
@endpush