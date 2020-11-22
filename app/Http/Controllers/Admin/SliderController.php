<?php



namespace App\Http\Controllers\Admin;



use App\Models\Slider as MyModel;

use App\Models\System_Constants;

use Illuminate\Http\Request;

use Lang;



class SliderController extends AdminController

{

    public function __construct()

    {

        parent::__construct();
    }

    //////////////////////////////////////////////

    public function index(Request $request)
    {
        $data['slider'] = MyModel::orderBy('id','desc')->select('id',"title",'status','image')->paginate(8);
        if ($request->ajax()) {
            return view('admin.slider.table-data', compact('data'))->render();
        }
        return view('admin.slider.index',compact('data'));
    }

  /***********************************************************************************************************************/

    public function add(Request $request){
        $userhasper = \Auth::user();
        $hidden = $request->get('hidden');
        if($hidden == 0){
            $user_id = \Auth::user()->id;
            if(isset($request['status'])){
                $status = 1;
            }else{
                $status = 0;
            }
            $file = $request->file('image');
            $title = $request->get('title');
            $details = $request->get('details');

            $rules = [

                'title' => 'required',

                'details' => 'required',

                'image' => 'required',
            ];

    
            $messages = [
                'title.required' => 'العنوان   مطلوب',
                'details.required' => ' التفاصيل مطلوبة',
                'image.required' => "الصورة مطلوبة",

            ];
    
            $validator = \Validator::make([
                'title' => $title,
                'details' => $details,
                'image' => $file,
            ],
                $rules
                ,
                $messages
            );

            

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

            $item->image = $pic;

            $item->status = $status;

            $item->title = $title;
        
            $item->details = $details;
            $saved = $item->save();

        if (!$saved) {

            return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);

        }

            return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح']);

        }else{

            return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);

        }


    }

/***********************************************************************************************************************/

    public function edit(Request $request){

        $userhasper = \Auth::user();
        // $true = $userhasper->hasPermissionTo('update_slider');
        // if(!$true){
        //     return __('lang.no_permission');
        // }
        $id = $request->get('id');
            $item = MyModel::find($id);
            if($item != ''){
                return response()->json(['status' => true , 'data' => $item]);
            }else{
                return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);
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

            if (!$saved) {

                return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);

            }

                return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح']);

            }else{

                return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);

            }

    }

/***********************************************************************************************************************/

    public function update(Request $request){

        $userhasper = \Auth::user();


        $hidden = $request->get('hidden');



        if($hidden != 0){

            $user_id = \Auth::user()->id;

            // $status = $request->get('status') ? 1 : 0;

            $file = $request->file('image');

            $title = $request->get('title');

            $details = $request->get('details');

            if(isset($request['status'])){
                $status = 1;
            }else{
                $status = 0;
            }



            $rules = [

                'title' => 'nullable',

                'details' => 'nullable',

            ];

    

            $validator = \Validator::make([

                'title' => $title,

                'details' => $details,

            ],

                $rules

              

            );

            

            if ($validator->fails()) {

                return response()->json(['status' => false , 'data' => trans("lang.required")]);

            }


            $pic = '';

            if ($request->hasFile('image') && $file->isValid())

            {

                $pic = 'pic_' . strtotime(date("Y-m-d H:i:s")) . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('uploads'), $pic);

            }



            $item = MyModel::find($hidden); 

            if($item != ''){

                if($pic != ''){

                    $item->image = $pic;

                }
                
                $item->title = $title;
                $item->status = $status;

                $item->details = $details;
                
                $saved = $item->save();

                if (!$saved) {

                    return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);

                }

                    return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح']);

                }else{

                    return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);

                }



        }

    }



    public function delete(Request $request,$id){


        $item = MyModel::where('id',$id)->first();

        if($item != ''){

            $item->delete();

            return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح']);

        }else{

            return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);

        }



    }

}