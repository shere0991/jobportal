<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RecruitmentRequisitionFormOne;
use App\RecruitmentRequisitionFormTwo;
use App\RecruitmentRequisitionFormThree;
class ReportGenerateController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }



     public function recruitment_requisition(){
        $formOne=RecruitmentRequisitionFormOne::all();
        $formTwo=RecruitmentRequisitionFormTwo::all();
        $formThree=RecruitmentRequisitionFormThree::all();
        return view('admin.recruitment-requisition',compact('formOne','formTwo','formThree'));
    } 
    public function submit_requisition_form_1(Request $request){
        if ($request->has('form_one')) {
            // return $request->all();
        $data=new RecruitmentRequisitionFormOne;
        $data->unit_name=$request->unit_name;
        $data->position=$request->position;
        $data->no_of_employees_required=$request->no_of_employees_required;
        $data->no_of_existing_positions=$request->no_of_existing_positions;
        $data->department=$request->department;
        $data->vacancy_created_on=$request->vacancy_created_on;
        $data->anticipated_start_date=$request->anticipated_start_date;
        $data->last_hiring_for_same=$request->last_hiring_for_same;
        $data->replaced_employee_name=$request->replaced_employee_name;
        $data->requested_by=$request->requested_by;
        $data->replaced_employee_designation=$request->replaced_employee_designation;
        $data->requester_designation=$request->requester_designation;
        $data->education=$request->education;
        $data->work_experience=$request->work_experience;
        $data->training=$request->training;
        $data->skills=$request->skills;
        $data->additional_requirements=$request->additional_requirements;
        $data->remarks=$request->remarks;
        $data->internal_or_transfer=$request->internal_or_transfer;
        $data->newspaper=$request->newspaper;
        $data->online=$request->online;
        $data->cv_bank=$request->cv_bank;
        $data->referral=$request->referral;
         session()->flash('message','Job Posted successfully!');
                $data->save();
        return redirect('admin/recruitment-requisition');
        }


    }

    public function submit_requisition_form_2(Request $request){ 
        if ($request->has('form_two')) {
        // return $request->all();
        $data=new RecruitmentRequisitionFormTwo;
         $data->head_office=$request->head_office;
         $data->factory=$request->factory;
         $data->field=$request->field;
         $data->permanent=$request->permanent;
         $data->contract=$request->contract;
         $data->temporary=$request->temporary;
         $data->casual=$request->casual;
         $data->slary_grade=$request->slary_grade;
         $data->job_class=$request->job_class;
         $data->comments=$request->comments;
        session()->flash('message','Job Posted successfully!');
                $data->save();
        return redirect('admin/recruitment-requisition');
        }

    } 
    public function submit_requisition_form_3(Request $request){ 
       if ($request->has('form_three')) {
            $data=new RecruitmentRequisitionFormThree;
            $data->modification=$request->modification;
            session()->flash('message','Job Posted successfully!');
            $data->save();
            return redirect('admin/recruitment-requisition');
       }

    }
    public function interview_ratings(){
    	return view('admin.interview-ratings');
    }
    public function summary_for_cv_shorting(){
    	return view('admin.summary-for-cv-shorting');
    }
    public function candidate_information_score(){
    	return view('admin.candidate-information-score');
    }
    public function interview_final_approval(){
    	return view('admin.interview-final-approval');
    }
    public function recruitment_final_approval_dmd(){
    	return view('admin.recruitment-final-approval-dmd');
    }
    public function recruitment_final_approval_director(){
    	return view('admin.recruitment-final-approval-director');
    }
    public function final_status_report(){
    	return view('admin.final-status-report');
    }
    public function recruitment_status_report(){
    	return view('admin.recruitment-status-report');
    }
}
