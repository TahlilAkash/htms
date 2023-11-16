<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    //retrive from database
    public function Subject(){
        // $subjects=Subject::all();
        $subjects=Subject::paginate(5);// table name -- model name
        return view('admin.pages.subject.subject_li' ,compact('subjects'));//subjects =table name
    }

    public function Create_form()
    {

        return view('admin.pages.subject.sub_form');
    }
    public function Store(Request $request){
             //    dd($request->all());
            
            $validate=Validator::make($request->all(),[
                //name property of  form 
            'subject_name'=>'required',
            ]);
             // validate before store
            if($validate->fails()){
                return redirect()->back()->withErrors($validate);
            }
           //model mame
           // storing to the database
           Subject::create([
            'name'=>$request->subject_name,  //database column name,request , name property of form
            // 'code'=>$request->code,
            'description'=>$request->description
           ]);
           notify()->success('Submit Successfully ⚡️');
           return redirect()->route('subject.list');   
                        

        
    }
}