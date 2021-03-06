<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_user(Request $request){
       $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:5|max:12',
       ]);
       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $res = $user->save();
       if($res){
        return back()->with('success','Succesfully registered!!');
       }else{
        return back()->with('fail','Failed to registered!!');
       }

    }

    public function login_user(Request $request){
        // return "Logging in!!";
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }
            else{
                return back()->with('fail','Password mismatch!!');
            }
        }else{
            return back()->with('fail','Email not registered!!');
        }
    }

    public function dashboard(){
        $data = array();
        if(Session()->has('loginId')){
            $data = User::where('id','=',Session()->get('loginId'))->first();
        }

        if($data->role=="Admin"){
            return view('admin.dashboard',compact('data'))->with('userArr',User::all());
        }
        else if($data->role=="Manager"){
            return view("manager.dashboard",compact('data'));
        }
        else if($data->role=="Hr"){
            return view("hr.dashboard",compact('data'));
        }
        else if($data->role=="Employee"){
            return view("employee.dashboard",compact('data'));
        }
        else{
            return view("employee.dashboard",compact('data'));
        }
    }

    public function logout(){
        // return "Logging out!!";
        if(Session()->has('loginId')){
            Session()->pull('loginId');
            return redirect('login');
        }
    }

    public function delete(User $user,$id){
        User::destroy(array('id',$id));
        return back();
    }

    public function edit_adminm(Request $request,$id){
        $data = DB::table('users')->where('id', $id)->first();
        // print_r($data);
        return view("admin.edit",compact('data'));
    }

    public function edit_userm(Request $request,$id){
        $data = DB::table('users')->where('id', $id)->first();
        // print_r($data);
        return view("edit",compact("data"));
    }

    public function edit_admin(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'role'=>'required'
        ]);
        $user = User::where('email','=',$request->email)->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'role'=>$request->input('role'),
        ]); 

        return redirect('dashboard');
    }

    public function edit_user(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
        ]);
        $user = User::where('email','=',$request->email)->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email')
        ]); 

        return redirect('dashboard');
    }
}
