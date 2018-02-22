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
@push('css')
{{-- <link rel="stylesheet" href="{{ asset('components/bower_components/caption-hover-effect/css/default.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('components/bower_components/caption-hover-effect/css/component.css') }}">
<link rel="stylesheet" type="text/css" href="css/weave.css">
@endpush
@section('main-content')
<div class="ocean">
  <h1 style="color:red;"></h1>
  <div class="wave"></div>
  <div class="wave"></div>
</div>
@include('login-register-reset-password')
<div class="box box-custom-css ">
  <div class="box-header">
          <h3 class="box-title"><strong class="text-red"><i class="fa fa-tasks" aria-hidden="true"></i> Jobs</strong> <strong style="color:#FB069A;">On</strong>  <strong class="text-aqua">Company</strong></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
<div class="box-body">
<ul class="grid cs-style-4">
  @foreach ($all_company as $a)
  @php
    $totalCompanyJob=App\JobPost::where('company_id',$a->id)->where('deleted',0)->count();
  @endphp
    <div class="col-md-2 col-md-2">
    <li>
    <figure>
      <div><img style="width:153px;"  src="{{ asset('storage/admin/images/'.$a->company_logo) }}" alt="img05"></div>
      <figcaption>
        <h3 style="font-size: 14px;">{{ $a->company_name }}</h3>
        <p class="text-center">{{ $totalCompanyJob }}</p>
        <a class="btn btn-xs text-aqua" href="{{ url($a->id.'/'.str_slug($a->company_name).'/company-base-job') }}" target="_blank">View Jobs <i class="fa fa-eye"></i></a>
      </figcaption>
    </figure> 
  </li>
  </div>
  @endforeach
</ul>
</div>
</div>
<div class="col-md-8 col-md-offset-2">
  <p><strong class="text-green"><i class="fa fa-television" aria-hidden="true"></i> Job available in online</strong> <span class="label label-success"> {{ $total_available_jobs }}</span></p>
  <!-- Search Form -->
  <form role="form" action="{{ route('home') }}" method="GET"> 
    {{ csrf_field() }}
  <!-- Search Field -->
    <div class="form-group">
        <div class="input-group">
            <input class="form-control" id="search" type="text" name="search" placeholder="Search" required/>
            <span class="input-group-btn">
                <button class="btn text-aqua" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"><span style="margin-left:10px;">Search</span></button>
            </span>
        </div>
    </div>
  </form>
  <!-- End of Search Form -->            
</div>
<div class="col-md-8 col-md-offset-2">
  <div id="job-result">
    
  </div>
</div>
<!-- Search Result -->

<!-- Search Result -->

 @foreach($jobList as $job)
<div class="col-md-8 col-md-offset-2 jobList">
<div class="box box-custom-css collapsed-box">
  <div class="box-header">
    <div class="col-md-8 col-md-offset-1"><h3 class="box-title btn" data-widget="collapse" data-toggle="tooltip" title="{{ $job->JobTitle }}"><strong>{{ $job->JobTitle }}</strong> <small class="text-aqua">@foreach (App\Company::where('id',$job->company_id)->get() as $cm)
      {{$cm->company_name}}
    @endforeach</small></h3>
    </div>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <strong class="text-aqua">View This Job</strong> <i class="fa fa-plus"></i></button>
      {{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button> --}}
    </div>
  </div>
          {{-- Each job goes here --}}
<div class="box-body" style="display: none;">
  <div class="col-md-10 col-md-offset-1">
  <p class="text-justify company-name">
     @php
      $company=App\Company::where('id',$job->company_id)->get();
    @endphp
    @foreach ($company as $co)
      {{$co->company_name}}
    @endforeach
  </p>
  <h5><b>Job Context</b></h5>
  <p class="text-justify">{{ $job->JobContext }}</p>
  <h5><b>Job Description/Responsibility</b></h5>
  <p class="text-justify">{{ $job->JobDescription }}</p>
  <h5><strong>Job Nature</strong></h5>
  <span>
   @php
   $jobNature=json_decode($job->JobType);
   // var_dump($jobNature);
   // echo ($jobNature[0]);
   @endphp
  </span>
  <span>@if($jobNature[0]==1)
  {{ str_replace(1, "Full Time", $jobNature[0]) }}
  @else
  @endif
        </span>
        &nbsp;&nbsp;
          <span>
          @if($jobNature[1]==2)
        {{ str_replace(2, "Part Time", $jobNature[1]) }}
          @else
          @endif
        </span>
        &nbsp;&nbsp;
          <span>@if($jobNature[2]==3)
          {{ str_replace(3, "Contactual", $jobNature[2]) }}
          @else
          @endif
        </span>
        &nbsp;&nbsp;
          <span>
          @if($jobNature[3]==4)
        {{ str_replace(4, "Intern", $jobNature[3]) }}
          @else
          @endif
        </span>
        @if ($job->SalaryRangeOption==2)
            @else
          <h5><strong>Salary Details</strong></h5>
            @if ($job->SalaryRangeOption==1)
              <p>Negotiate</p>
            @elseif($job->SalaryRangeOption==3)
             <p>{{ $job->MinimumSalaryRange }} to {{ $job->MaximumSalaryRange }} Monthly</p>
            @endif
          @endif
          <h5><strong>Educational Requirements</strong></h5>
          <p class="text-justify">{{ $job->EducationalQualification }}</p>
          <h5><strong>Experience Requirements</strong></h5>
          @if ($job->ExperienceRequiredOption==1)
          <p class="text-justify">{{ $job->MinimumExperience }} to {{ $job->MaximumExperience }}</p>
          @else
          <p class="text-justify">Not Required</p>
          @endif
          <h5><strong>Job Requirements</strong></h5>
          <p>
            
            @if ($job->Gender==1)
              Male
            @elseif($job->Gender==2)
            Female
            @else
            Male, Female
            @endif
          </p>
          <p class="text-justify">{{ $job->AdditionalJobRequirements }}</p>
          <h5><strong>Job Location</strong></h5>
          @php
          // $joblocation=json_decode($job->JobLocation);
          // echo $joblocation;
          // var_dump(json_decode($job->JobLocation));
          $jl=json_decode($job->JobLocation);
          echo implode(",", $jl);
          @endphp
        </div>
        <div class="col-md-8 col-md-offset-2">
          @if(Auth::user())
          <h4 class="text-center"><a href="{{ url(Auth::user()->Username.'/application/'.$job->id.'/'.str_slug($job->JobTitle)) }}" class="btn btn-sm btn-success">Apply Online</a></h4>
          @else
          <h4 class="text-center"><a href="#" class="btn btn-success btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Apply Online</a></h4>
          @endif
        </div>
<div class="col-md-8 col-md-offset-2">
<h4 class="text-center text-green">Apply Instruction</h4>
<p class="text-justify">{{ $job->ApplyInstruction }}</p>
</div>
 
</div>
<!-- /.box-body -->
<div class="box-footer text-center">
  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <strong class="text-red">Close Now</strong> <i class="fa fa-times text-red"></i></button>
</div>
<!-- /.box-footer-->
</div>
<div class="page-footer">
  <center> {{ $jobList->links() }}</center>
</div>
</div><!--box-->
{{ csrf_field() }}
@endforeach
@endsection
@section('control-sidebar')
@if(Auth::user())
@include('layouts.partial.control-sidebar')
@endif
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('/components/bower_components/caption-hover-effect/js/modernizr.custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('/components/bower_components/caption-hover-effect/js/toucheffects.js') }}"></script>
<script type="text/javascript">
  if ($('#search').val()=="") {
    $('.list-group').hide();

  }
  $('#search').on('mouseenter',function(){
    $('.jobList').hide();
  });
  $('#search').on('mouseleave',function(){
    if ($(this).val()=="") {
      $('.jobList').show();
    }
  });
$('#boxes').hide();
var jobResult="";
  $('#search').keyup(function(){
    $('.jobList').hide();
   var search_data=$(this).val();
   if (search_data=="") {
    $('#boxes').hide();
    $('#job-result').hide();
   }else if(search_data!=""){
    $('#job-result').show();
   }
   console.log(search_data);
   $.post('search_job',{'search':search_data,'_token':$('input[name=_token]').val()},function(res){
    console.log(res.data[0].JobTitle);
    $('#boxes').on('mouseleave',function(){
      $('#boxes').hide();
    }); 
    $('#boxes').on('mouseenter',function(){
      $('#boxes').show();
    });
 $('#boxes').show();
 function slugify(string) {
  return string
    .toString()
    .trim()
    .toLowerCase()
    .replace(/\s+/g, "-")
    .replace(/[^\w\-]+/g, "")
    .replace(/\-\-+/g, "-")
    .replace(/^-+/, "")
    .replace(/-+$/, "");
}
    $('#job-result').html('<div class="box box-custom-css">'+
  '<div class="box-header">'
    +'<h3 class="box-title"><a target="_blank" href="'+res.data[0].id+'/'+slugify(res.data[0].JobTitle)+'/home/single-job">'+res.data[0].JobTitle+'<small class="text-aqua"> Published On '+res.data[0].created_at+'</small></a></h3>'
  +'</div>'
+'</div>');
   })

  });



</script>
<script type="text/javascript" src="{{ asset('js/login-register-reset-password.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
@endpush


