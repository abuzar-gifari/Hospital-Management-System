<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appoinment;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    // Add Doctor Page View
    public function addview(){
        return view('admin.add_doctor');
    }

    // Upload Doctor Information (POST Route)
    public function upload(Request $request){
        $doctor = new Doctor();
        $image = $request->image;
        $imageName = time(). '.' .$image->getClientOriginalExtension();
        $request->image->move('doctorimage',$imageName);

        $doctor->image = $imageName;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $doctor->save();
        return redirect()->back()->with('msg','Information Added Succesfully!');
    }

    // Show Appoinment Page
    public function showappoinment(){
        $data = Appoinment::all();
        return view('admin.showappoinment',compact('data'));
    }

    public function approved($id){
        $data = Appoinment::find($id);
        $data->status = "Approved";
        $data->save();
        return redirect()->back();
    }

    public function canceled($id){
        $data = Appoinment::find($id);
        $data->status = "Canceled";
        $data->save();
        return redirect()->back();
    }

    // Show Doctor Information Page
    public function showdoctor(){
        $data = Doctor::all();
        return view('admin.showdoctor',compact('data'));
    }

    // Delete doctor information
    public function deletedoctor($id){
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    // Update doctor information Page
    public function updatedoctor($id){
        $data = Doctor::find($id);
        return view('admin.updatedoctor',compact('data'));
    }

    // Update doctor information (POST Route)
    public function editdoctor(Request $request,$id){
        $data = Doctor::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->speciality = $request->speciality;
        $data->room = $request->room;

        if ($request->file('image')) {
            $image = $request->image;
            $imageName = time(). '.' .$image->getClientOriginalExtension();
            $request->image->move('doctorimage',$imageName);
            $data->image = $imageName;    
        }
        
        $data->save();
        return redirect()->back()->with('msg','Information Updated Successfully');

    }

    public function emailview($id){
        $data = Appoinment::find($id);
        return view('admin.email_view',compact('data'));
    }

    // Send Email Notification
    public function sendemail(Request $request,$id){
        $data = Appoinment::find($id);

        $details=[
            'greeting' => $request->greeting,
            'body' => $request->greeting,
            'actiontext' => $request->greeting,
            'actionurl' => $request->greeting,
            'endpart' => $request->greeting,
        ];

        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with('msg','Email Send Successfully');
    }
}
