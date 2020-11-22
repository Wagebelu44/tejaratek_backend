<?php

namespace App\Http\Controllers\Admin;

use App\Models\Social as MyModel;
use Illuminate\Http\Request;


class SocialLinksController extends AdminController
{
    public function __construct()
    {
        // parent::__construct();
        // $this->middleware(['permission:setting|edit_setting']);

    }
    //////////////////////////////////////////////
    public function index(Request $request)
    {
       
        $data['social'] = MyModel::paginate(15);
        if ($request->ajax()) {
            return view('admin.social.table-data', compact('data'))->render();
        }
        return view('admin.social.index',compact('data'));
    }
/***********************************************************************************************************************/
    public function add(Request $request){
           
            $url = $request->get('url');
            $social = $request->get('social');
            $status = $request->get('activeValue') == 'on' ? 1 : 0;

            $rules = [
                'url' => 'required',
                'social' => 'required',
            ];
    
            $validator = \Validator::make([
                'url' => $url,
                'social' => $social,
            ],
                $rules
             
            );
    
            if ($validator->fails()) {
                return response()->json(['status' => false , 'data' => 'جميع الحقول مطلوبة']);
            }

            $item = new MyModel();
            if($item != ''){
                $item->url = $url;
                $item->social = $social;
                $item->status = $status;
                $item->user_id = \Auth::user()->id;
                $saved = $item->save();
                if(!$saved){
                    return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
                }
                return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح']);
            }else{
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
            }

        }

        public function edit(Request $request){
            
                $id = $request->get('id');
                $item = MyModel::find($id);
                if($item != ''){
                    return response()->json(['status' => true , 'data' => $item]);
                }else{
                    return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
                }
        }


        public function UpdateStats(Request $request){
          
            $id = $request->get('id');
            $item = MyModel::find($id);
                if($item != ''){
                    if($item->status == 0){
                        $item->status = 1;
                    }else{
                        $item->status = 0;
                    }
                    $saved = $item->save();
                    if(!$saved){
                        return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
                    }
                    return response()->json(['status' => true , 'data' => 'تم تعديل الحالة']);
                }else{
                    return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);
                }
        }


        public function update(Request $request){
           
            $hidden = $request->get('hidden');
    
            if($hidden != 0){
                $url = $request->get('url');
                $social = $request->get('social');
                $status = $request->get('activeValue') == 'on' ? 1 : 0;
    
                $rules = [
                    'url' => 'required',
                    'social' => 'required',
                ];
        
                $validator = \Validator::make([
                    'url' => $url,
                    'social' => $social,
                ],
                    $rules
                 
                );
        
                if ($validator->fails()) {
                    return response()->json(['status' => false , 'message' => 'جميع الحقول مطلوبة']);
                }
               
    
                $item = MyModel::find($hidden); 
                if($item != ''){
                    $item->url = $url;
                    $item->social = $social;
                    $item->status = $status;
                    $item->user_id = \Auth::user()->id;
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

