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

@php

	$company=App\Company::where('id',$editJob->company_id)->get();
	$company_name="";
	foreach ($company as $c) {
	$company_name.=$c->company_name;	
	}
$jobType=json_decode($editJob->JobType);

$jLevel=json_decode($editJob->JobLevel);
$job_location=json_decode($editJob->JobLocation);
// $jobLevel=json_decode($editJob->JobLevel);
// foreach ($jobLevel as $j) {
// 	$jLevel.=$j;
// }
$SalaryRangeOption=$editJob->SalaryRangeOption;
$ExperienceRequiredOption=$editJob->ExperienceRequiredOption;
@endphp

@section('edit','edit')
@section('JobTitle', $editJob->JobTitle)
@section('companyname',$company_name)
@section('companyid', $editJob->company_id)
@section('NoofVacancies', $editJob->NoofVacancies)
@section('AgeRangeFrom', $editJob->AgeRangeFrom)
{{-- @section('jobType', $jType) --}}
{{-- @section('Gender', $editJob->Gender) --}}
@section('AgeRangeTo', $editJob->AgeRangeTo)
@section('ApplyInstruction', $editJob->ApplyInstruction)
@section('ApplicationDeadline', $editJob->ApplicationDeadline)
@section('EducationalQualification', $editJob->EducationalQualification)
@section('JobContext', $editJob->JobContext)
@section('JobDescription', $editJob->JobDescription)
@section('MinimumExperience', $editJob->MinimumExperience)
@section('MaximumExperience', $editJob->MaximumExperience)
@section('MinimumSalaryRange', $editJob->MinimumSalaryRange)
@section('MaximumSalaryRange', $editJob->MaximumSalaryRange)
@section('AdditionalJobRequirements', $editJob->AdditionalJobRequirements)
@section('SalaryDetails', $editJob->SalaryDetails)
@section('OtherBenefits', $editJob->OtherBenefits)
@section('main-content')
@section('edit_method')
{{ method_field('PUT') }}
@endsection
{{-- {{ $editJob->ExperienceRequired }} --}}
@php
// var_dump($job_location);
@endphp
@include('admin.job-post.create')

@stop


