<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\Subject;
use App\Models\Tuition;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TuitionController extends Controller
{
    public function Tuition_list(){
        // $tuitions=Tuition::paginate(5);
        $tuitions=Tuition::with(['subject','institute'])->paginate(5); //for relatation with before model names
        // dd($tuitions);
        return view('admin.pages.tuition.tuition_list',compact('tuitions'));
    }
    public function Tuition_form(){
        $subjects=Subject::all();//database table_name,Model_name  
        $institutes=Institute::all();  //dropdown from subjects table & tuition table
        return view('admin.pages.tuition.tuition_form',compact('subjects','institutes'));
    }
    public function Tuition_store(Request $request){
        
        
        $validate=Validator::make($request->all(),[
            'subject_id'=>'required',  // name property of form
            'type'=>'required',
            'institute_id'=>'required',
            'preferable_salary'=>'required|numeric|min:10',
        ]);

        if($validate->fails())
      {

        //  notify()->error($validate->getMessageBag());
        // return redirect()->back();

        return redirect()->back()->withErrors($validate);
      }

        // dd($request->all()); before  storing it create model and migration
        Tuition::create([//to stote the form
            'subject_name'=>$request->subject_id,  //database column name,request , name property of form
            'tuition_type'=>$request->type,
            'institute_name'=>$request->institute_id,
            'salary'=>$request->preferable_salary
           ]);
           notify()->success('Submit Successfully ⚡️');
           return redirect()->route('tuition.list');
    }
}