@extends('layouts.app')
@section('navbar')
@if(Auth::guest())
@include('layouts.partial.top-navbar')
@else
@include('layouts.partial.main-header') 
@endif
@endsection
@section('main-sidebar')
@if(Auth::user())
@include('layouts.partial.main-sidebar')
@endif
@endsection
@section('main-content')
@include('login-register-reset-password')
<div id="message"></div>
 <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box">
          <div class="box-header with-border">
          <h3 class="box-title">Applied Job</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No.</th>
                  <th>Company</th>
                  <th>Job Title</th>
                  <th>Applied On</th>
                  <th>Deadline</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                	@foreach ($data as $d)
					<tr>
						<td></td>
						@foreach (App\Company::where('id',$d->company_id)->get() as $c)
						<td>{{ $c->company_name }}</td>
						@endforeach
						<td><a href="{{ url($d->job_post_id.'/'.Auth::user()->id.'/'.str_slug($d->JobTitle)) }}" target="_blank">{{ $d->JobTitle }}</a></td>
						<td>{{ $d->created_at }}</td>
						<td>{{ $d->ApplicationDeadline }}</td>
                    <td><a onclick="application_archived('{{ $d->id }}')" class="btn btn-sm btn-danger btn-flate"><i class="fa fa-trash"></i></a></td>
					</tr>
                	@endforeach
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->

@endsection
@section('control-sidebar')
@if(Auth::user())
@include('layouts.partial.control-sidebar')
@endif

@push('js')
<script type="text/javascript">
function application_archived(i){
	$.post('application_archived',{'id':i,'_token':$('input[name=_token]').val()},function(res){
		$('tbody').load(location.href+' tbody');
    if (res.data=="success") {
       $('#message').html('<div class="callout callout-danger text-center"><h2>Ops!</h2> <h3 id="facheck"><i class="fa fa-trash"></i>Your application is deleted!</div>');
          // $('#ExpectedSalary').val("");
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          // $('#employee_application').load(location.href+' #employee_application');
          });
		}
	})
}	
</script>
<script type="text/javascript" src="{{ asset('js/login-register-reset-password.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
@endpush