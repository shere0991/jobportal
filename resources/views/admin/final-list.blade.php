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
@if($university || $gender || $salary || $company || $designation)
<p><a id="back-button" href="{{ url('/admin/company/final-list'.'/'.$jobItemIds.'/'.str_slug($title)) }}"><i class="fa fa-arrow-left"></i> Back</a></p>
@endif
<div id="toggle" class="navbar-fixed-top" style="text-align: center;"> 
<div id="message"></div>
</div>
      <div class="box box-default box-custom-css">
          <div class="box-header">
           <div class="col-md-12"><h2>{{ $JobTitle }}</h2></div>
          </div>
          <div class="box-body">

            <div class="col-md-4">
              <p><strong>Job Status</strong></p>
              @foreach ($allJobs as $j)
                  @php
                    $datetime1 = new DateTime($j->ApplicationDeadline);
                    $datetime2 = new DateTime($j->created_at);
                     $interval1 = $datetime1->diff($datetime2);
                     $d1=$interval1->format('%a');

                    $datetime3 = new DateTime(date('Y-m-d'));
                    $datetime4 = new DateTime($j->created_at);
                    $interval2 = $datetime3->diff($datetime4);
                    $d2=$interval2->format('%a');
                    
                    if ($d2>$d1) {
                      echo '<p class="text-red"><i class="fa fa-circle text-red"></i> Expired</p>';
                    }else{
                       echo '<p class="text-green"><i class="fa fa-circle text-green"></i>Active</p>';
                    }
                  @endphp
                @endforeach
            </div>
            <div class="col-md-4">
              <p><strong>Published On</strong></p>
              <p class="text-aqua"><i class="fa fa-calendar"></i>&nbsp;
                 <span>{{ $published_on }}</span>| 
                 <span>
                   @foreach ($allJobs as $a)
                     {{$a->created_at->diffForHumans()}}
                   @endforeach
                 </span>
              </p>
            </div>
            <div class="col-md-4">
              <p><strong>Applications</strong></p>
              <p class="text-aqua"><i class="fa fa-file"></i>&nbsp;{{ $applications }}</p>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!--box-->
       <div class="box">
          <div class="box-header">
            <div class="col-md-6 col-sm-6 col-xs-6">
              <span class="text-aqua"><i class="fa fa-users"></i>&nbsp; Applicants ({{ $applications }})</span>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-6">
              <span class="text-aqua pull-right"><i class="fa fa-eye"></i>&nbsp; <a href="{{ url('/admin/job-preview/'.$jobItemIds.'/'.str_slug($JobTitle)) }}" target="_blank">Job Preview</a></span>
          </div>
        </div>
          <div class="box-body custom-box-body">
            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
              <p class="text-aqua">All Applicants</p><br>
              <p><span class="rcorners6"><a href="{{ url('/admin/company/application'.'/'.$jobItemIds.'/'.str_slug($title)) }}">{{ $applications }}</a></span></p><br>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 text-center ">
              <p class="text-aqua">Short Listed</p><br>
              <p><span class="rcorners6"><a id="shortListDiv" href="{{ url('/admin/company/short-list'.'/'.$jobItemIds.'/'.str_slug($title)) }}">{{ $ShortList }}</a></span></p><br>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
              <p class="text-aqua">Interview List</p><br>
              <p><span class="rcorners6"><a id="interviewDiv" href="{{ url('/admin/company/interview'.'/'.$jobItemIds.'/'.str_slug($title)) }}">{{ $Interview }}</a></span></p><br>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
              <p class="text-aqua">Final List</p><br>
              <p><span class="rcorners6"><a id="FinalListDiv" href="{{ url('/admin/company/final-list'.'/'.$jobItemIds.'/'.str_slug($title)) }}">{{ $FinalList }}</a></span></p><br>
            </div>
          </div>
          {{-- <div class="box-footer"></div> --}}
        </div>
        <!--box--> 
      <div class="row" id="allApplication">
        <div class="col-md-2">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              @include('admin.layouts.partial.search-tab-menu')
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col-md-2 -->
        <div class="col-md-10">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab" class="text-aqua">Applicants</a></li>
               <li><a class="text-green" href="{{action('Dashboard\Main@downloadExcelFromFinalList',$jobItemIds)}}">Download <i class="fa fa-file-excel-o text-green"></i></a></li>
               <li class="pull-right"><a class="text-red" href="{{ url('/admin/company/reject-from-finallist'.'/'.$jobItemIds.'/'.str_slug($title)) }}"><i class="fa fa-ban" aria-hidden="true"></i> Reject Application ({{ $job_applicants_reject_number }})</a></li>
               <li>
                 @include('admin.layouts.partial.search-tab-container')
               </li>
            </ul>
            @foreach ($job_applicants as $applicants)
            <div class="tab-content tab-custom-border">
              <div class="active tab-pane" id="activity">
                  <div class="post tab-content">
                
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="user-block">
                          <span class="username">
                            <span class="text-aqua"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $applicants->FirstName }} {{ $applicants->LastName }}</span><br>
                              <span><i class="fa fa-university text-yellow"></i> {{ $applicants->Institution }}</span><br>
                              <span><i class="fa fa-phone text-green"></i>&nbsp;&nbsp;{{ $applicants->Phone }}</span><br>
                            </span>
                          <span class="description"><i class="fa fa-calendar text-red"></i>&nbsp;&nbsp;{{ $applicants->created_at->diffForHumans() }}</span>
                        </div>
                        </div>
                        <div class="col-sm-3">
                          <span class="text-aqua">{{ $applicants->Company }}</span><br>
                          <span class="text-aqua">{{ $applicants->Possition }}</span>
                          {{-- <span>{{ $applicants->Experience }}</span> --}}
                        </div>
                         <div class="col-sm-3">
                          <span class="text-yellow"><i class="fa fa-tasks"></i>&nbsp;&nbsp;{{ $applicants->TotalYearsExperience }}&nbsp;&nbsp;Years</span><br>
                          <span class="text-yellow"><i class="fa fa-money"></i>&nbsp;&nbsp;{{ $applicants->ExpectedSalary }}</span>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-2">
                          <div class="pull-right">
                            <input type="hidden" name="applicationIds" id="applicationIds" value="{{ $applicants->id }}">
                            <input type="hidden" id="jobId" name="jobId" value="{{ $applicants->job_post_id }}">
                             <input type="hidden" name="ExpectedSalary" id="ExpectedSalary" value="{{ $applicants->ExpectedSalary }}">
                            {{-- <span id="shortlist{{ $applicants->user_id }}" onclick="FinalList('{{ $applicants->user_id }}')" class=" btn-box-tool text-success" title="ShortList">
                               @if ($applicants->status==1 && $applicants->job_post_id)
                                   <i class="fa fa-check text-muted"></i>
                                  @else
                                  <i class="fa fa-check text-green"></i>
                               @endif
                              </span> --}}
                          <span id="reject-applicants{{ $applicants->user_id }}" onclick="Reject('{{ $applicants->user_id }}')" class="btn-box-tool text-danger text-center" title="Reject"><i class="fa fa-times text-red"></i></span><br>
                          {{-- <span class="text-aqua">Short List</span> --}}
                          <span class="text-red text-center">Delete</span>
                          </div>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                       {{--  <div class="col-sm-3">
                          <span></span>
                        </div> --}}
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.post -->

                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm">
                      {{-- <i class="fa fa-share margin-r-5"></i> Share --}}</a></li>
                    <li><a href="{{ asset('storage/employee_cv/'.$applicants->CV) }}" class="link-black text-sm">CV <i class="fa fa-download margin-r-5 text-green"></i></a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-calendar margin-r-5"></i> 
                      
                        @php
                          $applied=date_create($applicants->created_at);
                          $applied_on=date_format($applied,"l j \ F Y");
                        @endphp
                        <span>Applied On: </span>
                        <span>{{ $applied_on }}</span> | 
                         <span>
                             {{$applicants->created_at->diffForHumans()}}
                         </span>
                          
                       </a></li>
                  </ul>
                        
                </div>
                <!-- /.tab-pane -->
                {{-- <div class="row margin-bottom"></div> --}}
                <!-- /.post -->
              </div>
              <!-- /.tab-content -->
              @endforeach
              
            </div>
            <!-- /.nav-tabs-custom -->
            <div class="pull-right">
              {{ $job_applicants->links() }}
            </div>
          </div>
          <!--col-md-10-->
        </div>
        <!-- /.row -->
      {{ csrf_field() }}
