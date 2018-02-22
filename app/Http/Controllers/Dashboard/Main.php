<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;
use App\JobPost;
use App\Application;
use App\ShortList;
use App\Interview;
use App\FinalList;
use App\Company;
use App\User;
use App\Admin;
use App\role;
use App\role_admin;
use App;
use Mail;
use Excel;
use App\Mail\sendMail;
use App\Mail\rejectMail;
class Main extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('admin');
    }

    public function registerUser(){
    	$register_user=User::all();
    	return view('admin.register-user',compact('register_user'));
    }
    public function createUserForm(Request $request){
    	$data=Admin::join('role_admins','role_admins.admin_id','=','admins.id')->get();
    	return view('admin.create-user',compact('data'));
    }
    public function createUser(Request $request){
    	if ($request->ajax()) {
    		$data=new Admin;
    		$data->name=$request->name;
    		$data->email=$request->email;
    		$data->password=bcrypt($request->password);
    		$data->save();
    	return response()->json(array('message'=>'success'));
    	}
    }

    public function editUser(Request $request){
    	$data=Admin::where('id',$request->id)->get();
    	return response()->json(array('data'=>$data));
    }

    public function updateUser(Request $request){
    	$data=Admin::find($request->id);
    	$data->name=$request->name;
    	$data->email=$request->email;
    	$data->save();
    	return response()->json(array('data'=>'success'));
    }

    public function deleteUser(Request $request){
    	if ($request->ajax()) {
    	$data=Admin::where('id',$request->id)->delete();
    	return response()->json(array('data'=>'success'));
    	}
    }

    public function roleForm(){
    	$user=Admin::where('status',0)->get();
    	$role=role::all();
    	return view('admin.add-role',compact('role','user'));
    }

    public function createRole(Request $request){
    	$data=new role;
    	$data->name=$request->name;
    	$data->save();
    	return response()->json(array('message'=>'success'));
    }
    public function editRole(Request $request){
    	$data=role::where('id',$request->id)->get();
    	return response()->json(array('data'=>$data));
    }
    public function updateRole(Request $request){
    	// return $request->all();
    	$data=role::find($request->id);
    	$data->name=$request->name;
    	$data->save();
    	return response()->json(array('data'=>'success'));
    }
    public function deleteRole(Request $request){
    	$data=role::where('id',$request->id)->delete();
    	return response()->json(array('data'=>'success'));
    }

    public function assignRole(Request $request){
    	if ($request->ajax()) {
    	$userIds=$request->uId;
    	$data=new role_admin;
    	$data->role_id=$request->roleId;
    	$data->admin_id=$request->uId;
    	$data->save();
    	$updateStatus=Admin::find($userIds);
    	$updateStatus->status=1;
    	$updateStatus->save();
    	return response()->json(array('data'=>'success'));
    	}
    }
    /*
    We had created a function called single_company. This function is responsible for fetching company list. This company list will be displayed /appeared on single-company page.
    */
    public function single_company(Request $request){
		$companies=Company::join('job_posts','job_posts.company_id','=','companies.id')->where('company_id',$request->company)->get();
		$company_name='';
		$company_logo='';
		foreach ($companies as $c) {
			$company_name.=$c->company_name;
			$company_logo.=$c->company_logo;
		}
		return view('admin.single-company',compact('companies','company_name','company_logo'));
	}
    public function jobList(){
    	$allJobs=JobPost::where('deleted',0)->get();
		return view('admin.job-list',compact('allJobs'));
	}


	public function archive_job(Request $request){
			$data=JobPost::find($request->id);
			$data->deleted=1;
			$data->save();
			return response()->json(array('data'=>'success'));	

	} 
	public function delete_job(Request $request){
			$data=JobPost::find($request->id)->delete();
			return response()->json(array('data'=>'success'));

	} 

	public function archive_job_list(){
		$allJobs=JobPost::where('deleted',1)->get();
		return view('admin.archive-job',compact('allJobs'));
	}

	public function restore_job_from_archive(Request $request){
		$data=JobPost::find($request->id);
		$data->deleted=0;
		$data->save();
		return response()->json(array('data'=>'success'));	
	}

	public function jobPreview(Request $request){
		// return $request->id;
		$job_preview=JobPost::where('id',$request->jobIds)->get();
		return view('admin.job-preview',compact('job_preview'));
	}
	

