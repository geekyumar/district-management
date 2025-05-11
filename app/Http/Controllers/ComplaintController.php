<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaints;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function create(Request $request){
        $rules = [
        'complaint_title'   => 'required|string',
        'complaint_type'    => 'required|string',
        'complaint_status'  => 'nullable|string',
        'address'           => 'required|string',
        'district'          => 'nullable|string',
        'pin_code'          => 'nullable|string',
        'image'             => 'nullable|string',
        'location_link'     => 'nullable|string',
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors());
        };

        $complaints = new Complaints();
        $complaints->fill($request->post());
        $complaints->complaint_status = 'Registered';
        $complaints->remarks = 'Registered';
        $complaints->save();

        return redirect('/complaints/list');
    }

    public function createPage(Request $request){
        return view('complaints.create');
    }

    public function statusPage(Request $request){
        $complaintId = request()->query('complaint_id');
        if($complaintId){
            $complaints = Complaints::where('id', $complaintId)->first();
            return view('complaints.status', ['complaints' => $complaints]);
        }

        return view('complaints.status');
    }

    public function sendComplaintData(Request $request, $id){
        $complaints = Complaints::where('id', $id)->first();
        if($complaints){
            return response()->json(['response' => 'success', 'data' => $complaints], 200);
        }

        return response()->json(['response' => 'failed'], 500);
    }

    // public function publish(Request $request, $id){
    //     $job = Jobs::where('id', $id)->update(['is_published' => 1]);
    //     if($job > 0){ // returns the affected rows count, hence written as > 0.
    //         return response()->json(['response' => 'success'], 200);
    //     } else {
    //         return response()->json(['response' => 'failed'], 500);
    //     }
    // }

    // public function unpublish(Request $request, $id){
    //     $job = Jobs::where('id', $id)->update(['is_published' => 0]);
    //     if($job > 0){ // returns the affected rows count, hence written as > 0.
    //         return redirect('/jobs/list?status=published');
    //     } else {
    //         return response()->json(['response' => 'failed'], 500);
    //     }
    // }
    

    public function list(Request $request){
        $complaints = Complaints::all();
        return view('complaints.list', ['complaints' => $complaints]);
    }

    public function edit(Request $request, $id){
        $jobs = Jobs::where('id', $id)->first();
        return view('jobs.edit', ['job' => $jobs]);
    }

    public function update(Request $request, $id){
        $rules = [
            'job_title' => 'required|string',
            'job_description' => 'required|string',
            'department' => 'required|string',
            'job_location' => 'required|string',
            'employment_type' => 'required|string',
            'salary_range' => 'required|string',
            'application_deadline' => 'required|date',
            'required_qualifications' => 'required|string',
            'preferred_qualifications' => 'nullable|string',
            'responsibilities' => 'required|string',
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors());
        };

        $job = Jobs::where('id', $id)->first();
        $job->fill($request->post());
        $job->save();

        return redirect('/jobs/list');
    }

    public function delete(Request $request, $id){
        Jobs::where('id', $id)->first()->delete();
        return redirect('/jobs/list');
    }
}