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
<div id="message"></div>
<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary" id="profile-photo">
            <div class="box-body box-profile">
             {{--  <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> --}}
              @foreach($profile_details as $photo)
                <img class="profile-user-img img-responsive img-circle"  src="{{ asset('storage/employee_photo/'.$photo->Photo) }}" alt="">
              @endforeach

              <h3 class="profile-username text-center">{{ Auth::user()->FirstName." ".Auth::user()->LastName }}</h3>

              <p class="text-muted text-center">{{ $Possition }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Job Applied</b> <a class="pull-right">5</a>
                </li>
                <li class="list-group-item">
                  <b>ShortList</b> <a class="pull-right">2</a>
                </li>
                <li class="list-group-item">
                  <b>Interview Call</b> <a class="pull-right">1</a>
                </li>
              </ul>

              {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                {{ $Education }} from the {{ $Institution }} 
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Bangladesh</p>

              <hr>

            {{--   <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p> --}}

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Experience</strong>

              <p>{{ $Experience }}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Upload CV</a></li>
              <li><a href="#timeline" data-toggle="tab">Update Details</a></li>
              <li><a href="#settings" data-toggle="tab">Upload Photo</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="box-body">
          <div class="col-md-12">
            <form action="" method="POST" id="upload-cv" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token()}}">
              <div id="reloadcv">
              {{-- {{ csrf_field() }} --}}
              <div class="box-body">
                <div class="col-md-6"><div class="form-group">
                  <label for="exampleInputFile" class="text-aqua"><h3>Upload CV</h3></label>
                  <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                  <input type="file" id="cv" name="cv"/>

                  {{-- <p class="help-block">Example block-level help text here.</p> --}}
                </div>
              </div>
                <div class="col-md-6">
                <center>
                  <div class="profile-cv">
                  @foreach($profile_details as $cv)
                  @if ($cv->CV!="")
                     <img style="width:140px;height:140px;" class="img-responsive" src="{{ asset('storage/employee_cv/cv.png') }}" alt="">
                    @else 
                    <center>CV Not Found!</center>
                  @endif
                  @endforeach
                </div>
                </center>
                </div>
              </div>
              <!-- /.box-body -->
              </div>
             </form>
              <div class="box-footer">
                  {{-- <center> --}}
                    <a class="btn btn-app btn-success bg-green"  id="save-cv">
                      <i id="cv-icon" class="fa fa-save"></i>CV Save
                    </a>
                  {{-- </center> --}}
                  {{-- <button type="submit" id="save-cv" class="btn btn-success btn-flat" >Save</button> --}}
              </div>
           
          </div>
        </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <form class="form-horizontal" id="updateDetails" action="" method="post">
                  {{-- {{ csrf_field() }} --}}
                  <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="page-header">
                  {{-- <span class="col-md-2"></span> --}}
                  <h3>Your Recent Employee History</h3>
                </div>
                <!-- Hidden input box -->
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                  <div class="form-group">
                    <label for="Education" class="col-sm-2 control-label">Education</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="Education" value="{{$Education}}" id="Education" placeholder="e.g. B.S. in Computer Science ">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="University" class="col-sm-2 control-label">Institution</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="Institution" value="{{$Institution}}" id="Institution" placeholder="Educational Institution: School/Collage/University">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Company" class="col-sm-2 control-label">Company</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="Company" value="{{$Company}}" id="Company" placeholder="Company">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Possition" class="col-sm-2 control-label">Possition</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="Possition" value="{{$Possition}}" id="Possition" placeholder="Possition">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Experience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" name="Experience" id="Experience" placeholder="Experience(Optional)">{{$Experience}}</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="TotalYearsExperience" class="col-sm-2 control-label">Total Employee Experience</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="TotalYearsExperience" value="{{$TotalYearsExperience }}" id="TotalYearsExperience" placeholder="Total Years of Employee Experience">
                    </div>
                  </div>
                  {{-- <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div> --}}
                </form>
                  <div class="box-footer">
                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" id="update-profile" class="btn btn-danger">Update</button>
                    </div>
                  </div>
                  </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <div class="box-body">
            <div class="col-md-12">
              <form id="upload-photo" action="" enctype="multipart/form-data" method="POST">
                {{-- {{ csrf_field() }} --}}
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div id="reloadphoto">
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                <div class="box-body">
                  <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleInputFile" class="text-aqua"><h3>Upload Picture</h3></label>
                    <input type="hidden" id="users_id" name="users_id" value="{{ Auth::user()->id }}">
                    <input type="file" id="photo" name="photo">

                    {{-- <p class="help-block">Example block-level help text here.</p> --}}
                  </div>
                  </div>
                  <div class="col-md-6">
                    <center>
                      <div class="profile-photo">
                       @foreach($profile_details as $photo)
                        <img style="width:140px;height:140px;" class="img-responsive" src="{{ asset('storage/employee_photo/'.$photo->Photo) }}" alt="">
                      @endforeach
                    </div>
                  </center>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              </form>

                <div class="box-footer">
                    {{-- <center> --}}
                      <a class="btn btn-app btn-success bg-green" id="save-photo">
                        <i class="fa fa-save"></i> Photo Save
                      </a>
                    {{-- </center> --}}
                </div>
            </div>
          </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->

          <div class="box">
            <div class="box-header">
              {{-- <h3 class="box-title">Striped Full Width Table</h3> --}}
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped table-hover">
                <tr>
                  <th style="width: 10px"></th>
                  <th>Employee Details</th>
                  {{-- <th>Progress</th>
                  <th style="width: 40px">Label</th> --}}
                </tr>
                <tr>
                  <td>1.</td>
                  <td><strong>Education: </strong>{{$Education}}</td>
                  {{-- <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red">55%</span></td> --}}
                </tr>
                <tr>
                  <td>2.</td>
                  <td><strong>Institution: </strong>{{$Institution}}</td>
                {{--   <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">70%</span></td> --}}
                </tr>
                <tr>
                  <td>3.</td>
                  <td><strong>Company: </strong>{{$Company}}</td>
                 {{--  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">30%</span></td> --}}
                </tr>
                <tr>
                  <td>4.</td>
                  <td><strong>Possition: </strong>{{$Possition}}</td>
                 {{--  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td> --}}
                </tr>
                <tr>
                  <td>5.</td>
                  <td><strong>Experience: </strong>{{ $Experience }}</td>
                </tr>
                <tr>
                  <td>6.</td>
                  <td><strong>Total Employee Experience: </strong>{{$TotalYearsExperience }} <span class="text-aqua">Years</span></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
@stop
@section('control-sidebar')
@if(Auth::user())
@include('layouts.partial.control-sidebar')
@endif

{{-- <script src="{{ asset('/components/bower_components/jquery/dist/jquery.min.js') }}"></script> --}}

@push('js')
<script type="text/javascript">

$('#save-cv').on('click',function(){
  $(this).html("");
  $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i>');
// var cv=$('#cv').val();
// var users_id=$('#users_id').val();
// $.post('upload_cv',{'users_id':users_id,'cv':cv,'_token':$('input[name=_token]').val()},function(response){
// console.log(response);
//   })

 $.ajax({
      url:'upload_cv',
      data:new FormData($("#upload-cv")[0]),
      dataType:'json',
      type:'post',
      processData: false,
      contentType: false,
      success:function(response){
        console.log(response);
            if(response.data=='updated'){
              $('#cv').val("");
              $('#save-cv').html("");
              $('#save-cv').html('<i class="fa fa-save"></i>');
          $('#message').html('<div class="callout callout-success"><h4>Reminder!</h4>Record update successfully!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          });   
        }
        else{
          $('#message').html('<div class="callout callout-danger"><h4>Reminder!</h4>Record update failed!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {
          $(this).hide(); n();
          });  
        }
        $('#reloadcv').load(location.href+' #reloadcv');
        // $('.profile-cv').load(location.href+' .profile-cv');
    // console.log(response);
      },
    });
});

$('#save-photo').on('click',function(){
 
   $(this).html("");
  $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i>');
 $.ajax({
      url:'upload_photo',
      data:new FormData($("#upload-photo")[0]),
      dataType:'json',
      type:'post',
      processData: false,
      contentType: false,
      success:function(response){
         $('#photo').val("");
        console.log(response);
            if(response.data=='updated'){
        $('#_token').val('{{ csrf_token() }}');
              $('#upload-photo').val("");
            $('#save-photo').html("");
            $('#save-photo').html('<i class="fa fa-save"></i>');
          $('#message').html('<div class="callout callout-success"><h4>Reminder!</h4>Record update successfully!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          
          });   
        }
        else{
          $('#message').html('<div class="callout callout-danger"><h4>Reminder!</h4>Record update failed!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {
          $(this).hide(); n();
          });  
        }
        $('#profile-photo').load(location.href+' #profile-photo');
        $('#reloadphoto').load(location.href+' #reloadphoto');
        // $('.profile-photo').load(location.href+' .profile-photo');
    // console.log(response);
    // $('.profile').ajax.reload();
      },
    });
});


$('#update-profile').on('click',function(){
 var data=new FormData($('#updateDetails')[0]);//$('#updateDetails').serialize();
  // console.log(data); 
$(this).html("");
  $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i> Update');
   $.ajax({
      url:'update_profile_info',
      data:data,
      dataType:'json',
      type:'post',
      processData: false,
      contentType: false,
      success:function(response){
        // console.log(response);
            if(response.data=="success"){
              $('#update-profile').html("");
            $('#update-profile').html('Update');
          $('#message').html('<div class="callout callout-success"><h4>Reminder!</h4>Record update successfully!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          });   
        }
        else{
          $('#message').html('<div class="callout callout-danger"><h4>Reminder!</h4>Record update failed!</div>');
          $("#message").show().fadeOut(3000).queue(function(n) {
          $(this).hide(); n();
          });  
        }
        $('.table-striped').load(location.href+' .table-striped');
        // $('.profile-photo').load(location.href+' .profile-photo');
    // console.log(response);
    // $('.profile').ajax.reload();
      },
    });

});

</script>
@endpush