<?php



namespace App\Http\Controllers\Admin;



use App\Models\Products as MyModel;

use App\Models\Partners;
use App\Models\ServiceItems;
use App\Models\StaticPage;
use App\Models\System_Constants;

use Illuminate\Http\Request;





class ProductsController extends AdminController

{

    public function __construct()

    {

    }

    //////////////////////////////////////////////

    public function index(Request $request)

    {

        $data['static'] = MyModel::orderBy('id','desc')->paginate(15);
        if ($request->ajax()) {
            return view('admin.products.table-data', compact('data'))->render();
        }

        return view('admin.products.index',compact('data'));

    }

  /***********************************************************************************************************************/

    public function add(Request $request){

    //    return $request;

        $hidden = $request->get('hidden');

        if($hidden == 0){

            $user_id = \Auth::user()->id;

            $title = $request->get('title');

            $details = $request->get('details');

            if(isset($request['activeValue'])){
                $status = 1;
            }else{
                $status = 0;
            }

            $file = $request->file('image');


            $rules = [

                'title' => 'required',

                'details' => 'required',

                // 'slug' => 'required|unique:static_pages,slug|regex:/^[a-z0-9_]+(?:-[a-z0-9]+)*$/',

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

            \DB::beginTransaction();
            try {

            $item = new MyModel();

            $item->user_id = $user_id;

            $item->title = $title;

            $item->details = $details;


            $item->status = $status;

            $item->photo = $pic;


            $saved = $item->save();
            if (!$saved) {

                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء عملية الإضافة']);

            }

            \DB::commit();
            return response()->json(['status' => true, 'data' => trans('lang.success')]);
        } catch (\Exception $e) {
            \DB::rollback();
        }

        }else{

            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء عملية الإضافة']);

        }

        



    }

/***********************************************************************************************************************/

    public function edit(Request $request){


        $id = $request->get('id');
        $item = MyModel::where('id',$id)->first();
            if($item != ''){
                return response()->json(['status' => true , 'data' => $item]);

            }else{

                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);

            }

    }



    /***********************************************************************************************************************/



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

/***********************************************************************************************************************/

    public function update(Request $request){

        
        $hidden = $request->get('hidden');



        if($hidden != 0){

            $user_id = \Auth::user()->id;

            $title = $request->get('title');

            $details = $request->get('details');

            if(isset($request['activeValue'])){
                $status = 1;
            }else{
                $status = 0;
            }

            $file = $request->file('image');

            $terms_all =$request->get('terms_all');


            $rules = [

                'title' => 'required',

                'details' => 'required',

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

            \DB::beginTransaction();
            try {

    
            $item = MyModel::find($hidden); 

            if($item != ''){

                $item->user_id= $user_id ;

                $item->title = $title;

                $item->details = $details;

                $item->status = $status;

                if($file != ''){

                    $item->photo = $pic;

                }

                $saved = $item->save();

                if(!$saved){

                    return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);

                }

                    }else{

                        return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية']);

                    }
                \DB::commit();
                return response()->json(['status' => true, 'data' => trans('lang.success')]);
            } catch (\Exception $e) {
                \DB::rollback();
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