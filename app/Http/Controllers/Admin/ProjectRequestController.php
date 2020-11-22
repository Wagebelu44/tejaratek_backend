<?php

namespace App\Http\Controllers\Admin;

use App\Models\Messages as MyModel;
use Illuminate\Http\Request;
use App\Mail\send_reply;
use App\Models\Setting;

class ProjectRequestController extends AdminController
{
    public function __construct()
    {
        // parent::__construct();
        // $this->middleware(['permission:contact|view_contact|reply_contact']);
    }
    //////////////////////////////////////////////
    public function index(Request $request)
    {
     
        $name  = $request->get('name');
        $data['message'] =  MyModel::with('curr')->select(['messages.id','messages.name','messages.email','messages.details','messages.mobile','amount','name_project','currency','created_at']);
        
        if($name != ''){
            $data['message'] = $data['message']->where('messages.name', 'like', '%' .  $name . '%');
        }
        $data['message'] = $data['message']->where('type',2)->orderBy('id','desc')->paginate(15);

        if ($request->ajax()) {
            return view('admin.project_request.table-data', compact('data'))->render();
        }
        return view('admin.project_request.index',compact('data'));
    }
  /***********************************************************************************************************************/
 
public function delete(Request $request,$id){

    $userhasper = \Auth::user();

 

    $item = MyModel::where('id',$id)->first();

    if($item != ''){

        $item->delete();

        return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح']);

    }else{

        return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);

    }



}

 
}