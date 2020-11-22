<?php

namespace App\Http\Controllers\Admin;
use App\Models\Business as MyModel;

use App\Http\Controllers\Controller;
use App\Models\System_Constants;
use Illuminate\Http\Request;

class BusinessController extends AdminController

{
    public function __construct()

    {

       
    }
    
    public function index(Request $request)

    {

     
        $data['static'] = MyModel::leftJoin('system_constants as s', function($join) {
            $join->on('business.cat', '=', 's.value')->where('s.type','category')->whereNull('s.deleted_at');
        })->select(['business.title','business.photo','business.id','s.name_ar as catt','business.cat','business.status','business.index_show'])->orderBy('id','desc')->paginate(15);
        $data['cat']=System_Constants::where('status',1)->where('type','category')->select("value as id","name_ar as name")->get();

        if ($request->ajax()) {

            return view('admin.business.table-data', compact('data'))->render();

        }

        return view('admin.business.index',compact('data'));

    }

  /***********************************************************************************************************************/

    public function add(Request $request){


        $hidden = $request->get('hidden');

        if($hidden == 0){

            $user_id = \Auth::user()->id;

            $title = $request->get('title');

            $cat = $request->get('cat');

            if(isset($request['activeValue'])){
                $status = 1;  
            }else{
                $status = 2;  
            }
            
            if(isset($request['index'])){
                $index = 1;  
            }else{
                $index = 2;  
            }
            
            
            $file = $request->file('image');

            $url = $request->get('url');

            $rules = [

                'title' => 'required',

                'cat' => 'required',

                'image' => 'required',


            ];

            $validator = \Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return response()->json(['status' => false , 'data' => $validator->errors()]);
            }

            $pic = '';
            if ($request->hasFile('image') && $file->isValid())
            {
                $pic = 'pic_' . strtotime(date("Y-m-d H:i:s")) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $pic);
            }

        
            $item = new MyModel();

            $item->user_id = $user_id;

            $item->title = $title;

            $item->cat = $cat;
            if($url){
                $item->url = $url;
            }
            if($index){
                $item->index_show = $index;
            }
            
            $item->status = $status;

            $item->photo = $pic;

            $saved = $item->save();

            if (!$saved) {

                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء عملية الإضافة']);

            }
           
           
                return response()->json(['status' => true , 'data' => 'تم  العملية بنجاح']);

      

        }else{

            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء عملية الإضافة']);

        }

        



    }

/***********************************************************************************************************************/

    public function edit(Request $request){

        // $userhasper = \Auth::user();

        // $true = $userhasper->hasPermissionTo('edit_page');

        // if(!$true){

        //     return __('lang.no_permission');

        // }

        $id = $request->get('id');

            $item = MyModel::where('id',$id)->first();

            if($item != ''){

                return response()->json(['status' => true , 'data' => $item]);

            }else{

                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);

            }

    }



    public function Updateshow(Request $request){

        // $userhasper = \Auth::user();

        // $true = $userhasper->hasPermissionTo('status_page');

        // if(!$true){

        //     return __('lang.no_permission');

        // }

        $id = $request->get('id');

        $item = MyModel::find($id);

            if($item != ''){

                if($item->index_show == 0){

                    $item->index_show = 1;

                }else{

                    $item->index_show = 0;

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

    /***********************************************************************************************************************/
    


    public function UpdateStats(Request $request){

        // $userhasper = \Auth::user();

        // $true = $userhasper->hasPermissionTo('status_page');

        // if(!$true){

        //     return __('lang.no_permission');

        // }

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

/***********************************************************************************************************************/

    public function update(Request $request){

        // $userhasper = \Auth::user();

        // $true = $userhasper->hasPermissionTo('edit_page');

        // if(!$true){

        //     return __('lang.no_permission');

        // }
// return $request;
        $hidden = $request->get('hidden');



        if($hidden != 0){

            $user_id = \Auth::user()->id;

            $title = $request->get('title');

            $cat = $request->get('cat');

            $url = $request->get('url');

            $file = $request->file('image');

            if(isset($request['activeValue'])){
                $status = 1;  
            }else{
                $status = 2;  
            }
            
            if(isset($request['index'])){
                $index = 1;  
            }else{
                $index = 2;  
            }
            

            $rules = [

                'title' => 'required',

                'cat' => 'required',

                // 'slug' => 'required|regex:/^[a-z0-9_]+(?:-[a-z0-9]+)*$/',

            ];

    

            $validator = \Validator::make($request->all(),$rules);

    

            if ($validator->fails()) {

                return response()->json(['status' => false , 'data' =>$validator->errors()]);

            }

            $pic = '';

            if ($request->hasFile('image') && $file->isValid())

            {

                $pic = 'pic_' . strtotime(date("Y-m-d H:i:s")) . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('uploads'), $pic);

            }

            

    
            $item = MyModel::find($hidden); 

            if($item != ''){

                $item->user_id= $user_id ;

                $item->title = $title;

                $item->cat = $cat;

                if($url){
                    $item->url = $url;
                }
    
                if($file != ''){

                    $item->photo = $pic;

                }
                if($index){
                    $item->index_show = $index;
                }
                // $item->user_id = $userhasper ;


                $saved = $item->save();

                if(!$saved){

                    return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);

                }

               
                return response()->json(['status' => true , 'data' => 'تم تعديل الحالة']);




                    }else{

                        return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);

                    }
          

        }else{

            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);

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
