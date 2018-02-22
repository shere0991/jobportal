<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobPost;
use App\Company;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
   
    {   if ($request->ajax()) {
        $jobList=JobPost::where('JobTitle','LIKE','%{ $request->search }%')->where('deleted',0)->paginate(10);
       $total_available_jobs=JobPost::where('deleted',0)->count();  

    }else{
        $jobList=JobPost::where('deleted',0)->paginate(10);
    }
       $total_available_jobs=JobPost::where('deleted',0)->count();  
        $all_company=Company::all();
        return view('home',compact('jobList','all_company','total_available_jobs'));
    }


     public function company_base_job_list(Request $request){
        $company_base_job=JobPost::where('company_id',$request->companyId)->where('deleted',0)->get();
        $company_details=Company::where('id',$request->companyId)->get();
        $company_name="";
        $company_logo="";
        foreach ($company_details as $c) {
            $company_name.=$c->company_name;
            $company_logo.=$c->company_logo;
        }
        return view('company-base-job',compact('company_base_job','company_name','company_logo'));
    }

    public function search_job(Request $request){
        if ($request->ajax()) {
            $jobs=JobPost::where('JobTitle','LIKE',"%{$request->search}%")->where('deleted',0)->get();
            return response()->json(array('data'=>$jobs));
        }
    }

    public function search(Request $request){
        if ($request->ajax()) {
            $searchJob=JobPost::where('JobTitle','LIKE',"%{$request->search}%")->where('deleted',0)->get();
            return view('search',compact('searchJob'));
        }
    }

    public function single_job(Request $request){
        $job_preview=JobPost::where('id',$request->jobId)->where('deleted',0)->get();
        return view('single-job',compact('job_preview'));
    }
}
