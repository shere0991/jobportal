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
<div id="delete-archive-msg" class="navbar-fixed-top"></div>
@if (session('message'))
<div id="message">
<div class="callout callout-success text-center"><h2>Great!</h2> <h3 id="facheck"><i class="fa fa-check"></i> Job Posted Successfully!</div>
</div>
@endif
   <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="box">
          <div class="box-header with-border">
          <h3 class="box-title">Published Job</h3>
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
                  <th>Company Type</th>
                  <th>Job Title</th>
                  <th>Published On</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $i=0;
                  @endphp
                  @foreach ($allJobs as $jobs)
                    @php
                      $i++;
                    @endphp
                  <tr>
                    <td></td>
                    <td>
                       @php
                        $company=App\Company::where('id',$jobs->company_id)->get();
                      @endphp
                      @foreach ($company as $co)
                        {{$co->company_name}}
                      @endforeach
                    </td>
                    <td><a href="{{ url('/admin/company/application'.'/'.$jobs->id.'/'.str_slug($jobs->JobTitle)) }}" target="_blank">{{ $jobs->JobTitle }}
                       <span class="label label-success">
                         @php
                        $total_applicants=App\Application::where('job_post_id',$jobs->id)->count();
                        echo $total_applicants;
                        @endphp
                       </span> 
                    </a>
                    </td>
                    <td>


                      @php
                        $date=date_create($jobs->created_at);
                        echo date_format($date,"l jS \of F Y h:i:s A");
                      @endphp
                      | <small>{{ $jobs->created_at->diffForHumans() }}</small>
                     </td>
                    <td><a href="{{ url('admin/job-post/'.$jobs->id.'/edit') }}" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-edit"></i></a></td>
                    <td>{{-- <a href="#" class="btn btn-sm btn-danger btn-flate"><i class="fa fa-trash"></i></a> --}}
                        <div class="btn-group">
                          <button type="button" class="btn btn-danger">Action</button>
                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="#" class="text-yellow"  onclick="archive('{{ $jobs->id }}')">Archive <i class="fa fa-file-archive-o"></i></a></li>
                            <li><a href="#" class="text-red" onclick="parmanently_delete('{{ $jobs->id }}')">Parmanently Delete <i class="fa fa-trash"></i></a></li>
                            {{-- <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li> --}}
                          </ul>
                        </div>
                    </td>
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
@stop
@push('js')
<script>
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

$("#message").show().fadeOut(3000).queue(function(n) {   
  $(this).hide(); n();
    // $('#employee_application').load(location.href+' #employee_application');
  });


function archive(i){
  console.log(i);

  $.post('archive_job',{'id':i,'_token':$('input[name=_token]').val()},function(res){
    if (res.data=='success') {
      console.log(res.data);
      $('#delete-archive-msg').html('<div class="callout callout-warning text-center"><h4>Oh!</h4>You archived this job!</div>');
          $("#message").show().fadeOut(8000).queue(function(n) {
          $(this).hide(); n();
          });
          location.href="{{ url('admin/job-list') }}";
        } 

  });
}

function parmanently_delete(i){
  console.log(i);
  $.post('delete_job',{'id':i,'_token':$('input[name=_token]').val()},function(res){
   
   if (res.data=='success') {
    $('#delete-archive-msg').html('<div class="callout callout-danger text-center"><h4>Ops!</h4>You parmanently deleted this job!</div>');
          $("#message").show().fadeOut(8000).queue(function(n) {
          $(this).hide(); n();
          });
         location.href="{{ url('admin/job-list') }}";
   } 
  });
}
</script>
@endpush