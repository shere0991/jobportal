<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Post Job</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
       {{-- @if (count($errors))
          @foreach ($errors->all() as $error)
          <li class="text-red">{{ $error }}</li>
        @endforeach
       @endif --}}
        <form class="form-horizontal" action="@hasSection('edit'){{route('job-post.update',$editJob->id)}}@else{{route('job-post.store')}}
        @endif" method="post">
            {{ csrf_field() }}
          @section('edit_method')
          @show
          <div class="box-body">
           <div class="tab-pane" id="settings">
                  <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                    <label for="company_id" class="col-sm-2 col-md-2 control-label">Company/Industry Type</label>
                    <div class="col-sm-10 col-md-8">
                      <select name="company_id" id="company_id" class="form-control">
                        @hasSection('edit')
                          <option value="@yield('companyid')">@yield('companyname')</option>
                        @endif 
                        <option>Select Company</option>
                        @foreach ($company as $c)
                            <option value="{{$c->id}}">{{ $c->company_name }}</option>
                        @endforeach
                      </select>
                      @if ($errors->has('company_id'))
                          <label class="help-block">
                              <strong>{{ $errors->first('company_id') }}</strong>
                          </label>
                        @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('JobTitle') ? ' has-error' : '' }}">
                    <label for="JobTitle" class="col-sm-2 col-md-2 control-label">Job Title</label>

                    <div class="col-sm-10 col-md-8">
                      <input name="JobTitle" type="text" value="@yield('JobTitle')" class="form-control" id="JobTitle" placeholder="Job Title">
                      @if ($errors->has('JobTitle'))
                          <label class="help-block">
                              <strong>{{ $errors->first('JobTitle') }}</strong>
                          </label>
                        @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('NoofVacancies') ? ' has-error' : '' }}">
                    <label for="NoofVacancies" class="col-sm-2 col-md-2 control-label">No. of Vacancies</label>

                    <div class="col-sm-10 col-md-8">
                      <input name="NoofVacancies" id="NoofVacancies"  type="number" value="@yield('NoofVacancies')" class="form-control" placeholder="No. of Vacancies">
                      @if ($errors->has('NoofVacancies'))
                          <label class="help-block">
                              <strong>{{ $errors->first('NoofVacancies') }}</strong>
                          </label>
                        @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('ApplyInstruction') ? ' has-error' : '' }}">
                    <label for="ApplyInstruction" class="col-sm-2 col-md-2 control-label">Apply Instruction(s)</label>

                    <div class="col-sm-10 col-md-8">
                       <textarea name="ApplyInstruction" id="ApplyInstruction"  class="form-control" id="ApplyInstruction" placeholder="Apply Instruction">@yield('ApplyInstruction')</textarea>
                        @if ($errors->has('ApplyInstruction'))
                          <label class="help-block">
                              <strong>{{ $errors->first('ApplyInstruction') }}</strong>
                          </label>
                        @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('ApplicationDeadline') ? ' has-error' : '' }}">
                    <label for="ApplicationDeadline" class="col-sm-2 col-md-2 control-label">Application Deadline *</label>

                    <div class="col-sm-10 col-md-8">
                      <input name="ApplicationDeadline" id="datepicker" type="text" value="@yield('ApplicationDeadline')" class="form-control" id="inputSkills" placeholder="Application Deadline">
                      @if ($errors->has('ApplicationDeadline'))
                          <label class="help-block">
                              <strong>{{ $errors->first('ApplicationDeadline') }}</strong>
                          </label>
                        @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('AgeRangeFrom') ? ' has-error' : '' }}">
                    <label for="AgeRange" class="col-sm-2 col-md-2 control-label">Age Range</label>
                    <div class="col-sm-2 col-md-2">
                    <label for="AgeRangeFrom" class="control-label">From</label>
                      <input name="AgeRangeFrom" id="AgeRangeFrom"  type="number" class="form-control" value="@yield('AgeRangeFrom')" placeholder="Age Range From">
                    <label for="AgeRangeTo" class="control-label">To</label>
                      <input name="AgeRangeTo" id="AgeRangeTo" value="@yield('AgeRangeTo')" type="number" class="form-control" placeholder="Age Range To">
                       @if ($errors->has('AgeRangeTo'))
                          <label class="help-block">
                              <strong>{{ $errors->first('AgeRangeTo') }}</strong>
                          </label>
                        @endif
                    </div>
                  </div>
                  
                  <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">  
                    <label for="Gender" class="col-sm-2 col-md-2 control-label">Gender</label>
                      <label for="MaleOnly" class="col-sm-2 col-md-2 control-label">
                      <input name="Gender" id="Gender" value="1" type="radio" name="r3" class="flat-red" @hasSection('edit') @if($editJob->Gender==1) checked @else @endif @endif>
                      Male Only
                    </label>
                    <label for="FemaleOnly" class="col-sm-2 col-md-2 control-label">
                      <input name="Gender" id="Gender" value="2" type="radio" name="r3" class="flat-red"  @hasSection('edit') @if($editJob->Gender==2) checked @else @endif @endif>
                      Female Only
                    </label>
                     <label for="FemaleOnly" class="col-sm-2 col-md-2 control-label">
                      <input name="Gender" id="Gender" value="3" type="radio" name="r3" class="flat-red"  @hasSection('edit') @if($editJob->Gender==3) checked @else @endif @endif>
                      Any
                    </label>
                     @if ($errors->has('Gender'))
                          <label class="help-block">
                              <strong>{{ $errors->first('Gender') }}</strong>
                          </label>
                        @endif
                  </div>
                      <!-- checkbox -->
                      <div class="form-group">
                        <label for="JobType" class="col-sm-2 col-md-2 control-label">Job Type</label>

                        <label for="FullTime" class="col-sm-2 col-md-2 control-label">
                          <input name="FullTime" id="FullTime" value="1" type="checkbox" class="flat-red" @hasSection('edit') @if(in_array(1,$jobType)==1) checked @else  @endif @endif>
                          Full Time
                        </label>
                        <label for="PartTime" class="col-sm-2 col-md-2 control-label">
                          <input name="PartTime" id="PartTime" value="2"  type="checkbox" class="flat-red" @hasSection('edit')  @if(in_array(2,$jobType)==2) checked @else  @endif @endif>
                          Part Time
                        </label>
                        <label for="Contractual" class="col-sm-2 col-md-2 control-label">
                          <input name="Contractual" id="Contractual" value="3"  type="checkbox" class="flat-red" @hasSection('edit') @if(in_array(3,$jobType)==3) checked @else  @endif @endif>
                          Contractual
                        </label>
                        <label for="" class="col-sm-2 col-md-2 control-label">
                          <input name="Intern" id="Intern" value="4"  type="checkbox" class="flat-red"  @hasSection('edit') @if(in_array(4,$jobType)==4) checked @else  @endif @endif>
                          Intern
                        </label>
                        </div> 
                         <div class="form-group">
                        <label for="JobLevel" class="col-sm-2 col-md-2 control-label">Job Level</label>
                        <label for="EntryLevel" class="col-sm-2 col-md-2 control-label">
                          <input name="EntryLevel" id="EntryLevel" value="1"  type="checkbox" class="flat-red" @hasSection('edit') @if(in_array(1,$jLevel)==1) checked @else  @endif @endif>
                          Entry Level
                        </label>
                        <label for="MidLevel" class="col-sm-3 control-label">
                          <input name="MidLevel" id="MidLevel" value="2"  type="checkbox" class="flat-red" @hasSection('edit') @if(in_array(2,$jLevel)==2) checked @else  @endif @endif>
                          Mid/Managerial Level
                        </label>
                        <label for="TopLevel" class="col-sm-2 col-md-2 control-label">
                          <input name="TopLevel"  type="checkbox" value="3" class="flat-red" @hasSection('edit') @if(in_array(3,$jLevel)==3) checked @else  @endif @endif>
                          Top Level
                        </label> 
                        </div> 
                        <!-- checkbox -->
                        
                      <div class="form-group{{ $errors->has('EducationalQualification') ? ' has-error' : '' }}">
                        <label for="EducationalQualification" class="col-sm-2 col-md-2 control-label">Educational Qualification</label>

                        <div class="col-sm-10 col-md-8">
                           <textarea name="EducationalQualification" class="form-control" id="EducationalQualification" placeholder="Educational Qualification">@yield('EducationalQualification')</textarea>
                          @if ($errors->has('EducationalQualification'))
                          <label class="help-block">
                              <strong>{{ $errors->first('EducationalQualification') }}</strong>
                          </label>
                          @endif
                        </div>
                      </div>
                       <div class="form-group{{ $errors->has('JobContext') ? ' has-error' : '' }}">
                    <label for="JobContext" class="col-sm-2 col-md-2 control-label">Job Context</label>

                    <div class="col-sm-10 col-md-8">
                       <textarea name="JobContext" id="JobContext" class="form-control" placeholder="Job Context">@yield('JobContext')</textarea>
                       @if ($errors->has('JobContext'))
                          <label class="help-block">
                              <strong>{{ $errors->first('JobContext') }}</strong>
                          </label>
                          @endif
                    </div>
                  </div>
                   <div class="form-group{{ $errors->has('JobDescription') ? ' has-error' : '' }}">
                    <label for="JobDescription" class="col-sm-2 col-md-2 control-label">Job Description/Responsibility</label>

                    <div class="col-sm-10 col-md-8">
                       <textarea name="JobDescription" id="JobDescription" class="form-control" placeholder="Job Description/Responsibility">@yield('JobDescription')</textarea>
                       @if ($errors->has('JobDescription'))
                          <label class="help-block">
                              <strong>{{ $errors->first('JobDescription') }}</strong>
                          </label>
                          @endif
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="AdditionalJobRequirements" class="col-sm-2 col-md-2 control-label">Additional Job Requirements</label>

                    <div class="col-sm-10 col-md-8">
                       <textarea name="AdditionalJobRequirements" name="AdditionalJobRequirements" class="form-control" placeholder="Additional Job Requirements">@yield('AdditionalJobRequirements')</textarea>

                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="TotalYearsofExperience" class="col-sm-2 col-md-2 control-label">Total Years of Experience</label>
                    <div class="col-sm-8 col-md-8">
                      <div class="form-group{{ $errors->has('ExperienceRequired') ? ' has-error' : '' }}">
                        <label for="" class="col-sm-3 col-md-3 control-label">
                        <input name="ExperienceRequired" id="ExperienceRequired" value="1" type="radio" name="r3" class="flat-red" @hasSection('edit') @if($ExperienceRequiredOption==1) checked @else @endif @endif>
                      Experience Required
                    </label>
                      <label for="" class="col-sm-4 col-md-4 control-label">
                      <input name="ExperienceRequired" id="ExperienceRequired" value="0" type="radio" name="r3" class="flat-red" @hasSection('edit') @if($ExperienceRequiredOption==0) checked @else @endif @endif>
                      No Experience Required
                    </label>
                    </div>
                    {{--  <div>
                        
                     </div> --}}
                      {{-- <label for="ExperienceRequired" class="col-sm-2 col-md-2 control-label"></label> --}}
                    <div class="col-md-6">
                      <label for="MinimumExperience" class="control-label">Minimum Experience</label>
                      <input name="MinimumExperience" id="MinimumExperience"  type="number" value="@yield('MinimumExperience')" class="form-control" placeholder="Minimum Experience">
                      <span id="ex-error"></span>
                    <label for="MaximumExperience" class="control-label">Maximum Experience</label>
                      <input name="MaximumExperience" id="MaximumExperience"  type="number" value="@yield('MaximumExperience')" class="form-control" id="Maximum Experience" placeholder="Maximum Experience">
                      <span id="ex-error"></span>
                    </div>
                    </div>
                    
                  </div>
                  <div class="form-group{{ $errors->has('JobLocation') ? ' has-error' : '' }}">
                    <label for="JobLocation" class="col-sm-2 col-md-2 control-label">Job Location</label>
                    <div class="col-sm-10 col-md-8">
                      <select name="JobLocation[]" id="JobLocation" class="form-control select2 " multiple="multiple" data-placeholder="Select a Job Location"
                          style="width: 100%;">
                       {{--  @hasSection('edit')
                        @foreach ($job_location as $jbl)
                          <option id="joblocation">{{ $jbl }}</option>
                        @endforeach
                        @endif --}}
                        <option>Dhaka</option>
                        <option>Gazipur</option>
                        <option>Khulna</option>
                        <option>Barisal</option>
                        <option>Rajshahi</option>
                        <option>Sylhet</option>
                        <option>Rangpur</option>
                    </select>
                     @if ($errors->has('JobLocation'))
                          <label class="help-block">
                              <strong>{{ $errors->first('JobLocation') }}</strong>
                          </label>
                        @endif
                  </div>
                </div>
                <div class="form-group{{ $errors->has('SalaryRange') ? ' has-error' : '' }}"> 
                    <label for="CompensationOtherBenifits" class="col-sm-2 col-md-2 control-label">Compensation & Other Benifits</label>
                      <label for="" class="col-sm-8 col-md-8">
                      <div>
                        <input name="SalaryRange" id="SalaryRange" value="1" type="radio" class="flat-red" @hasSection('edit') @if($SalaryRangeOption==1) checked @else @endif @endif>
                          Negotiate
                      </div>
                      <div>
                        <input name="SalaryRange" id="SalaryRange" value="2" type="radio" class="flat-red" @hasSection('edit') @if($SalaryRangeOption==2) checked @else @endif @endif>
                          Don't want to mention
                      </div>
                      <div>
                        <input name="SalaryRange" id="SalaryRange" value="3" type="radio" class="flat-red" @hasSection('edit') @if($SalaryRangeOption==3) checked @else @endif @endif>
                          Want to display the following range
                      </div>
                      <div>
                      <label for="MinimumSalaryRange" class="control-label">MinimumSalaryRange</label>
                      <input name="MinimumSalaryRange" id="MinimumSalaryRange"  type="text" value="@yield('MinimumSalaryRange')" class="form-control col-md-3 col-sm-3" placeholder="Minimum Salary Range">
                      </div>
                      <div>
                        <label for="MaximumSalaryRange" class="control-label">Maximum Salary Range</label>
                      <input name="MaximumSalaryRange" id="MaximumSalaryRange"  type="text" value="@yield('MaximumSalaryRange')" class="form-control col-md-3 col-sm-3" placeholder="Maximum Salary Range">
                      </div>
                      
                    </label>
                  </div>
                  <div class="form-group">
                  <label for="SalaryDetails" class="col-sm-2 col-md-2 control-label">Salary Details</label>
                    <div class="col-sm-10 col-md-8">
                        <textarea name="SalaryDetails" id="SalaryDetails" class="form-control " placeholder="As per companey">@yield('SalaryDetails')</textarea>
                        @if ($errors->has('SalaryDetails'))
                          <label class="help-block">
                              <strong>{{ $errors->first('SalaryDetails') }}</strong>
                          </label>
                          @endif
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="OtherBenefits" class="col-sm-2 col-md-2 control-label">Other Benefits</label>
                      <div class="col-sm-10 col-md-8">
                       <textarea name="OtherBenefits" id="OtherBenefits" class="form-control" placeholder="As per companey">@yield('OtherBenefits')</textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 col-md-8">
                      <button type="submit" class="btn btn-danger" id="post-job">@hasSection('edit')
                      Update Job 
                      @else 
                    Post Job 
                    @endif
                  </button>
                    </div>
                  </div>
                </form>
              </div>
@push('js')
<script type="text/javascript">
// var xyz=$('#JobLocation').find('#joblocation').val();
// console.log(xyz);
$('#post-job').on('click',function(){
var ExperienceRequired=$('#ExperienceRequired').val();
if (ExperienceRequired==1) {
  if ($('#MinimumExperience').val()=="" && $('#MinimumExperience').val()=="") {
      $('#ex-error').html('Please fill the required field!');
  }
}
});

</script>
@endpush            