<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\session;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
   }
   public function logincheck(Request $request)
   {
    //  dd($request);

     $email =strtolower($request->email);
     if($user=User::where('email',$email)->first()){
         if(Hash::check($request->password,$user->password))
         {
            $data = session([
                       'employee_name' => $user->name,
                       'employee_id' => $user->id,
                       'email' => $user->email,
                       'mobile' => $user->mobile,
                       'address' => $user->address,
                       'role' => $user->role,
                       'role_name' => $user->role_name,
                       'status' => $user->status,
                       'photo' => $user->photo,



            ]);

            if($user->role == 1)
            {
               return redirect('admin/dashboard');

            }elseif($user->role ==0 && $user->status ==1){

            }

            else{
               return redirect('/')->with('error','Your account is inactive');

            }

         }else{
           return back()->with('error','Wrong Password');

         }

     }else{
       return back()->with('error','please give vaild email');


     }



   }
  public function logout(){
   $forget = session()->flush();
   return redirect('/');
  }
} 
       
         
    



