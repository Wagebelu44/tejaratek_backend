<?php

namespace App\Http\Controllers\Admin;

use App\Models\User as MyModel;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\User_Permission;
// use App\Models\Permission;
use DB;

class UserController extends AdminController
{
    public function __construct()
    {
        // parent::__construct();
    }
    //////////////////////////////////////////////
    public function index(Request $request)
    {
        $name  = $request->get('name');
        
        $users = New MyModel();
        $data['users'] = $users->getUsers($name);

        if ($request->ajax()) {
            return view('admin.users.table-data', compact('data'))->render();
        }
        return view('admin.users.index',compact('data'));
    }
  /***********************************************************************************************************************/
    public function add(Request $request){
       
        $users = New MyModel();

        $hidden = $request->get('hidden');
        if($hidden == 0){
            $name = $request->get('name');
            $fullname = $request->get('fullname');
            $email = $request->get('email');
            $password = $request->get('password');
            $mobile = $request->get('mobile');
            if(isset($request['activeValue'])){
                $status = 1;
            }else{
                $status = 0;
            }

            $rules = [
                'name' => 'required',
                'password' => 'required',
                'fullname' => 'required',
            ];
    
            $messages = [
                'name.required' => 'اسم مستخدم  مطلوب',
                'password.required' => 'كلمة المرور مطلوبة',
            ];
    
            $validator = \Validator::make([
                'name' => $name,
                'password' => $password,
                'fullname' => $fullname,
            ],
                $rules
                ,
                $messages
            );

            if ($validator->fails()) {
                return response()->json(['status' => false , 'data' => 'جميع الحقول مطلوبة']);
            }
            
            if($name != ''){
                if(preg_match('/[^A-Za-z0-9]/', $name)){
                    return response()->json(['status' => false , 'data' => 'اسم المستخدم يجب أن يكون باللغة الانجليزية']);
                }
            }
            if($name != ''){   
                $users_name_count = $users->checkUser(1,$name,'');
                if($users_name_count > 0){
                    return response()->json(['status' => false , 'data' => 'اسم المستخدم موجود مسبقا']);
                }
            }

            if($email != ''){
                $users_count = $users->checkEmail(1,$email,'');
                if($users_count > 0){
                    return response()->json(['status' => false , 'data' => 'البريد الالكتروني مستخدم من قبل']);
                }
            }
           
            $saved = $users->addUser($name,$email,$mobile,$password,$status,$fullname);
            if (!$saved) {
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء عملية الإضافة']);
            }
            return response()->json(['status' => true , 'data' => 'تمت عملية الإضافة']);
        }else{
            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء عملية الإضافة']);
        }
        

    }
/***********************************************************************************************************************/
    public function edit(Request $request){
        $id = $request->get('id');
        $users = New MyModel();
        $item =  $users->getUser($id);
        if($item != ''){
            return response()->json(['status' => true , 'data' => $item]);
        }else{
            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
        }
    }

    /***********************************************************************************************************************/

