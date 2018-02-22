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
<div class="callout callout-info" style="height:110px; ">
  <div class="col-md-6 col-sm-6"><img src="{{ asset('storage/admin/images/'.$company_logo) }}" alt=""></div>  
<div class="col-md-6 col-sm-6">
    <h2 class="text-right">@if (empty($company_name))
       	<span class="text-red">Not Found!</span>
       	@else
       	{{ $company_name }}
       @endif
    </h2>
</div>   
</div>
	<div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $company_name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                 <!--  <th>Name</th>
                 <th>Logo</th> -->
                  <th>Job Title</th>
                  <th>Published On</th>
                  <!-- <th>Edit</th>
                  <th>Delete</th> -->
                </tr>
                </thead>
                <tbody>
                	@php
                		$i=0;
                	@endphp
                @foreach ($companies as $company)
                @php
                	$i++;
                @endphp
                <tr>
                  <td>{{ $i }}</td>
                 {{--  <td>{{ $company->company_name }}</td>
                  <td><img class="img-responsive" style="width:90px;height: 90px;" src="{{ asset('storage/admin/images/'.$company->company_logo) }}" alt=""></td> --}}
                  <td><a href="{{ url('/admin/company/application'.'/'.$company->id.'/'.str_slug($company->JobTitle)) }}" target="_blank">{{ $company->JobTitle }}</a></td>
                  <td>{{ $company->created_at->diffForHumans() }}</td>
                 {{--  <td><a href="" class="btn btn-warning btn-flat"><i class="fa fa-edit"></i></a></td>
                  <td><a href="" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a></td> --}}
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>SL</th>
                 <!--  <th>Name</th>
                 <th>Logo</th> -->
                  <th>Job Title</th>
                  <th>Published On</th>
                   <!-- <th>Edit</th>
                  <th>Delete</th> -->
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@stop
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
</script>
@endpush