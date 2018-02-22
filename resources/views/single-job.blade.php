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
@foreach($job_preview as $job)
<div class="col-md-8 col-md-offset-2">
<div class="box box-custom-css">
  <div class="box-header">
    <div class="col-md-8 col-md-offset-1">&nbsp;<h2 class="box-title"><strong>{{ $job->JobTitle }}</strong></h2>
    </div>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fa fa-times"></i></button>
    </div>
  </div>
          {{-- Each job goes here --}}
<div class="box-body">
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
<div class="box-footer">
  
</div>
<!-- /.box-footer-->
</div>
{{-- <div class="page-footer">
  <center> {{ $jobList->links() }}</center>
</div> --}}
</div><!--box-->

@endforeach
    <!-- /.content -->
@endsection
@section('control-sidebar')
@if(Auth::user())
@include('layouts.partial.control-sidebar')
@endif
@endsection

@push('js')
<script type="text/javascript" src="{{ asset('js/login-register-reset-password.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
@endpush
