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
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nice!
        <small>Your are being ready to apply</small>
      </h1>
      {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
      <div id="message"></div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><strong>{{ $job_title }}</strong></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
           @php
               $cv=App\User::where('Username',Auth::user()->Username)->get();
                 $check_cv="";
               @endphp
              @foreach ($cv as $c)
                @php
                  $check_cv.=$c->CV;
                @endphp
          <form action="" id="employee_application" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
             <div class="col-md-6 col-sm-6">
                <div class="form-group" >
                  <label>Enter Your Expected Salary</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <span>৳</span>
                    </div>
                    <input type="hidden" name="job_post_id" id="job_post_id" value="{{ $ids }}">
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control">
                    <input type="text" class="form-control" name="ExpectedSalary" id="ExpectedSalary" autofocus="true"/>
                  </div>
                  <!-- /.input group -->
                </div>
             </div>
             <div class="col-md-6 col-sm-6">
              <div id="form_cv">
              {{-- @foreach($check_appalication as $a) --}}
              {{-- @if($a->job_posts_id==$ids && $a->users_id==Auth::user()->id) --}}
               {{-- <h2 class="text-default">You allready applied! {{ $ids }}</h2> --}}
               {{-- @else --}}
               
              
              @endforeach

              @if ($check_cv!=NUll)
               <h2 class="text-aqua">Your Uploaded CV is Attached!</h2>
               @else
                 <div class="form-group">
                  <div id="file_msg"></div>
                   <label for="exampleInputFile" class="text-aqua">Upload CV</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-file text-aqua"></i>
                    </div>
                    <input type="file" id="cv" name="cv"/>
                  </div>
                  <!-- /.input group -->
                </div>
              @endif
               {{-- @endif --}}
              {{-- @endforeach --}} 
              </div>
             </div>
         </form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="col-md-3">
            <div class="form-group"><a class="btn btn-success btn-lg btn-flat" id="apply_now"><i class="fa fa-send">&nbsp;</i>Apply Now</a></div>
          </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
@section('control-sidebar')
@if(Auth::user())
@include('layouts.partial.control-sidebar')
@endif
@endsection

@push('js')
<script type="text/javascript">
// $('#cv').on('click',function(){
//   var cv=$(this).val();
//   console.log('this is my'+ cv);
// })

  $('#apply_now').on('click',function(){
    $(this).html("");
    $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Apply Now');
    var job_posts_id=$('#job_posts_id').val();
    var users_id=$('#users_id').val();
    var ExpectedSalary=$('#ExpectedSalary').val();
    if ($('#cv').val()!="") {
    // var file=$('#cv')[0].files[0].name;
    $.ajax({
      url:'employee_application',
      data:new FormData($("#employee_application")[0]),
      dataType:'json',
      type:'post',
      processData: false,
      contentType: false,
      success:function(response){
        console.log(response);
            if(response.data=="success"){
              $('#cv').val("");
              $('#apply_now').html("");
              $('#apply_now').html('<i class="fa fa-send"></i>&nbsp;Apply Now');
          $('#message').html('<div class="callout callout-success"><h4>Comgratulation!</h4> {{ Auth::user()->FirstName }} {{ Auth::user()->LastName }} , You are applied successfully for this position!</div>');
          $('#ExpectedSalary').val("");
          $("#message").show().fadeOut(8000).queue(function(n) {   
          $(this).hide(); n();
          // $('#employee_application').load(location.href+' #employee_application');
          });   
        }
        else if(response.data=="exist"){
           $('#apply_now').html("");
              $('#apply_now').html('<i class="fa fa-send"></i>&nbsp;Apply Now');
          $('#ExpectedSalary').val("");
          $('#message').html('<div class="callout callout-danger"><h4>Reminder!</h4>You Already Applied!</div>');
          $("#message").show().fadeOut(8000).queue(function(n) {
          $(this).hide(); n();
          });  
       
        }
         $('#form_cv').load(location.href+' #form_cv');
    
      },
    });
   }else{
    $('#apply_now').html("");
    $('#apply_now').html('<i class="fa fa-send"></i>&nbsp;Apply Now');
    $('#file_msg').html("<label class='text-red'>Please upload your cv then apply!</label>");
   } 
});
</script>
<script type="text/javascript" src="{{ asset('js/login-register-reset-password.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
@endpush