/*application page, application listing from application to short list*/

	public function application(Request $request){
		$jobIds=$request->jobIds;
		$university=$request->university;
		$gender=$request->gender;
		$salary=$request->salary;
		$company=$request->company;
		$designation=$request->designation;
    	$allJobs=JobPost::where('id',$jobIds)->where('deleted',0)->get();
    	$ShortList=ShortList::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$Interview=Interview::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$FinalList=FinalList::where('job_post_id',$jobIds)->where('deleted',0)->count();
   		$applications=Application::where('job_post_id',$jobIds)->count();

   		if ($request->has('university')) {
   		$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('Institution','LIKE','%'.$request->university.'%')->where('deleted',0)->paginate(10);
   		}elseif ($request->has('gender')) {
   			$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('gender',$request->gender)->where('deleted',0)->paginate(10);
   		}elseif($request->has('salary')){
   			$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('ExpectedSalary',$request->salary)->where('deleted',0)->paginate(10);
   		}
   		elseif($request->has('Company',$request->company)){
   			$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('Company','LIKE','%'.$request->company.'%')->where('deleted',0)->paginate(10);
   		}elseif ($request->has('designation')) {
   			$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('Possition','LIKE','%'.$request->designation.'%')->where('deleted',0)->paginate(10);
   		}
   		else{

   		$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('deleted',0)->paginate(10);
   		}

   		$job_applicants_reject=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('status',1)->where('deleted',1)->count();

    	$published_date="";
    	$title="";
    	$jobItemIds="";
    	foreach ($allJobs as $job) {
    		$published_date.=$job->created_at;
    		$title.=$job->JobTitle;
    		$jobItemIds.=$job->id;
    	}

    	$published=date_create($published_date);
        $published_on=date_format($published,"l j \ F Y");
    	$JobTitle=$title;
    	$shortL=ShortList::where('job_post_id',$jobIds)->get();
    	return view('admin.applications')->with(array('allJobs'=>$allJobs,'title'=>$title,'jobItemIds'=>$jobItemIds,'jobIds'=>$jobIds,'applications'=>$applications,'JobTitle'=>$JobTitle,'published_on'=>$published_on,'ShortList'=>$ShortList,'Interview'=>$Interview,'FinalList'=>$FinalList,'job_applicants'=>$job_applicants,'job_applicants_reject'=>$job_applicants_reject,'university'=>$university, 'gender'=>$gender,'salary'=>$salary,'company'=>$company,'designation'=>$designation));
	}

	public function reject_applicants_list_from_application(Request $request){
		$jobIds=$request->jobIds;
		$university=$request->university;
		$gender=$request->gender;
		$salary=$request->salary;
		$company=$request->company;
		$designation=$request->designation;
    	$allJobs=JobPost::where('id',$jobIds)->where('deleted',0)->get();
    	$ShortList=ShortList::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$Interview=Interview::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$FinalList=FinalList::where('job_post_id',$jobIds)->where('deleted',0)->count();
   		$applications=Application::where('job_post_id',$jobIds)->count();

   		// $job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('status',0)->where('deleted',1)->get();

   		if ($request->has('university')) {
   			
   		$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('Institution','LIKE','%'.$request->university.'%')->where('deleted',1)->paginate(10);
   		}elseif ($request->has('gender')) {
   			$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('gender',$request->gender)->where('deleted',1)->paginate(10);
   		}elseif($request->has('salary')){
   			$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('ExpectedSalary',$request->salary)->where('deleted',1)->paginate(10);
   		}
   		elseif($request->has('Company',$request->company)){
   			$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('Company','LIKE','%'.$request->company.'%')->where('deleted',1)->paginate(10);
   		}elseif ($request->has('designation')) {
   			$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('Possition','LIKE','%'.$request->designation.'%')->where('deleted',1)->paginate(10);
   		}
   		else{

   		$job_applicants=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('deleted',1)->paginate(10);
   		}

   		$job_applicants_reject_number=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('status',1)->where('deleted',1)->count();

    	$published_date="";
    	$title="";
    	$jobItemIds="";
    	foreach ($allJobs as $job) {
    		$published_date.=$job->created_at;
    		$title.=$job->JobTitle;
    		$jobItemIds.=$job->id;
    	}

    	$published=date_create($published_date);
        $published_on=date_format($published,"l j \ F Y");
    	$JobTitle=$title;
    	$shortL=ShortList::where('job_post_id',$jobIds)->get();
    	return view('admin.reject-from-application')->with(array('allJobs'=>$allJobs,'title'=>$title,'jobItemIds'=>$jobItemIds,'jobIds'=>$jobIds,'applications'=>$applications,'JobTitle'=>$JobTitle,'published_on'=>$published_on,'ShortList'=>$ShortList,'Interview'=>$Interview,'FinalList'=>$FinalList,'job_applicants'=>$job_applicants,'job_applicants_reject_number'=>$job_applicants_reject_number,'university'=>$university, 'gender'=>$gender,'salary'=>$salary,'company'=>$company,'designation'=>$designation));
	}



	public function application_restoring_reject_list(Request $request){
		// return var_dump($request->all());
		if ($request->ajax()) {
			$update=array(
				'deleted'=>0,
			);
			// $sId=$request->user_id;
			// return $sId;
			$status=Application::where('job_post_id',$request->get('job_post_id'))->where('user_id',$request->get('user_id'))->update($update);
			// $status->status=$request->status;
			// $status->deleted=1;
			// $status->save();
			// return $request->status;
		// 	$check_user=ShortList::where('user_id',$request->user_id)->where('job_post_id',$request->job_post_id)->get();
		// 	$user_id='';
		// $job_post_id='';
		// 	foreach ($check_user as $u) {
		// 		$user_id.=$u->user_id;
		// 		$job_post_id.=$u->job_post_id;
		// 	}
		// 	if ($job_post_id==$request->job_post_id && $user_id==$request->user_id) {
		// 		return response()->json(array('data'=>'exist'));
		// 	}else{

		// 	$short_list=new ShortList;
		// 	$short_list->job_post_id=$request->job_post_id;
		// 	$short_list->user_id=$request->user_id;
		// 	$short_list->ExpectedSalary=$request->ExpectedSalary;
		// 	$short_list->save();
			

			return response()->json(array('data'=>'success'));
			// }
			
		}

	}

	public function jobArchive(){
		return view('admin.job-archive');
	}



	public function ShortListing(Request $request){
		// return var_dump($request->all());
		if ($request->ajax()) {
			$update=array(
				'status'=>$request->get('status'),
				'deleted'=>1
			);
			// $sId=$request->user_id;
			// return $sId;
			$status=Application::where('job_post_id',$request->get('job_post_id'))->where('user_id',$request->get('user_id'))->update($update);
			// $status->status=$request->status;
			// $status->deleted=1;
			// $status->save();
			// return $request->status;
			$check_user=ShortList::where('user_id',$request->user_id)->where('job_post_id',$request->job_post_id)->get();
			$user_id='';
		$job_post_id='';
			foreach ($check_user as $u) {
				$user_id.=$u->user_id;
				$job_post_id.=$u->job_post_id;
			}
			if ($job_post_id==$request->job_post_id && $user_id==$request->user_id) {
				return response()->json(array('data'=>'exist'));
			}else{

			$short_list=new ShortList;
			$short_list->job_post_id=$request->job_post_id;
			$short_list->user_id=$request->user_id;
			$short_list->ExpectedSalary=$request->ExpectedSalary;
			$short_list->save();
			

			return response()->json(array('data'=>'success'));
			}
			
		}

	}


	public function send_mail(){
	Mail::send(new sendMail());	
		
	}

	public function reject_mail(){
	Mail::send(new rejectMail());	
		
	}

	public function rejectFromApplication(Request $request){

		// return var_dump($request->all());
		if ($request->ajax()) {

			$check_user=ShortList::where('job_post_id',$request->job_post_id)->where('user_id',$request->user_id)->get();
			$status=Application::where('job_post_id',$request->job_post_id)
			->where('user_id',$request->user_id)
			->update(['deleted'=>1]);
			return response()->json(array('data'=>'success'));
			}
	}




