<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MunicipalWorks;
use Illuminate\Support\Facades\Validator;

class MunicipalWorkController extends Controller
{
    public function list(Request $request){
        return view('municipal-works.list', ['municipal_works' => MunicipalWorks::all()]);
    }


    public function editPage(Request $request, $id){
        return view('job-categories.category-edit', ['category' => JobCategories::where('id', $id)->first()]);
    }

    public function edit(Request $request, $id){

        $rules = [
            'category_type' => 'required',
            'category_name' => 'required'
        ];

        $validator = Validator::make($request->post(), $rules);
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);
        }

        $data = [
            'category_type' => $request->post('category_type'),
            'category_name' => $request->post('category_name'),
        ];

        JobCategories::where('id', $id)->update($data);
        return redirect('/job-categories');
    }

    public function delete(Request $request, $id){
        JobCategories::where('id', $id)->delete();
        return redirect('job-categories');
    }

    public function createPage(Request $request){
        return view('municipal-works.create');
    }

    public function create(Request $request){
    $rules = [
        'work_type'     => 'required|string',
        'assigned_to'   => 'required|string',
        'instructions'  => 'required|string',
        'location'      => 'required|string',
    ];

        
    $validator = Validator::make($request->post(), $rules);
    if($validator->fails()){
        return response()->json(['error' => $validator->errors()]);
    }

    $work = new MunicipalWorks();

    $work->fill($request->post());
    $work->status = 'Registered';
    $work->remarks = 'Registered';
    $work->assigned_by = auth()->user()->name;
    $work->save();

    return redirect('/municipal-works/list');
    
    }
}
