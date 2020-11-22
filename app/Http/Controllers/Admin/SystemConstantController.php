<?php

namespace App\Http\Controllers\Admin;

use App\Models\System_Constants as MyModel;
use Illuminate\Http\Request;
// use Spatie\Permission\Models\Permission;
// use App\Models\User_Permission;
use DB;

class SystemConstantController extends AdminController
{
    public function __construct()
    {
        // parent::__construct();
    }
    //////////////////////////////////////////////
    public function index(Request $request)
    {
        $data['all_constant'] = MyModel::where('type','system_constants')->get(['name_ar as name','value2 as type']);
        $data['add_constant'] = MyModel::where('type','system_constants')->where('value',1)->get(['name_ar as name','value2 as type']);
        $name  = $request->get('name');
        $type  = $request->get('type');

        $system = new MyModel();
        $data['system_constants'] = $system->getSystem($name,$type);

        if ($request->ajax()) {
            return view('admin.system_constants.table-data', compact('data'))->render();
        }
        return view('admin.system_constants.index',compact('data'));
    }
  /***********************************************************************************************************************/
    public function add(Request $request){
        $hidden = $request->get('hidden');
        if($hidden == 0){

            $name = $request->get('name');
            $type = $request->get('type');

            if(isset($request['activeValue'])){
                $status = 1;
            }else{
                $status = 0;
            }


            $rules = [
                'name' => 'required',
                'type' => 'required',
            ];

            $messages = [
                'name.required' => 'الاسم مطلوب',
                'type.required' => 'النوع مطلوب',
            ];

            $validator = \Validator::make([
                'name' => $name,
                'type' => $type,
            ],
                $rules
                ,
                $messages
            );

            if ($validator->fails()) {
                return response()->json(['status' => false , 'data' => 'جميع الحقول مطلوبة']);
            }

            $system = new MyModel();
            $saved = $system->addconstant($name,$type,$status);

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
            $system = new MyModel();
            $item = $system->getconstant($id);
            if($item != ''){
                return response()->json(['status' => true , 'data' => $item]);
            }else{
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
    }

    /***********************************************************************************************************************/

    public function UpdateStats(Request $request){
        $id = $request->get('id');
        $system = New MyModel();
        $item =  $system->getconstant($id);
        if($item != ''){
            $saved = $system->UpdateStatus($item);
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
        $hidden = $request->get('hidden');

        if($hidden != 0){
            $system = new MyModel();
            $item = $system->getconstant($hidden);
            if($item == ''){
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
            $name = $request->get('name');
            $type = $request->get('type');

            $rules = [
                'name' => 'required',
                'type' => 'required',
            ];

            $messages = [
                'name.required' => 'اسم مستخدم  مطلوب',
                'type.required' => 'السنة مطلوبة',
            ];

            $validator = \Validator::make([
                'name' => $name,
                'type' => $type,
            ],
                $rules
                ,
                $messages
            );

            if ($validator->fails()) {
                return response()->json(['status' => false , 'data' => 'جميع الحقول مطلوبة']);
            }

            $saved = $system->updateconstant($item,$name,$type);
            if(!$saved){
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
            return response()->json(['status' => true , 'data' => 'تم تعديل البيانات']);
        }
    }
/****************************************************************************************************************************************** */
    public function delete(Request $request){
       
        $id = $request->get('id');
        $system = New MyModel();
        $item =  $system->getconstant($id);
        if($item != ''){
            $deleted = $system->deleteConstant($item);
            if(!$deleted){
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
            return response()->json(['status' => true , 'data' => 'تم الحذف بنجاح']);
        }else{
            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
        }

    }
/****************************************************************************************************************************************** */

}
