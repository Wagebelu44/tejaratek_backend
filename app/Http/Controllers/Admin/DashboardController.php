<?php

namespace App\Http\Controllers\Admin;

use App\Models\Adv;
use App\Models\Posts;
use App\Models\User;
use App\Models\BreakingNews;
use App\Models\Messages as ModelsMessages;
use App\Models\Participation;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\settings;
use Illuminate\Validation\Rule;
use App\Models\transfer_between_currencies;
use App\Models\system_constants;
use DateTime;
use Carbon\Carbon;

class DashboardController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
  //************************************************************************************************************
    //                                          Index function
    //************************************************************************************************************
    public function index(Request $request)
    {
        return view('admin.dashboard.index');
    }

    //************************************************************************************************************
    //                                          view  profile page function
    //************************************************************************************************************

    public function getProfile()
    {
        return view('admin.dashboard.profile');
    }
  //************************************************************************************************************
    //                                          update password function
    //************************************************************************************************************
    public function postPassword(Request $request)
    {
        $password = $request->get('password');
        $item = User::find(Auth::user()->id);
        if ($item != '') {

            $rules = [
                'password' => 'required',

            ];

            $messages = [
                'password.required' =>  __('text.password_required'),

            ];

            $validator = \Validator::make(
                [
                    'password' => $password,
                ],
                $rules,
                $messages
            );


             //cheack  validator
           if ($validator->fails() ) {
            return response()->json(['status' => false, 'data_validator' => $validator->messages() ]);
             }

            $item->password = \Hash::make($password);
            $saved = $item->save();
            if (!$saved) {
                return response()->json(['status' => false, 'data' => __('text.error_process')]);
            }
            return response()->json(['status' => true, 'data' =>  __('text.change_password_successfully')]);
        } else {
            return response()->json(['status' => false, 'data' => __('text.error_process')]);
        }
    }

    public function getNotification(){
        $unread =ModelsMessages ::whereNull('read_at')->count();
        return response()->json(['status' => true ,'unread'=> $unread]);
    }

    // public function readNotification(){
    //   $unread = ModelsMessages::whereNull('read_at')->get();
    //   foreach($unread as $u){
    //     $u->read_at = date('Y-m-d H:i:s');
    //     $u->save();
    //   }
    //   return response()->json(['status' => true]);
    // }
    
    public function getNotification2(){
        $unread =Participation ::whereNull('read_at')->count();
        return response()->json(['status' => true ,'unread'=> $unread]);
    }

    public function readNotification2(){
      $unread = Participation::whereNull('read_at')->get();
      foreach($unread as $u){
        $u->read_at = date('Y-m-d H:i:s');
        $u->save();
      }
      return response()->json(['status' => true]);
    }

}
