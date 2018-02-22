<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobPost;
use App\Company;
class JobPostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company=Company::all();
        return view('admin.job-post.jobpost',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'company_id'=>'required',
            'JobTitle'=>'required',
            'NoofVacancies'=>'required',
            'ApplyInstruction'=>'required',
            'ApplicationDeadline'=>'required',
            'AgeRangeFrom'=>'required',
            'AgeRangeTo'=>'required',
            'Gender'=>'required',
            'ApplicationDeadline'=>'required',
            'JobLocation'=>'required',
            'EducationalQualification'=>'required',
            'JobContext'=>'required',
            'JobDescription'=>'required',
            'JobLocation'=>'required',
            'JobLocation'=>'required',
            'ExperienceRequired'=>'required',
            'SalaryRange'=>'required',
        ]);
                $jobPost=new JobPost;
                $jobPost->company_id=$request->company_id;
                $jobPost->JobTitle=$request->JobTitle;
                $jobPost->NoofVacancies=$request->NoofVacancies;
                $jobPost->ApplyInstruction=$request->ApplyInstruction;
                $jobPost->ApplicationDeadline=$request->ApplicationDeadline;
                $jobPost->AgeRangeFrom=$request->AgeRangeFrom;
                $jobPost->AgeRangeTo=$request->AgeRangeTo;
                $jobPost->Gender=$request->Gender;

                $JobType=array($request->FullTime,$request->PartTime,$request->Contractual,$request->Intern);
                $jobPost->JobType= json_encode($JobType);

                $JobLevel=array($request->EntryLevel,$request->MidLevel,$request->TopLevel);
                $jobPost->JobLevel=json_encode($JobLevel);

                $jobPost->EducationalQualification=$request->EducationalQualification;
                $jobPost->JobContext=$request->JobContext;
                $jobPost->JobDescription=$request->JobDescription;
                $jobPost->AdditionalJobRequirements=$request->AdditionalJobRequirements;
                $experience='';
                $MinimumExperience='';
                $MaximumExperience='';
                switch ($request->ExperienceRequired) {
                    case '1':
                        $experience.=1;
                        $MinimumExperience.=$request->MinimumExperience;
                        $MaximumExperience.=$request->MaximumExperience;
                        break;
                    case '0':
                        $experience.=0;
                        $MinimumExperience.=0;
                        $MaximumExperience.=0;
                    default:
                        # code...
                        break;
                }

                // return $experience;


                $jobPost->ExperienceRequiredOption=$experience;
                $jobPost->MinimumExperience=$MinimumExperience;
                $jobPost->MaximumExperience=$MaximumExperience;
                

                 $jobPost->JobLocation=json_encode($request->JobLocation);
                
                // echo "<pre>";
                // return var_dump($request->JobLocation);
                // echo "</pre>";

                $salary="";
                $MinimumSalaryRange='';
                $MaximumSalaryRange='';
                switch ($request->SalaryRange) {
                    case '1':
                        $salary.=$request->SalaryRange;
                        $MinimumSalaryRange.=0;
                        $MaximumSalaryRange.=0;
                        break;
                    case '2':
                        $salary.=$request->SalaryRange;
                        $MinimumSalaryRange.=0;
                        $MaximumSalaryRange.=0;
                        break;
                    case '3':
                        $salary.=$request->SalaryRange;;
                        $MinimumSalaryRange.=$request->MinimumSalaryRange;
                        $MaximumSalaryRange.=$request->MaximumSalaryRange;
                        break;
                    
                    default:
                        # code...
                        break;
                }
                // return $salary;
                
                $jobPost->SalaryRangeOption=$salary;
                $jobPost->MinimumSalaryRange=$MinimumSalaryRange;
                $jobPost->MaximumSalaryRange=$MaximumSalaryRange;
                $jobPost->SalaryDetails=$request->SalaryDetails;
                $jobPost->OtherBenefits=$request->OtherBenefits;
                $jobPost->deleted=0;
                session()->flash('message','Job Posted successfully!');
                $jobPost->save();
               return redirect('admin/job-list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editJob=JobPost::find($id);
        $company=Company::all();
        return view('admin.job-post.edit',compact('editJob','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'company_id'=>'required',
            'JobTitle'=>'required',
            'company_id'=>'required',
            'NoofVacancies'=>'required',
            'ApplyInstruction'=>'required',
            'ApplicationDeadline'=>'required',
            'company_id'=>'required',
            'AgeRangeFrom'=>'required',
            'AgeRangeTo'=>'required',
            'company_id'=>'required',
            'Gender'=>'required',
            'ApplicationDeadline'=>'required',
            'JobLocation'=>'required',
            'EducationalQualification'=>'required',
            'JobContext'=>'required',
            'JobDescription'=>'required',
            'JobLocation'=>'required',
            'JobLocation'=>'required',
            'ExperienceRequired'=>'required',
            'SalaryRange'=>'required',
        ]);

         $jobPost=JobPost::find($id);
                $jobPost->company_id=$request->company_id;
                $jobPost->JobTitle=$request->JobTitle;
                $jobPost->NoofVacancies=$request->NoofVacancies;
                $jobPost->ApplyInstruction=$request->ApplyInstruction;
                $jobPost->ApplicationDeadline=$request->ApplicationDeadline;
                $jobPost->AgeRangeFrom=$request->AgeRangeFrom;
                $jobPost->AgeRangeTo=$request->AgeRangeTo;
                $jobPost->Gender=$request->Gender;

                $JobType=array($request->FullTime,$request->PartTime,$request->Contractual,$request->Intern);
                $jobPost->JobType= json_encode($JobType);

                $JobLevel=array($request->EntryLevel,$request->MidLevel,$request->TopLevel);
                $jobPost->JobLevel=json_encode($JobLevel);

                $jobPost->EducationalQualification=$request->EducationalQualification;
                $jobPost->JobContext=$request->JobContext;
                $jobPost->JobDescription=$request->JobDescription;
                $jobPost->AdditionalJobRequirements=$request->AdditionalJobRequirements;
                $experience='';
                $MinimumExperience='';
                $MaximumExperience='';
                switch ($request->ExperienceRequired) {
                    case '1':
                        $experience.=1;
                        $MinimumExperience.=$request->MinimumExperience;
                        $MaximumExperience.=$request->MaximumExperience;
                        break;
                    case '0':
                        $experience.=0;
                    default:
                        # code...
                        break;
                }

                


                $jobPost->ExperienceRequiredOption=$experience;
                $jobPost->MinimumExperience=$MinimumExperience;
                $jobPost->MaximumExperience=$MaximumExperience;
                

                 $jobPost->JobLocation=json_encode($request->JobLocation);
                
                // echo "<pre>";
                // return var_dump($request->JobLocation);
                // echo "</pre>";

                $salary="";
                $MinimumSalaryRange='';
                $MaximumSalaryRange='';
                switch ($request->SalaryRange) {
                    case '1':
                        $salary.=$request->SalaryRange;
                        break;
                    case '2':
                        $salary.=$request->SalaryRange;
                        break;
                    case '3':
                        $salary.=$request->SalaryRange;;
                        $MinimumSalaryRange.=$request->MinimumSalaryRange;
                        $MaximumSalaryRange.=$request->MaximumSalaryRange;
                        break;
                    
                    default:
                        # code...
                        break;
                }
                
                $jobPost->SalaryRangeOption=$salary;
                $jobPost->MinimumSalaryRange=$MinimumSalaryRange;
                $jobPost->MaximumSalaryRange=$MaximumSalaryRange;
                $jobPost->SalaryDetails=$request->SalaryDetails;
                $jobPost->OtherBenefits=$request->OtherBenefits;
                $jobPost->deleted=0;
                session()->flash('message','Job Updated successfully!');
                $jobPost->save();
               return redirect('admin/job-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
