<?php

namespace App\Http\Controllers\Admin;

use App\Models\Messages as MyModel;
use Illuminate\Http\Request;
use App\Mail\send_reply;
use App\Models\Setting;

class ContactUsController extends AdminController
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
        $data['message'] =  MyModel::select(['messages.id','messages.name','messages.email','messages.details','messages.mobile','messages.response','messages.read_at','messages.created_at']);
        
        if($name != ''){
            $data['message'] = $data['message']->where('messages.name', 'like', '%' .  $name . '%');
        }
        $data['message'] = $data['message']->where('type',1)->orderBy('id','desc')->paginate(15);

        if ($request->ajax()) {
            return view('admin.contact.table-data', compact('data'))->render();
        }
        return view('admin.contact.index',compact('data'));
    }
  /***********************************************************************************************************************/
    public function view(Request $request){
     
        $id = $request->get('id');
        $item = MyModel::where('id',$id)->first(['id','name','email','mobile','details']);
        if($item != ''){
            $item->read_at = date('Y-m-d H:i:s');
            $item->save();
            return response()->json(['status' => true , 'data' => $item]);
        }else{
            return response()->json(['status' => false , 'message' => 'حدث خطأ']);
        }
    }

    public function reply(Request $request){
        $setting = Setting::where('id',1)->first('email');
        $id = $request->get('sender_id');
        $response = $request->get('response');
        if($response == ''){
            return response()->json(['status' => false , 'message' => 'جميع الحقول مطلوبة']);
        }
        $item = MyModel::find($id);
        if($item != ''){
            $item->response = $response;
            $saved = $item->save();
            if(!$saved){
                return response()->json(['status' => false , 'message' => 'حدث خطأ أثناء العملية']);
            }
            \Mail::to($item->email)->send(new send_reply($request,$setting->email));
            return response()->json(['status' => true , 'message' => 'تم الرد بنجاح']);
        }else{
            return response()->json(['status' => false , 'message' => 'حدث خطأ']);
        }
    }
/***********************************************************************************************************************************/
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

public function export2(Request $request,$id)
{
//status,selling,wholesale,supplier,type_quantity,quantity,barcode,product_id,name  

    $data['product']= MyModel::where('id',$id)->select('name','email','mobile')->get();


   $i=1;
   $table=  chr(239) . chr(187) . chr(191);
   $table.='<table border="1">
   <thead>
   <tr style="text-align: center;font-size:16px;"><th colspan="4" style="background-color:#eee;">تواصل معنا</th></tr>
   <tr  style="font-size:16px;text-align: center;">
       <th >#</th>
       <th > اسم العميل</th>
       <th >  البريد الإلكتروني</th>
       <th > رقم الجوال</th>
       </tr>
   </thead>
   <tbody>';

   if(count($data['product'])>0){
    foreach($data['product'] as $e){

    if($e->status ==1 ){
        $s="مفعل";
    }else{
        $s="غير مفعل";
    }
      $row ="<tr style='font-size:16px;text-align: center;' >".
           "<td >". $i."</td>".
            "<td >". $e->name."</td>".
            "<td >". $e->email."</td>".
            "<td >". $e->mobile."</td>".

           "</tr>";
           ++$i;
           $table.=$row;
   }
}else{
    $table.= '<tr style="text-align: center;font-size:16px;"><th colspan="4" style="background-color:#eee;"> لا يوجد اي عملاء</th></tr>';

  }

  $table=$table .'</tbody></table>';

   return response($table)->withHeaders(["Content-Type"=>'application/vnd.ms-excel', "Content-Disposition"=> 'attachment; filename="كشف عميل التواصل معنا'.date('d_m_Y').'.xls"']);
}

public function export(Request $request)
{
//status,selling,wholesale,supplier,type_quantity,quantity,barcode,product_id,name  

    $data['product']= MyModel::select('name','email','mobile','id')->orderBy('id','desc')->get();


   $i=1;
   $table=  chr(239) . chr(187) . chr(191);
   $table.='<table border="1">
   <thead>
   <tr style="text-align: center;font-size:16px;"><th colspan="4" style="background-color:#eee;">تواصل معنا</th></tr>
   <tr  style="font-size:16px;text-align: center;">
       <th >#</th>
       <th > اسم العميل</th>
       <th >  البريد الإلكتروني</th>
       <th > رقم الجوال</th>
       </tr>
   </thead>
   <tbody>';

   if(count($data['product'])>0){
    foreach($data['product'] as $e){

    if($e->status ==1 ){
        $s="مفعل";
    }else{
        $s="غير مفعل";
    }
      $row ="<tr style='font-size:16px;text-align: center;' >".
           "<td >". $i."</td>".
            "<td >". $e->name."</td>".
            "<td >". $e->email."</td>".
            "<td >". $e->mobile."</td>".

           "</tr>";
           ++$i;
           $table.=$row;
   }
}else{
    $table.= '<tr style="text-align: center;font-size:16px;"><th colspan="4" style="background-color:#eee;"> لا يوجد اي عملاء</th></tr>';

  }

  $table=$table .'</tbody></table>';

   return response($table)->withHeaders(["Content-Type"=>'application/vnd.ms-excel', "Content-Disposition"=> 'attachment; filename="كشف عملاء التواصل معنا'.date('d_m_Y').'.xls"']);
}
     
}