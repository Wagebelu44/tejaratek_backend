<?php

namespace App\Http\Controllers\Admin;

use App\Models\Statistics as MyModel;
use Illuminate\Http\Request;


class StatisticsController extends AdminController
{
    public function __construct()
    {
        // parent::__construct();
        // $this->middleware(['permission:static_page|view_page|edit_page|delete_page|add_page|status_page']);
    }
    //////////////////////////////////////////////
    public function index(Request $request)
    {
        $userhasper = \Auth::user();
        $true = $userhasper->hasPermissionTo('view_statistics');
        if(!$true){
            return 'عذرا ليس لديك صلاحية';
        }
        
        $data['statistics'] = MyModel::orderBy('id','desc')->paginate(8);
        if ($request->ajax()) {
            return view('admin.statistics.table-data', compact('data'))->render();
        }
        return view('admin.statistics.index',compact('data'));
    }
  /***********************************************************************************************************************/
    public function add(Request $request){
        $userhasper = \Auth::user();
        $true = $userhasper->hasPermissionTo('add_statistics');
        if(!$true){
            return 'عذرا ليس لديك صلاحية';
        }
        $hidden = $request->get('hidden');
        if($hidden == 0){
            $user_id = \Auth::user()->id;
            $name = $request->get('name');
            $number = $request->get('number');

            $rules = [
                'name' => 'required',
                'number' => 'required',
            ];
        
            $validator = \Validator::make([
                'name' => $name,
                'number' => $number,
            ],
                $rules
              
            );
    
            if ($validator->fails()) {
                return response()->json(['status' => false , 'data' => 'جميع الحقول مطلوبة']);
            }
    
            $item = new MyModel();
            $item->user_id = $user_id;
            $item->name = $name;
            $item->number = $number;
    
            $saved = $item->save();
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
        $userhasper = \Auth::user();
        $true = $userhasper->hasPermissionTo('edit_statistics');
        if(!$true){
            return 'عذرا ليس لديك صلاحية';
        }
        $id = $request->get('id');
            $item = MyModel::find($id);
            if($item != ''){
                return response()->json(['status' => true , 'data' => $item]);
            }else{
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
    }

/***********************************************************************************************************************/
    public function update(Request $request){
        $userhasper = \Auth::user();
        $true = $userhasper->hasPermissionTo('edit_statistics');
        if(!$true){
            return 'عذرا ليس لديك صلاحية';
        }
        $hidden = $request->get('hidden');

        if($hidden != 0){
            $user_id = \Auth::user()->id;
            $name = $request->get('name');
            $number = $request->get('number');
            $partner_id = $request->get('partner_id');

            $rules = [
                'name' => 'required',
                'number' => 'required',
            ];
    
            $validator = \Validator::make([
                'name' => $name,
                'number' => $number,
            ],
                $rules
     
            );
    
            if ($validator->fails()) {
                return response()->json(['status' => false , 'data' => 'جميع الحقول مطلوبة']);
            }

            $item = MyModel::find($hidden); 
            if($item != ''){
                $item->user_id = $user_id;
                $item->name = $name;
                $item->number = $number;
                $saved = $item->save();
                if(!$saved){
                    return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
                }
                return response()->json(['status' => true , 'data' => 'تم تعديل البيانات']);
            }else{
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }

        }
    }

    public function delete(Request $request){
        $userhasper = \Auth::user();
        $true = $userhasper->hasPermissionTo('delete_statistics');
        if(!$true){
            return 'عذرا ليس لديك صلاحية';
        }
        $id = $request->get('id');
        $item = MyModel::find($id);
        if($item != ''){
            $deleted = $item->delete();
            if(!$deleted){
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }
            return response()->json(['status' => true , 'data' => 'تم الحذف بنجاح']);
        }else{
            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
        }

    }
}