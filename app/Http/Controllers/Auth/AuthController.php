<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class AuthController extends Controller
{
  public function __construct()
   {
       $this->middleware('guest', ['except' => 'getLogout']);
   }

    public function getRegister(){
      $cats = Category::all();
       return view('auth.register', compact('cats'));
    }

    public function postRegister(Request $request){
      $this->validate($request, [
     'name'     => 'required|max:255',
     'email'    => 'required|unique:users|email|max:255',
     'tel_no'   => 'required|digits:10',
     'password' => 'required|min:6',
     'password_confirmation' => 'min:6|same:password',
  ]);

  $user =   User::create([
     'name'     => $request->input('name'),
     'email'    => $request->input('email'),
     'tel_no'   => $request->input('tel_no'),
     'password' => bcrypt($request->input('password')),
     'visitor' => $request->ip(),
  ]);

  //Automatically logs user in
    Auth::login($user, true);

    notify()->flash('Registered Successfully', 'success', [
        'timer' => 3000,
        'text' => 'Have a wonderful learning experience at I-STUDY',
         ]);

    return redirect()->route('home');
    }


  public function getLogin(){
    $cats = Category::all();
     return view('auth.login', compact('cats'));
  }

 public function postLogin(Request $request){
   $this->validate($request, [
         'email'     => 'required',
         'password'  => 'required',
       ]);

    $email = $request->input('email');
    $password = $request->input('password');

    if(Auth::attempt(['email' => $email, 'password' => $password, 'role_id' => 1], $request->has('remember'))){
          return redirect()->route('admin');
        }else if(Auth::attempt(['email' => $email, 'password' => $password], $request->has('remember'))){
          notify()->flash('Welcome Back!', 'success', [
               'timer' => 3000,
               'text' => 'Have a wonderful shopping experience at Kbc-Agency',
                ]);

                return redirect()->route('home');
        } else {
           notify()->flash('The username/password is incorrect!');
             return redirect()->route('login');
        }

 }


    public function getLogout(){
      Auth::logout();

      return redirect()->route('home');
    }
}
