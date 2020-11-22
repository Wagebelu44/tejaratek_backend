<?php



namespace App\Http\Controllers\Admin;



use App\Models\StaticPage as MyModel;

use App\Models\Partners;
use App\Models\StaticPage;
use App\Models\System_Constants;

use Illuminate\Http\Request;





class StaticPageController extends AdminController

{

    public function __construct()

    {

        // parent::__construct();

        // $this->middleware(['permission:static_page|view_page|edit_page|delete_page|add_page|status_page']);

    }

    //////////////////////////////////////////////

    public function index(Request $request)

    {

     

        $data['static'] = MyModel::orderBy('id','desc')->paginate(15);

        if ($request->ajax()) {

            return view('admin.static_page.table-data', compact('data'))->render();

        }

        return view('admin.static_page.index',compact('data'));

    }

  /***********************************************************************************************************************/

    public function add(Request $request){

       

        $hidden = $request->get('hidden');

        if($hidden == 0){

            $user_id = \Auth::user()->id;

            $title = $request->get('title');

            $slug = $request->get('slug');

            $details = $request->get('details');

            $status = $request->get('activeValue') == 'on' ? 1 : 0;

            $file = $request->file('image');



            $rules = [

                'title' => 'required',

                'details' => 'required',

                'slug' => 'required|unique:static_pages,slug|regex:/^[a-z0-9_]+(?:-[a-z0-9]+)*$/',

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

    

            $item = new StaticPage();

            $item->user_id = $user_id;

            $item->title = $title;

            $item->details = $details;

            $item->slug = $slug;

            $item->delete_flag = 1;

            $item->status = $status;

            $item->photo = $pic;

    

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

        // $userhasper = \Auth::user();

        // $true = $userhasper->hasPermissionTo('edit_page');

        // if(!$true){

        //     return __('lang.no_permission');

        // }

        $id = $request->get('id');

            $item = MyModel::find($id);

            if($item != ''){

                return response()->json(['status' => true , 'data' => $item]);

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

        $hidden = $request->get('hidden');



        if($hidden != 0){

            $user_id = \Auth::user()->id;

            $title = $request->get('title');

            $details = $request->get('details');

            $slug = $request->get('slug');

            $file = $request->file('image');



            $rules = [

                'title' => 'required',

                'details' => 'required',

                'slug' => 'required|regex:/^[a-z0-9_]+(?:-[a-z0-9]+)*$/',

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

                $item->user_id = $user_id;

                $item->title = $title;

                $item->details = $details;

                $item->slug = $slug;

                $item->delete_flag = 1;

                if($file != ''){

                    $item->photo = $pic;

                }

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

        // $userhasper = \Auth::user();

        // $true = $userhasper->hasPermissionTo('delete_page');

        // if(!$true){

        //     return __('lang.no_permission');

        // }

        $id = $request->get('id');

        $item = MyModel::find($id);

        if($item != ''){

            if($item->delete_flag == 1){

                return response()->json(['status' => false , 'data' => 'لا يمكن حذف العنصر']);

            }

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