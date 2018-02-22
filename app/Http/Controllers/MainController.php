<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;
// use App\Profile;
use App\Application;
use App\JobPost;
use App\User;
class MainController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

   

	public function application(Request $request){
		$check_appalication=Application::all();
		$ids=$request->id;
		// $employee_cv=Profile::all();
		$job_post=JobPost::where('id',$ids)->get();
		$job_title="";
		foreach ($job_post as $j) {
			$job_title.=$j->JobTitle;
		}
		return view('applications',compact('employee_cv','ids','check_appalication','job_title'));
	}

	public function profile(Request $request){
		$profile_details=User::where('Username',$request->username)->get();
		$applications=User::join('applications','applications.user_id','=','users.id')->where('Username',$request->username)->count();
			$Education="";
			$Institution="";
			$Company="";
			$Possition="";
			$Experience="";
			$TotalYearsExperience="";
		foreach ($profile_details as $details) {
					$Education.=$details->Education;
					$Institution.=$details->Institution;
					$Company.=$details->Company;
					$Possition.=$details->Possition;
					$Experience.=$details->Experience;
					$TotalYearsExperience.=$details->TotalYearsExperience;
		}
					
		return view('profile',compact('profile_details','Education',
					'Institution',
					'Company',
					'Possition',
					'Experience',
					'TotalYearsExperience',
					'applications'
				));
	}


	public function applied_online(Request $request){
		$data=Application::join('job_posts','job_posts.id','=','applications.job_post_id')->where('user_id',$request->user_id)->where('archived',0)->get();
		return view('applied_online',compact('data'));
	}

	public function application_archived(Request $request){
		if ($request->ajax()) {
			$application=Application::find($request->id);
		$application->archived=1;
		$application->save();
		return response()->json(array('data'=>'success'));
		}
	}


	public function job_preview(Request $request){
		$job_preview=JobPost::where('id',$request->jobId)->get();
		return view('job-preview',compact('job_preview'));
	}


// 
// 			 if(file_exists('file_path')){
//         @unlink('file_path');
//     }
//     parent::delete();

	public function upload_cv(Request $request){
		if ($request->hasFile('cv')) {
     if(file_exists(public_path('storage/employee_cv/'.$request->cv))){

      unlink(public_path('storage/employee_cv/'.$request->cv));

    }else{
 
		// return $request->cv;
			$profile=User::find($request->user_id);
			$fileName=$request->cv->getClientOriginalName();
        	$request->cv->storeAs('public/employee_cv',$fileName);
			$profile->CV=$fileName;
			$profile->save();
			return response()->json(array('data'=>'updated'));
		}

    }
	}


public function update_profile_info(Request $request){
	if ($request->ajax()) {
		$update=User::find($request->user_id);
		$update->Education=$request->Education;
		$update->Institution=$request->Institution;
		$update->Company=$request->Company;
		$update->Possition=$request->Possition;
		$update->Experience=$request->Experience;
		$update->TotalYearsExperience=$request->TotalYearsExperience;
		$update->save();
		return response()->json(array('data'=>'success'));
	}
}

	
	public function upload_photo(Request $request){				
		if ($request->hasFile('photo')) {
		$profile=User::find($request->user_id);
		$fileName=$request->photo->getClientOriginalName();
    	$request->photo->storeAs('public/employee_photo',$fileName);
		$profile->Photo=$fileName;
		$profile->save();
		return response()->json(array('data'=>'updated'));
		}

	}

	public function employee_application(Request $request){
		
		if ($request->ajax()) {
		// return $request->all();
			$check_user=Application::where('user_id',$request->user_id)->where('job_post_id',$request->job_post_id)->get();
			$user_id='';
		$job_post_id='';
			foreach ($check_user as $u) {
				$user_id.=$u->user_id;
				$job_post_id.=$u->job_post_id;
			}
			if ($job_post_id==$request->job_post_id && $user_id==$request->user_id) {
				return response()->json(array('data'=>'exist'));
			}else{
			if ($request->hasFile('cv')) {
			$fileName=$request->cv->getClientOriginalName();
        	$request->cv->storeAs('public/employee_cv',$fileName);
			$profile=User::where('id',$request->user_id)
							->update(['CV'=>$fileName]);	
		}
			$applicants=new Application;
			$applicants->job_post_id=$request->job_post_id;
			$applicants->user_id=$request->user_id;
			$applicants->ExpectedSalary=$request->ExpectedSalary;
			$applicants->save();
			return response()->json(array('data'=>'success'));
			}
			
		}

	}

}