    public function UpdateStats(Request $request){
        $id = $request->get('id');
        if($id == 1){
            return response()->json(['status' => false , 'data' => 'لا يمكن تعديل حالة الأدمن']);
        }
        $users = New MyModel();
        $item =  $users->getUser($id);
        if($item != ''){
            $saved = $users->UpdateStatus($item);
            if(!$saved){
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
            return response()->json(['status' => true , 'data' => 'تم تعديل الحالة']);
        }else{
            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
        }
    }
/***********************************************************************************************************************/
    public function update(Request $request){
      
        // $userhasper = \Auth::user();
        // $userhasper->hasPermissionTo('update_users');
        $hidden = $request->get('hidden');

        if($hidden != 0){
            $users = New MyModel();
            $item =  $users->getUser($hidden);
            if($item == ''){
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
         
            $name = $request->get('name');
            $fullname = $request->get('fullname');
            $email = $request->get('email');
            $password = $request->get('password');
            $mobile = $request->get('mobile');
            if(isset($request['activeValue'])){
                $status = 1;
            }else{
                $status = 0;
            }

            $rules = [
                'name' => 'required',
                'fullname' => 'required',
            ];
    
            $messages = [
                'name.required' => 'اسم مستخدم  مطلوب',
            ];
    
            $validator = \Validator::make([
                'name' => $name,
                'fullname' => $fullname,
            ],
                $rules
                ,
                $messages
            );
    
            if ($validator->fails()) {
                return response()->json(['status' => false , 'data' => 'جميع الحقول مطلوبة']);
            }

            if($name != ''){
                if(preg_match('/[^A-Za-z0-9]/', $name)){
                    return response()->json(['status' => false , 'data' => 'اسم المستخدم يجب أن يكون باللغة الانجليزية']);
                }
            }

            if($name != ''){   
                $users_name_count = $users->checkUser(2,$name,$hidden);
                if($users_name_count > 0){
                    return response()->json(['status' => false , 'data' => 'اسم المستخدم موجود مسبقا']);
                }
            }

            if($email != ''){
                $users_count = $users->checkEmail(2,$email,$hidden);
                if($users_count > 0){
                    return response()->json(['status' => false , 'data' => 'البريد الالكتروني مستخدم من قبل']);
                }
            }
            
            $saved = $users->updateUser($item,$name,$email,$mobile,$password,$status,$fullname);
            if(!$saved){
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
            return response()->json(['status' => true , 'data' => 'تم تعديل البيانات']);
        }
    }
/****************************************************************************************************************************************** */
    public function delete(Request $request){
        $id = $request->get('id');
        if($id == 1){
            return response()->json(['status' => false , 'data' => 'لا يمكن حذف الأدمن']);
        }
        $users = New MyModel();
        $item =  $users->getUser($id);
        if($item != ''){
            $deleted = $users->deleteUser($item);
            if(!$deleted){
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
            return response()->json(['status' => true , 'data' => 'تم الحذف بنجاح']);
        }else{
            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
        }

    }
/****************************************************************************************************************************************** */
  public function changepassword(Request $request){
 
     $hidden = $request->get('hidden');
     $password = $request->get('password');
     $confirmation_password = $request->get('confirmation_password');
     
    if($password == '' or $confirmation_password == ''){
    return response()->json(['status' => false , 'data' => 'جميع الحقول مطلوبة']);
    }

    $users = New MyModel();
    $item =  $users->getUser($hidden);
    if($item != ''){
        if($password === $confirmation_password){
            $saved = $users->changePassword($item,$password);
            $saved = $item->save();
            if(!$saved){
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
            return response()->json(['status' => true , 'data' => 'تم تغيير  كلمة المرور']);
        }else{
            return response()->json(['status' => false , 'data' => 'كلمة المرور غير متطابقة']);
        }
    }else{
        return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
    }

  }
/**************************************************************************************/
public function permission(Request $request){
   
    $hidden = $request->get('hidden');
    $permissions = $request->get('permissions');
    $item = MyModel::find($hidden);
        if($item != ''){
            // if($item->id == 1){
            //     return response()->json(['status' => false , 'data' => 'لا يمكن تعديل صلاحيات الأدمن']);
            // }
           $user_permissions = User_Permission::where('model_id','=',$item->id)->get();
           foreach($user_permissions as $per){
            $item->revokePermissionTo($per->guard_name);
           }

            if($permissions){
                foreach($permissions as $permission){
                        $perm = Permission::find($permission);
                        $item->givePermissionTo($perm);
                }
            }
           return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح']);
        }else{
            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
        }
    
}
/************************************************************************************************************************************ */

public function getpermission(){
   return $data['permissions'] = Permission::orderBy('group_id')->get(['id','name_ar as name','name as name_en','group_id','group']);
}

public function userpermission(Request $request){
  
    $id = $request->get('id');
    $user_permissions = User_Permission::where('model_id','=',$id)->get();
    $permissions = self::getpermission();
    $permissions = $permissions->groupBY('group_id');
    $user_per ='';
    $per_group = 0;
    $checked ='';
    $i = 0;
    $z = 0;
    $margin_top = 0;
    $view = view('admin.users.sub.permission', compact(['permissions','user_permissions']))->render();
    return response()->json(['data'=>$view]);
    
}

}