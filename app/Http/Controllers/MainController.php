<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
 
class MainController extends Controller
{
    public function login()
    {
        return view ("auth.login");
    }
    public function registration()
    {
        return view ("auth.registration");
    }
    public function registerUser(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password' => [
                'required',
                'min:10',
               
            ]
        ]);
        $user = new User();
        $user -> name = $request->name;
        $user -> email = $request->email;
        $user -> password = Hash::make($request->password);
        $res = $user -> save();
        if ($res){
            return back() -> with('success', 'Registered Successfuly');
        }else{
            return back() -> with('fail','Something Wrong');
        }
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:10|max: 30',
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if (Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','Passwords do not match!');
            }
        }else{
            return back()->with('fail','This email is not registered. Please register first !');
        }
    }
    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId')){
        $data = User::where('id','=', Session::get('loginId'))->first();
        }
        return view('dashboard', compact('data'));
    }
    public function logout(){
        if (Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
