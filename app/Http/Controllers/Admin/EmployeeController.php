<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index(){
    return view('admin.employee.add_employee');
    }

    public function store(Request $request){
       // dd($request->all());
  $this->validate($request,[
   'f_name' => 'required',
   'email' => 'required',
   'phone' => 'required',
   'address' => 'required',
   'experience' => 'required',
   'designation' => 'required',
   'nid_no' => 'required',
   'salary' => 'required',
   'vacation' => 'required',
   'city' => 'required',
   'photo' => 'required',

  ]);
  $users = new User;
  $date = Carbon::now()->format('his')+rand(1000,9999);
        // profile photo 
       
        if($image = $request->file('photo')){
            $extention = $request->file('photo')->getClientOriginalExtension();
            $imageName = $date.'.'.$extention;
            $path = public_path('uploads/members/profile');
            $image->move($path,$imageName);
            $users->photo = $imageName;     
        }  
        else{
            $users->photo = "null";  
        }
        $users->name = $request->f_name;
        $users->email = $request->email;
        $users->mobile = $request->phone;
        $users->address = $request->address;
        $users->experience = $request->experience;
        $users->role = $request->designation;
        $users->nid_no = $request->nid_no;
        $users->salary = $request->salary;
        $users->vacation = $request->vacation;
        $users->city = $request->city;
        $users->password = Hash::make("12345678");
        $users->role_name = "User";
        
        
        // dd($members);
         if ($users->save()) {
            return response()->json(["members" => $users]);
         }
         else{
            return response()->json("error");
         }    


   }
}