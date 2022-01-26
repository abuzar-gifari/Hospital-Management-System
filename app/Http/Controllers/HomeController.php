<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect(){
        if (Auth::id()) {
            if (Auth::user()->usertype=='0') {
                $doctor = Doctor::all();
                return view('user.home',compact('doctor'));
            }else {
                return view('admin.home');
            }
        }else {
            return redirect()->back();
        }
    }

    public function index(){
        if (Auth::id()) {
            return redirect('home');
        }else {
            $doctor = Doctor::all();
            return view('user.home',compact('doctor')); 
        }
        
    }

    public function appoinment(Request $request){
        // dd($request->all());
        try {

            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'date'=>'required',
                'doctor'=>'required',
                'number'=>'required|digits:11',
                'message'=>'required',
            ],$messages = [
                'name.required' => 'Your Name is required.',
                'email.required' => 'Your Email is required.',
                'date.required' => 'The Date is required.',
                'doctor.required'=>'Which doctor you want to appoint?',
                'number.required'=>'Your Number is required.',
                'message.required'=>'Please Say Something, Thanks!!'
            ]);

            if (Auth::id()) {
                $data = new Appoinment();
                $data->name = $request->name;
                $data->email = $request->email;
                $data->phone = $request->number;
                $data->doctor = $request->doctor;
                $data->date = $request->date;
                $data->message = $request->message;
                $data->status = 'In Progress';
                $data->user_id = Auth::user()->id;
                $data->save();
                return redirect()->back()->with('msg','Appoinment Created Succesfully');    
            }else {
                return redirect()->route('login');
            }            
        } catch (\Exception $exception) {
            $errors = $exception->validator->getMessageBag();
            return redirect()->back()->withErrors($errors)->withInput();
        }
        
    }

    public function myappoinment(){
        if (Auth::id()) {
            $userid = Auth::user()->id;
            $appoin = Appoinment::where('user_id',$userid)->get();
            return view('user.my_appoinment',compact('appoin'));
        }else {
            return redirect()->back();
        }
        
    }

    public function cancel_appoin($id){
        $data = Appoinment::find($id);
        $data->delete();
        return redirect()->back();
    }

}