/*shortList page, application listing from shortList to Interview list*/

	 public function shortList(Request $request){
		$jobIds=$request->jobIds;
		$university=$request->university;
		$gender=$request->gender;
		$salary=$request->salary;
		$company=$request->company;
		$designation=$request->designation;
    	$allJobs=JobPost::where('id',$jobIds)->where('deleted',0)->get();
    	$ShortList=ShortList::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$Interview=Interview::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$FinalList=FinalList::where('job_post_id',$jobIds)->where('deleted',0)->count();
   		$applications=Application::where('job_post_id',$jobIds)->count();

   		// $job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('deleted',0)->get();
   		if ($request->has('university')) {
   			
   		$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('Institution','LIKE','%'.$request->university.'%')->where('deleted',0)->paginate(10);
   		}elseif ($request->has('gender')) {
   			$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('gender',$request->gender)->where('deleted',0)->paginate(10);
   		}elseif($request->has('salary')){
   			$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('ExpectedSalary',$request->salary)->where('deleted',0)->paginate(10);
   		}
   		elseif($request->has('Company',$request->company)){
   			$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('Company','LIKE','%'.$request->company.'%')->where('deleted',0)->paginate(10);
   		}elseif ($request->has('designation')) {
   			$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('Possition','LIKE','%'.$request->designation.'%')->where('deleted',0)->paginate(10);
   		}
   		else{

   		$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('deleted',0)->paginate(10);
   		}

   		$job_applicants_reject_number=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('status',0)->where('deleted',1)->count();
   		// return $salary=ShortList::join('applications','applications.user_id','=','short_lists.user_id')->where('applications.job_post_id',$jobIds)->get();
       	
       	$checkUserAndJob=ShortList::where('job_post_id',$jobIds)->get();
    	$published_date="";
    	$title="";
    	$jobItemIds="";
    	foreach ($allJobs as $job) {
    		$published_date.=$job->created_at;
    		$title.=$job->JobTitle;
    		$jobItemIds.=$job->id;
    	}

    	$published=date_create($published_date);
        $published_on=date_format($published,"l j \ F Y");
    	$JobTitle=$title;
    	$shortL=ShortList::where('job_post_id',$jobIds)->get();
    	return view('admin.short-list')->with(array('allJobs'=>$allJobs,'jobItemIds'=>$jobItemIds,'title'=>$title,'jobIds'=>$jobIds,'applications'=>$applications,'JobTitle'=>$JobTitle,'published_on'=>$published_on,'ShortList'=>$ShortList,'Interview'=>$Interview,'FinalList'=>$FinalList,'job_applicants'=>$job_applicants,'job_applicants_reject_number'=>$job_applicants_reject_number,'university'=>$university, 'gender'=>$gender,'salary'=>$salary,'company'=>$company,'designation'=>$designation));
	}

	public function reject_applicants_list_from_shortlist(Request $request){
		$jobIds=$request->jobIds;
		$university=$request->university;
		$gender=$request->gender;
		$salary=$request->salary;
		$company=$request->company;
		$designation=$request->designation;
    	$allJobs=JobPost::where('id',$jobIds)->where('deleted',0)->get();
    	$ShortList=ShortList::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$Interview=Interview::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$FinalList=FinalList::where('job_post_id',$jobIds)->where('deleted',0)->count();
   		$applications=Application::where('job_post_id',$jobIds)->count();
   		$job_applicants_reject_number=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('status',0)->where('deleted',1)->count();

   		// $job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('status',0)->where('deleted',1)->get();
   		// return $salary=ShortList::join('applications','applications.user_id','=','short_lists.user_id')->where('applications.job_post_id',$jobIds)->get();
   		
      if ($request->has('university')) {
   			
   		$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('Institution','LIKE','%'.$request->university.'%')->where('deleted',1)->paginate(10);
   		}elseif ($request->has('gender')) {
   			$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('gender',$request->gender)->where('deleted',1)->paginate(10);
   		}elseif($request->has('salary')){
   			$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('ExpectedSalary',$request->salary)->where('deleted',1)->paginate(10);
   		}
   		elseif($request->has('Company',$request->company)){
   			$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('Company','LIKE','%'.$request->company.'%')->where('deleted',1)->paginate(10);
   		}elseif ($request->has('designation')) {
   			$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('Possition','LIKE','%'.$request->designation.'%')->where('deleted',1)->paginate(10);
   		}
   		else{

   		$job_applicants=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$jobIds)->where('deleted',1)->paginate(10);
   		}
       	
       	$checkUserAndJob=ShortList::where('job_post_id',$jobIds)->get();
    	$published_date="";
    	$title="";
    	$jobItemIds="";
    	foreach ($allJobs as $job) {
    		$published_date.=$job->created_at;
    		$title.=$job->JobTitle;
    		$jobItemIds.=$job->id;
    	}

    	$published=date_create($published_date);
        $published_on=date_format($published,"l j \ F Y");
    	$JobTitle=$title;
    	$shortL=ShortList::where('job_post_id',$jobIds)->get();
    	return view('admin.reject-from-shortlist')->with(array('allJobs'=>$allJobs,'jobItemIds'=>$jobItemIds,'title'=>$title,'jobIds'=>$jobIds,'applications'=>$applications,'JobTitle'=>$JobTitle,'published_on'=>$published_on,'ShortList'=>$ShortList,'Interview'=>$Interview,'FinalList'=>$FinalList,'job_applicants'=>$job_applicants,'job_applicants_reject_number'=>$job_applicants_reject_number,'university'=>$university, 'gender'=>$gender,'salary'=>$salary,'company'=>$company,'designation'=>$designation));


		
	}


	public function shortlist_restoring_reject_list(Request $request){
		// return var_dump($request->all());
		// return $request->all();
		if ($request->ajax()) {
			$update=array(
				'deleted'=>0,
			);
			// $sId=$request->user_id;
			// return $sId;
			$status=ShorTlist::where('job_post_id',$request->get('job_post_id'))->where('user_id',$request->get('user_id'))->update($update);
			// $status->status=$request->status;
			// $status->deleted=1;
			// $status->save();
			// return $request->status;
		// 	$check_user=ShortList::where('user_id',$request->user_id)->where('job_post_id',$request->job_post_id)->get();
		// 	$user_id='';
		// $job_post_id='';
		// 	foreach ($check_user as $u) {
		// 		$user_id.=$u->user_id;
		// 		$job_post_id.=$u->job_post_id;
		// 	}
		// 	if ($job_post_id==$request->job_post_id && $user_id==$request->user_id) {
		// 		return response()->json(array('data'=>'exist'));
		// 	}else{

		// 	$short_list=new ShortList;
		// 	$short_list->job_post_id=$request->job_post_id;
		// 	$short_list->user_id=$request->user_id;
		// 	$short_list->ExpectedSalary=$request->ExpectedSalary;
		// 	$short_list->save();
			

			return response()->json(array('data'=>'success'));
			// }
			
		}

	}

	public function InterviewListing(Request $request){
		if ($request->ajax()) {
			$update=array(
				'status'=>$request->get('status'),
				'deleted'=>1
			);
			// $sId=$request->user_id;
			// return $sId;
			$status=ShorTlist::where('job_post_id',$request->get('job_post_id'))->where('user_id',$request->get('user_id'))->update($update);

			// $sId=$request->status;
			// $status=ShorTlist::find($sId);
			// $status->status=$request->status;
			// $status->deleted=1;
			// $status->save();
			$check_user=Interview::where('user_id',$request->user_id)->where('job_post_id',$request->job_post_id)->get();
			$user_id='';
		$job_post_id='';
			foreach ($check_user as $u) {
				$user_id.=$u->user_id;
				$job_post_id.=$u->job_post_id;
			}
			if ($job_post_id==$request->job_post_id && $user_id==$request->user_id) {
				return response()->json(array('data'=>'exist'));
			}else{

			$short_list=new Interview;
			$short_list->job_post_id=$request->job_post_id;
			$short_list->user_id=$request->user_id;
			$short_list->ExpectedSalary=$request->ExpectedSalary;
			$short_list->save();

			return response()->json(array('data'=>'success'));
			}
			
		}
	}




	public function rejectFromShortList(Request $request){

		// return var_dump($request->all());
		if ($request->ajax()) {

			$check_user=Interview::where('job_post_id',$request->job_post_id)->where('user_id',$request->user_id)->get();
			$status=ShortList::where('job_post_id',$request->job_post_id)
			->where('user_id',$request->user_id)
			->update(['deleted'=>1]);
			return response()->json(array('data'=>'success'));
			}
	}


	/*Interview page, application listing from interview to finallist*/

	 public function interview(Request $request){
	 	$jobIds=$request->jobIds;
	 	$university=$request->university;
		$gender=$request->gender;
		$salary=$request->salary;
		$company=$request->company;
		$designation=$request->designation;
    	$allJobs=JobPost::where('id',$jobIds)->where('deleted',0)->get();
    	$ShortList=ShortList::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$Interview=Interview::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$FinalList=FinalList::where('job_post_id',$jobIds)->where('deleted',0)->count();
   		$applications=Interview::where('job_post_id',$jobIds)->count();

   		$job_applicants_reject_number=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('status',0)->where('deleted',1)->count();

   		// $job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('deleted',0)->get();
   		if ($request->has('university')) {
   			
   		$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('Institution','LIKE','%'.$request->university.'%')->where('deleted',0)->paginate(10);
   		}elseif ($request->has('gender')) {
   			$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('gender',$request->gender)->where('deleted',0)->paginate(10);
   		}elseif($request->has('salary')){
   			$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('ExpectedSalary',$request->salary)->where('deleted',0)->paginate(10);
   		}
   		elseif($request->has('Company',$request->company)){
   			$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('Company','LIKE','%'.$request->company.'%')->where('deleted',0)->paginate(10);
   		}elseif ($request->has('designation')) {
   			$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('Possition','LIKE','%'.$request->designation.'%')->where('deleted',0)->paginate(10);
   		}
   		else{

   		$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('deleted',0)->paginate(10);
   		}
       	
      $checkUserAndJob=Interview::where('job_post_id',$jobIds)->get();
    	$published_date="";
    	$title="";
    	$jobItemIds="";
    	foreach ($allJobs as $job) {
    		$published_date.=$job->created_at;
    		$title.=$job->JobTitle;
    		$jobItemIds.=$job->id;
    	}

    	$published=date_create($published_date);
        $published_on=date_format($published,"l j \ F Y");
    	$JobTitle=$title;
    	$shortL=ShortList::where('job_post_id',$jobIds)->get();
    	return view('admin.interview')->with(array('allJobs'=>$allJobs,'jobItemIds'=>$jobItemIds,'title'=>$title,'jobIds'=>$jobIds,'applications'=>$applications,'JobTitle'=>$JobTitle,'published_on'=>$published_on,'ShortList'=>$ShortList,'Interview'=>$Interview,'FinalList'=>$FinalList,'job_applicants'=>$job_applicants,'job_applicants_reject_number'=>$job_applicants_reject_number,'university'=>$university, 'gender'=>$gender,'salary'=>$salary,'company'=>$company,'designation'=>$designation));
	}


	public function reject_applicants_list_from_interview(Request $request){
		$jobIds=$request->jobIds;
		$university=$request->university;
		$gender=$request->gender;
		$salary=$request->salary;
		$company=$request->company;
		$designation=$request->designation;
    	$allJobs=JobPost::where('id',$jobIds)->where('deleted',0)->get();
    	$ShortList=ShortList::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$Interview=Interview::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$FinalList=FinalList::where('job_post_id',$jobIds)->where('deleted',0)->count();
   		$applications=Interview::where('job_post_id',$jobIds)->count();
   		$job_applicants_reject_number=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('status',0)->where('deleted',1)->count();
   		// $job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('status',0)->where('deleted',1)->get();
   		if ($request->has('university')) {
   			
   		$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('Institution','LIKE','%'.$request->university.'%')->where('deleted',1)->paginate(10);
   		}elseif ($request->has('gender')) {
   			$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('gender',$request->gender)->where('deleted',1)->paginate(10);
   		}elseif($request->has('salary')){
   			$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('ExpectedSalary',$request->salary)->where('deleted',1)->paginate(10);
   		}
   		elseif($request->has('Company',$request->company)){
   			$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('Company','LIKE','%'.$request->company.'%')->where('deleted',1)->paginate(10);
   		}elseif ($request->has('designation')) {
   			$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('Possition','LIKE','%'.$request->designation.'%')->where('deleted',1)->paginate(10);
   		}
   		else{

   		$job_applicants=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$jobIds)->where('deleted',1)->paginate(10);
   		}
       	
       	$checkUserAndJob=Interview::where('job_post_id',$jobIds)->get();
    	$published_date="";
    	$title="";
    	$jobItemIds="";
    	foreach ($allJobs as $job) {
    		$published_date.=$job->created_at;
    		$title.=$job->JobTitle;
    		$jobItemIds.=$job->id;
    	}

    	$published=date_create($published_date);
        $published_on=date_format($published,"l j \ F Y");
    	$JobTitle=$title;
    	$shortL=ShortList::where('job_post_id',$jobIds)->get();
    	return view('admin.reject-from-interview')->with(array('allJobs'=>$allJobs,'jobItemIds'=>$jobItemIds,'title'=>$title,'jobIds'=>$jobIds,'applications'=>$applications,'JobTitle'=>$JobTitle,'published_on'=>$published_on,'ShortList'=>$ShortList,'Interview'=>$Interview,'FinalList'=>$FinalList,'job_applicants'=>$job_applicants,'job_applicants_reject_number'=>$job_applicants_reject_number,'university'=>$university, 'gender'=>$gender,'salary'=>$salary,'company'=>$company,'designation'=>$designation));
	}


	public function interview_restoring_reject_list(Request $request){
		// return var_dump($request->all());
		// return $request->all();
		if ($request->ajax()) {
			$update=array(
				'deleted'=>0,
			);
			// $sId=$request->user_id;
			// return $sId;
			$status=Interview::where('job_post_id',$request->get('job_post_id'))->where('user_id',$request->get('user_id'))->update($update);
			// $status->status=$request->status;
			// $status->deleted=1;
			// $status->save();
			// return $request->status;
		// 	$check_user=ShortList::where('user_id',$request->user_id)->where('job_post_id',$request->job_post_id)->get();
		// 	$user_id='';
		// $job_post_id='';
		// 	foreach ($check_user as $u) {
		// 		$user_id.=$u->user_id;
		// 		$job_post_id.=$u->job_post_id;
		// 	}
		// 	if ($job_post_id==$request->job_post_id && $user_id==$request->user_id) {
		// 		return response()->json(array('data'=>'exist'));
		// 	}else{

		// 	$short_list=new ShortList;
		// 	$short_list->job_post_id=$request->job_post_id;
		// 	$short_list->user_id=$request->user_id;
		// 	$short_list->ExpectedSalary=$request->ExpectedSalary;
		// 	$short_list->save();
			

			return response()->json(array('data'=>'success'));
			// }
			
		}

	}


	public function FinalListing(Request $request){
		if ($request->ajax()) {
			$update=array(
				'status'=>$request->get('status'),
				'deleted'=>1
			);
			// $sId=$request->user_id;
			// return $sId;
			$status=Interview::where('job_post_id',$request->get('job_post_id'))->where('user_id',$request->get('user_id'))->update($update);

			// $sId=$request->status;
			// $status=Interview::find($sId);
			// $status->status=$request->status;
			// $status->deleted=1;
			// $status->save();
			$check_user=FinalList::where('user_id',$request->user_id)->where('job_post_id',$request->job_post_id)->get();
			$user_id='';
		$job_post_id='';
			foreach ($check_user as $u) {
				$user_id.=$u->user_id;
				$job_post_id.=$u->job_post_id;
			}
			if ($job_post_id==$request->job_post_id && $user_id==$request->user_id) {
				return response()->json(array('data'=>'exist'));
			}else{

			$short_list=new FinalList;
			$short_list->job_post_id=$request->job_post_id;
			$short_list->user_id=$request->user_id;
			$short_list->ExpectedSalary=$request->ExpectedSalary;
			$short_list->save();

			return response()->json(array('data'=>'success'));
			}
			
		}
	}

	public function rejectFromInterview(Request $request){
		if ($request->ajax()) {
			// $check_user=FinalList::where('job_post_id',$request->job_post_id)->where('user_id',$request->user_id)->get();
			$status=Interview::where('job_post_id',$request->job_post_id)
			->where('user_id',$request->user_id)
			->update(['deleted'=>1]);
			return response()->json(array('data'=>'success'));
			}
	}

	/*finalList page, application listing from finalList to finallist*/

	public function finalList(Request $request){
		$jobIds=$request->jobIds;
		$university=$request->university;
		$gender=$request->gender;
		$salary=$request->salary;
		$company=$request->company;
		$designation=$request->designation;
    	$allJobs=JobPost::where('id',$jobIds)->where('deleted',0)->get();
    	$ShortList=ShortList::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$Interview=Interview::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$FinalList=FinalList::where('job_post_id',$jobIds)->where('deleted',0)->count();
   		$applications=Application::where('job_post_id',$jobIds)->count();
   		
   		$job_applicants_reject_number=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('status',0)->where('deleted',1)->count();

   		// $job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('deleted',0)->get();
       	
      if ($request->has('university')) {
   			
   		$job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('Institution','LIKE','%'.$request->university.'%')->where('deleted',0)->paginate(10);
   		}elseif ($request->has('gender')) {
   			$job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('gender',$request->gender)->where('deleted',0)->paginate(10);
   		}elseif($request->has('salary')){
   			$job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('ExpectedSalary',$request->salary)->where('deleted',0)->paginate(10);
   		}
   		elseif($request->has('Company',$request->company)){
   			$job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('Company','LIKE','%'.$request->company.'%')->where('deleted',0)->paginate(10);
   		}elseif ($request->has('designation')) {
   			$job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('Possition','LIKE','%'.$request->designation.'%')->where('deleted',0)->paginate(10);
   		}
   		else{

   		$job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('deleted',0)->paginate(10);
   		}

       	$checkUserAndJob=ShortList::where('job_post_id',$jobIds)->get();
    	$published_date="";
    	$title="";
    	$jobItemIds="";
    	foreach ($allJobs as $job) {
    		$published_date.=$job->created_at;
    		$title.=$job->JobTitle;
    		$jobItemIds.=$job->id;
    	}

    	$published=date_create($published_date);
        $published_on=date_format($published,"l j \ F Y");
    	$JobTitle=$title;
    	$shortL=ShortList::where('job_post_id',$jobIds)->get();
    	return view('admin.final-list')->with(array('allJobs'=>$allJobs,'jobItemIds'=>$jobItemIds,'title'=>$title,'jobIds'=>$jobIds,'applications'=>$applications,'JobTitle'=>$JobTitle,'published_on'=>$published_on,'ShortList'=>$ShortList,'Interview'=>$Interview,'FinalList'=>$FinalList,'job_applicants'=>$job_applicants,'job_applicants_reject_number'=>$job_applicants_reject_number,'university'=>$university, 'gender'=>$gender,'salary'=>$salary,'company'=>$company,'designation'=>$designation));
	}

	public function reject_applicants_list_from_finallist(Request $request){
		$jobIds=$request->jobIds;
    $university=$request->university;
    $gender=$request->gender;
    $salary=$request->salary;
    $company=$request->company;
    $designation=$request->designation;    
    	$allJobs=JobPost::where('id',$jobIds)->where('deleted',0)->get();
    	$ShortList=ShortList::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$Interview=Interview::where('job_post_id',$jobIds)->where('deleted',0)->count();
    	$FinalList=FinalList::where('job_post_id',$jobIds)->where('deleted',0)->count();
   		$applications=Application::where('job_post_id',$jobIds)->count();
   		$job_applicants_reject_number=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('status',0)->where('deleted',1)->count();

   		// $job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('deleted',1)->get();

      if ($request->has('university')) {
        
      $job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('Institution','LIKE','%'.$request->university.'%')->where('deleted',1)->paginate(10);
      }elseif ($request->has('gender')) {
        $job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('gender',$request->gender)->where('deleted',1)->paginate(10);
      }elseif($request->has('salary')){
        $job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('ExpectedSalary',$request->salary)->where('deleted',1)->paginate(10);
      }
      elseif($request->has('Company',$request->company)){
        $job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('Company','LIKE','%'.$request->company.'%')->where('deleted',1)->paginate(10);
      }elseif ($request->has('designation')) {
        $job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('Possition','LIKE','%'.$request->designation.'%')->where('deleted',1)->paginate(10);
      }
      else{

      $job_applicants=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$jobIds)->where('deleted',1)->paginate(10);
      }
       	
      $checkUserAndJob=ShortList::where('job_post_id',$jobIds)->get();
    	$published_date="";
    	$title="";
    	$jobItemIds="";
    	foreach ($allJobs as $job) {
    		$published_date.=$job->created_at;
    		$title.=$job->JobTitle;
    		$jobItemIds.=$job->id;
    	}

    	$published=date_create($published_date);
        $published_on=date_format($published,"l j \ F Y");
    	$JobTitle=$title;
    	$shortL=ShortList::where('job_post_id',$jobIds)->get();
    	return view('admin.reject-from-finallist')->with(array('allJobs'=>$allJobs,'jobItemIds'=>$jobItemIds,'title'=>$title,'jobIds'=>$jobIds,'applications'=>$applications,'JobTitle'=>$JobTitle,'published_on'=>$published_on,'ShortList'=>$ShortList,'Interview'=>$Interview,'FinalList'=>$FinalList,'job_applicants'=>$job_applicants,'job_applicants_reject_number'=>$job_applicants_reject_number,'university'=>$university, 'gender'=>$gender,'salary'=>$salary,'company'=>$company,'designation'=>$designation));
	}


	public function finallist_restoring_reject_list(Request $request){
		// return var_dump($request->all());
		// return $request->all();
		if ($request->ajax()) {
			$update=array(
				'deleted'=>0,
			);
			// $sId=$request->user_id;
			// return $sId;
			$status=FinalList::where('job_post_id',$request->get('job_post_id'))->where('user_id',$request->get('user_id'))->update($update);
			// $status->status=$request->status;
			// $status->deleted=1;
			// $status->save();
			// return $request->status;
		// 	$check_user=ShortList::where('user_id',$request->user_id)->where('job_post_id',$request->job_post_id)->get();
		// 	$user_id='';
		// $job_post_id='';
		// 	foreach ($check_user as $u) {
		// 		$user_id.=$u->user_id;
		// 		$job_post_id.=$u->job_post_id;
		// 	}
		// 	if ($job_post_id==$request->job_post_id && $user_id==$request->user_id) {
		// 		return response()->json(array('data'=>'exist'));
		// 	}else{

		// 	$short_list=new ShortList;
		// 	$short_list->job_post_id=$request->job_post_id;
		// 	$short_list->user_id=$request->user_id;
		// 	$short_list->ExpectedSalary=$request->ExpectedSalary;
		// 	$short_list->save();
			

			return response()->json(array('data'=>'success'));
			// }
			
		}

	}


	public function rejectFromFinalList(Request $request){
		if ($request->ajax()) {
			$check_user=Interview::where('job_post_id',$request->job_post_id)->where('user_id',$request->user_id)->get();
			$status=FinalList::where('job_post_id',$request->job_post_id)
			->where('user_id',$request->user_id)
			->update(['deleted'=>1]);
			return response()->json(array('data'=>'success'));
			}
	}

	 public function confirm(){
		// return view('admin.confirm');
	}

	 public function reject(){
		return view('admin.reject');
	}

	 public function archive(){
		return view('admin.archive');
	}

	public function companyPage(){
		$allCompany=Company::all();
		return view('admin.add-company',compact('allCompany'));
	}

	public function addCompany(Request $request){
		if ($request->hasFile('company_logo')) {
		$fileName=$request->company_logo->getClientOriginalName();
		$request->company_logo->storeAs('public/admin/images/',$fileName);
		$insert_info=new Company;
		$insert_info->company_name=$request->company_name;
		$insert_info->company_logo=$fileName;
		$insert_info->save();
		return response()->json(array('data'=>'success'));
		}
	}

	public function editCompany(Request $request){
		$company=Company::where('id',$request->id)->get();
		return response()->json(array('data'=>$company));
	}

	public function updateCompany(Request $request){
		// return $request->updateId;
		if ($request->hasFile('company_logo')) {
		$fileName=$request->company_logo->getClientOriginalName();
		$request->company_logo->storeAs('public/admin/images/',$fileName);
		$insert_info=Company::find($request->updateId);
		$insert_info->company_name=$request->company_name;
		$insert_info->company_logo=$fileName;
		$insert_info->save();
		return response()->json(array('data'=>'success'));
		}else{
		$insert_info=Company::find($request->updateId);
		$insert_info->company_name=$request->company_name;
		$insert_info->save();
		return response()->json(array('data'=>'success'));
		}
		
	}

	public function deleteCompany(Request $req){
		$delCopany=Company::find($req->id)->delete();
		return response()->json(array('data'=>'success'));
	}
	
