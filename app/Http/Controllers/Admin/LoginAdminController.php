<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginAdminController extends AdminController
{
    use AuthenticatesUsers;
    public function __construct()
    {
        parent::__construct();
    }
    ///////////////////////////////////////////
    public function getIndex()
    {
        return view('admin.login.index');
    }
    ///////////////////////////////////////////
    public function postIndex(Request $request)
    {
        $field = 'username';
        $username = $request->get('username');
        $password = $request->get('password');
        $remember_token = $request->get('remember_token');

        $user = User::where('username',$username)->first();
        if($user != ''){
            if($user->status != 1){
                return redirect('/admin/login')->with(['danger' =>__('text.sorry_the_account_is_disabled_Please_see_administration') ]);
            }
        }else{
            return redirect('/admin/login')->with(['danger' => __('text.sorry_an_error_in_the_data_entered')]);
        }

        $admin[$field] = $username;
        $admin['password'] = $password;

        if (Auth::guard('web')->attempt($admin, $remember_token))
        {
            return redirect()->intended('/admin/dashboard');
        }   
        else
        {
            return redirect('/admin/login')->with(['danger' => __('text.sorry_an_error_in_the_data_entered')]);
        }
    }
    ///////////////////////////////////////////
    public function getLogout(Request $request)
    {
        Auth::logout();
        return redirect('/admin/login');
    }

}
