<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Socialite;
use App\Http\Requests\RequestUser;

class ManagerUserController extends HomeController
{
    public function index(){
        return view('frontend.pages.layout.login');
    }
    public function registration(RequestUser $request){

        $user = User::create([
            'name' => $request->name1,
            'email' => $request->email1,
            'password' => Hash::make($request->password1),
        ]);
        Auth::login($user);
        return redirect('/')->with('success','Đăng ký tài khoản thành công !');
    }
    public function login(Request $request){
        
        $this->validate($request,
        [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],
        [
            'email.required' => 'Email của bạn không được để trống (*)',
            'email.email' => 'Email của bạn không hợp lệ (*)', 
            'password.required' => 'Mật khẩu của bạn không được để trống (*)',
            'password.min' => 'Mật khẩu của bạn phải được 6 ký tự (*)',
        ]);
        $data = $request->only('email','password');
        if(Auth::attempt($data,$request->has('remember'))){
            return redirect('/')->with('success','Đăng nhập tài khoản thành công !');
        }else{
            return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không đúng !');
        }
    }
    public function logout($id){
        if(Auth::check()){
            Auth::logout();
            return redirect('/')->with('success','Đăng xuất tài khoản thành công !'); 
        }
    }
    public function redirectToProvider($social_id){
        return Socialite::driver($social_id)->redirect();
    }
    public function handleProviderCallback($social_id){
        $user = Socialite::driver($social_id)->user();
        $AuthUser = $this->FirstOrCreate($user);
        Auth::login($AuthUser);
        return redirect('/')->with('success','Đăng nhập tài khoản thành công !');
    }
    protected function FirstOrCreate($user){
        $AuthUser = User::where('social_id',$user->id)->first();
        if($AuthUser){
            return $AuthUser;
        }else{
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id' => $user->id,
                'avatar' => $user->avatar,
                'password' => '',
                'ruler' => 1,
                'status' => 0
            ]);
        }
    }
    public function redirectToProviderGG($social_gg){
        return Socialite::driver($social_gg)->redirect();
    } 
    public function handleProviderCallbackGG($social_gg){
        $user = Socialite::driver($social_gg)->user();
        $AuthGG = $this->FirstOrCreateGG($user);
        Auth::login($AuthGG);
        return redirect('/')->with('success','Đăng nhập tài khoản thành công !'); 
    }
    protected function FirstOrCreateGG($user){
        $AuthGG = User::where('social_id',$user->id)->first();
        if($AuthGG){
            return $AuthGG;
        }else{
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'social_id' => $user->id,
                'ruler' => 1,
                'status' => 0,
                'password' => '',
            ]);
        }
    }
}