public function downloadExcelFromApplication(Request $request){
    $jobIds=$request->jobIds;
    $university=$request->university;
    $gender=$request->gender;
    $salary=$request->salary;
    $company=$request->company;
    $designation=$request->designation;
if ($request->has('university')) {
      $results=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('Institution','LIKE','%'.$request->university.'%')->where('deleted',0)->get();
      }elseif ($request->has('gender')) {
        $results=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('gender',$request->gender)->where('deleted',0)->get();
      }elseif($request->has('salary')){
        $results=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('ExpectedSalary',$request->salary)->where('deleted',0)->get();
      }
      elseif($request->has('Company',$request->company)){
        $results=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('Company','LIKE','%'.$request->company.'%')->where('deleted',0)->get();
      }elseif ($request->has('designation')) {
        $results=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('Possition','LIKE','%'.$request->designation.'%')->where('deleted',0)->get();
      }
      else{

      $results=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$jobIds)->where('deleted',0)->get();
      }

// $results=Application::join('users','users.id','=','applications.user_id')->where('job_post_id',$request->jobIds)->where('deleted',0)->get();

Excel::create('applicants_cv', function($excel) use ($results) {
		$excel->sheet('applicants_cv',function($sheet) use ($results){
			
	$sheet->loadView('admin.excel')->with('results',$results);
		});
	})->export('xlsx');	
}
public function downloadExcelFromShortList(Request $request){
$results=ShortList::join('users','users.id','=','short_lists.user_id')->where('job_post_id',$request->jobIds)->where('deleted',0)->get();
Excel::create('applicants_cv', function($excel) use ($results) {
		$excel->sheet('applicants_cv',function($sheet) use ($results){
			
	$sheet->loadView('admin.excel')->with('results',$results,'university',$university, 'gender',$gender,'salary',$salary,'company',$company,'designation',$designation);
		});
	})->export('xlsx');	
}
public function downloadExcelFromInterview(Request $request){
$results=Interview::join('users','users.id','=','interviews.user_id')->where('job_post_id',$request->jobIds)->where('deleted',0)->get();
Excel::create('applicants_cv', function($excel) use ($results) {
		$excel->sheet('applicants_cv',function($sheet) use ($results){
			
	$sheet->loadView('admin.excel')->with('results',$results);
		});
	})->export('xlsx');	
}

public function downloadExcelFromFinalList(Request $request){
$results=FinalList::join('users','users.id','=','final_lists.user_id')->where('job_post_id',$request->jobIds)->where('deleted',0)->get();

	Excel::create('applicants_cv', function($excel) use ($results) {
		$excel->sheet('applicants_cv',function($sheet) use ($results){
			
	$sheet->loadView('admin.excel')->with('results',$results);
		});
	})->export('xlsx');
}

/*Delete function for applicants*/
public function deleteApplicants(Request $request){
	// return $request->all();
	if ($request->ajax()) {
	$delete=User::where('id',$request->id)->delete();
	return response()->json(array('data'=>'success'));
	}


}
}