</section> 
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

function FinalList(i){
  var ExpectedSalary=$('#ExpectedSalary').val();
  var applicationIds=$('#applicationIds').val();
  var jobId=$('#jobId').val();
  var status=1;
  $.post('InterviewListing',{'applicationIds':applicationIds,'user_id':i,'job_post_id':jobId,'ExpectedSalary':ExpectedSalary,'status':status,'_token':$('input[name=_token]').val()},function(response){

  $('#shortlist'+i).html("");
  $('#shortlist'+i).html('<i class="fa fa-check text-muted"></i>');
    $('#FinalListDiv').load(location.href+' #FinalListDiv');
    $('#shortListDiv').load(location.href+' #shortListDiv');
    $('#interviewDiv').load(location.href+' #interviewDiv');
console.log(response);
if(response.data=="success"){
  $('#allApplication').load(location.href+' #allApplication');
          $('#message').html('<div class="callout callout-success text-center"><h2>Great!</h2> <h3 id="facheck"><i class="fa fa-check"></i>You have shortlisted this applicants!</div>');
          $('#ExpectedSalary').val("");
          $("#message").show().fadeOut(3000).queue(function(n) {   
          $(this).hide(); n();
          // $('#employee_application').load(location.href+' #employee_application');
          });   
        }
        else if(response.data=="exist"){
          $('#toggle').toggleClass('#message');
          $('#facheck').toggle('.fa-check');
           $('#shortlist').html("");
              $('#shortlist').html('<i class="fa fa-check text-green"></i>');
          $('#message').html('<div class="callout callout-danger text-center"><h2>Reminder!</h2><h3>You Already have ShortListed!</h3></div>');
          $("#message").show().fadeOut(3000).queue(function(n) {
          $(this).hide(); n();
          });  
        // $('.profile-cv').load(location.href+' .profile-cv');
        }
  });
}

function Reject(i){
  $('#reject-applicants'+i).html("");
  $('#reject-applicants'+i).html('<i class="fa fa-circle-o-notch fa-spin"></i>');
  var jobId=$('#jobId').val();
  $.post('rejectFromFinalList',{'job_post_id':jobId,'user_id':i,'_token':$('input[name=_token]').val()},
    function(response){
      $('#reject-applicants'+i).html("");
      $('#reject-applicants'+i).html('<i class="fa fa-times text-muted"></i>');
    $('#allApplication').load(location.href+' #allApplication');
    $('#FinalListDiv').load(location.href+' #FinalListDiv');
    $('#shortListDiv').load(location.href+' #shortListDiv');
    $('#interviewDiv').load(location.href+' #interviewDiv');
      if (response.data=='success') {
        $('#message').html('<div class="callout callout-danger text-center"><h2>Reminder!</h2><h3>This Applicants is deleted!</h3></div>');
          $("#message").show().fadeOut(3000).queue(function(n) {
          $(this).hide(); n();
          }); 
      }
      console.log(response);
    });
}

</script>
@endpush