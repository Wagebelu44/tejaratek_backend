<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting as MyModel;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use DB;


class SettingController extends AdminController
{
    public function __construct()
    {
        parent::__construct();

    }
    //////////////////////////////////////////////
    public function index(Request $request)
    {
        $userhasper = \Auth::user();
        
            $setting = new MyModel();
            $data['setting'] = $setting->getsetting(1);
            return view('admin.setting.index',compact('data'));
        
  
    }
/***********************************************************************************************************************/
    public function update(Request $request){
            $name_ar = $request->get('title_ar');
            $description = $request->get('description');
            $email = $request->get('email');
            $mobile = $request->get('mobile');
            $location = $request->get('locationn');

            $rules = [
                'name_ar' => 'required',
                'description' => 'required',
                'email' => 'required',
                'locationn' => 'required',
            ];
    
            $validator = \Validator::make([
                'name_ar' => $name_ar,
                'description' => $description,
                'email' => $email,
                'locationn' => $location,
            ],
                $rules
            );
    
            if ($validator->fails()) {
                return response()->json(['status' => false , 'message' => 'جميع الحقول مطلوبة']);
            }

           

            $setting = new MyModel();
            $obj = $setting->getsetting(1);
            $saved =  $setting->setting($obj,$name_ar,$email,$mobile,$description,$location);
            if(!$saved){
                return response()->json(['status' => false , 'message' => 'حدث خطأ أثناء العملية']);
            }
        
            return response()->json(['status' => true , 'message' => 'تم تعديل البيانات' , 'data' => $saved]);
            
        }

    public function dateformat($date){
        return date("Y-m-d", strtotime($date));
    }
}