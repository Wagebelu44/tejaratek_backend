<?php

namespace App\Http\Controllers\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Messages;
use App\Models\Albums;
use App\Models\Setting;
use Carbon\Carbon;
use App\Mail\ContactUs;
use App\Models\Business;
use App\Models\Statistics;
use App\Models\OurClients;
use App\Models\Products;
use App\Models\Plan;
use App\Models\Service;
use App\Models\Slider;
use App\Models\StaticPage;
use App\Models\System_Constants;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Storage;

class HomeController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function index(){
        $data['slider'] = Slider::where('status',1)->orderBy('id','desc')->first(['title','details','image']);
        $data['statistics_st'] = StaticPage::where('status',1)->where('slug','statistics')->first(['id','title','details']);
        $data['statistics'] = Statistics::get(['id','name','number']);
        $data['products_st'] = StaticPage::where('status',1)->where('slug','products')->first(['id','title','details']);
        $data['products'] = Products::where('status',1)->orderBy('id','desc')->take(8)->get(['id','title','photo','details']);
        $data['service'] = Service::where('status',1)->orderBy('id','asc')->get();
        $data['service_t'] = StaticPage::where('status',1)->where('slug','service')->first(['id','title','details']);
        $data['business'] = StaticPage::where('status',1)->where('slug','business')->first(['id','title','details']);
        $data['category']=Business::where('status',1)->where('index_show',1)->take(6)->get(['id','title','photo','cat','url']);
        $data['clients'] = StaticPage::where('status',1)->where('slug','clients')->first(['id','title','details']);
        $data['our_clients'] = OurClients::where('status',1)->orderBy('id','desc')->select('image','url')->get();
        $data['request_projects'] = StaticPage::where('status',1)->where('slug','request_projects')->first();
        $data['project'] = StaticPage::where('status',1)->where('slug','project')->first(['id','title','details']);
        $data['currency'] = System_Constants::where('type','currency')->get(['value as id','name_ar as name']);

        return view('site.index',compact(['data','setting']));
    }

    public function contacts(Request $request){
        // return $request;
        $name = $request->get('name');
        $email = $request->get('email');
        $mobile = $request->get('mobile');
        $details = $request->get('details');
        

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'details' => 'required',
        ];

        $messages = [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الالكتروني مطلوب',
            'mobile.required' => 'رقم الجوال مطلوب',
            'details.required' => 'التفاصيل مطلوبة',
        ];

        $validator = \Validator::make([
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'details' => $details,
        ],
            $rules
            ,
            $messages
        );

        if ($validator->fails()) {
            return response()->json(['status' => false , 'data' =>'جميع الحقول مطلوبة']);

        }

        // $data = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LcPvxATAAAAAKLsvWmP1A3D2Bx9zRMSuB_-f_tj&response=' . $_POST['g-recaptcha-response']);
        // $data = json_decode($data);
        // if($data->success){
            $message = new Messages();
            $message->name = $name;
            $message->email = $email;
            $message->mobile = $mobile;
            $message->details = $details;
            $message->type = 1;
            $saved = $message->save();
            if(!$saved){
                    return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);
            }

            $setting = Setting::where('id',1)->first('email');
            if($setting != ''){
                \Mail::to($setting->email)->send(new ContactUs($request));
            }
            
            return response()->json(['status' => true , 'data' => 'تمت الإرسال بنجاح']);

        // }else{
        //     $request->session()->flash('danger', 'الرجاء إدخال التحقق');
        //     return redirect('/contactus')->withInput();
       
        
    }

    public function contactus(){
        $data['contact'] = StaticPage::where('slug','contact')->first();
        $data['setting'] = \App\Models\Setting::where('id',1)->first();
        return view('site.‏‏contact',compact(['data']));
    }
    
   
    public function about(){
        $data['about'] = StaticPage::where('status',1)->where('slug','about')->first();
        $setting = \App\Models\Setting::where('id',1)->first();
        return view('site.about',compact(['data','setting']));
    }
    

    public function project_request(Request $request){
        // return $request;
        $name = $request->get('name');
        $email = $request->get('email');
        // $mobile = $request->get('mobile');
        $details = $request->get('details');
        $name_project = $request->get('name_project');
        $currency = $request->get('currency');
        $amount = $request->get('amount');

        $rules = [
            'name' => 'required',
            'email' => 'required',
            // 'mobile' => 'required',
            'details' => 'required',
            'name_project' => 'required',
            'currency' => 'required',
            'amount' => 'required',
        ];

        $messages = [
            'name.required' => 'الاسم مطلوب',
            'email.required' => 'البريد الالكتروني مطلوب',
            // 'mobile.required' => 'رقم الجوال مطلوب',
            'details.required' => 'التفاصيل مطلوبة',
            'name_project.required' => 'اسم المشروع مطلوب',
            'currency.required' => 'العملة مطلوبة',
            'amount.required' => 'ميزانية المشروع مطلوبة',
        ];

        $validator = \Validator::make([
            'name' => $name,
            'email' => $email,
            // 'mobile' => $mobile,
            'details' => $details,
            'amount' => $amount,
            'currency' => $currency,
            'name_project' => $name_project,
        ],
            $rules
            ,
            $messages
        );

        if ($validator->fails()) {
            return response()->json(['status' => false , 'data' =>'جميع الحقول مطلوبة']);

        }

        // $data = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6LcPvxATAAAAAKLsvWmP1A3D2Bx9zRMSuB_-f_tj&response=' . $_POST['g-recaptcha-response']);
        // $data = json_decode($data);
        // if($data->success){
            $message = new Messages();
            $message->name = $name;
            $message->email = $email;
            // $message->mobile = $mobile;
            $message->details = $details;
            $message->amount = $amount;
            $message->currency = $currency;
            $message->name_project = $name_project;
            $message->type = 2;
            $saved = $message->save();
            if(!$saved){
                    return response()->json(['status' => false , 'data' => 'حدث خطأ في العملية']);
            }

            $setting = Setting::where('id',1)->first('email');
            if($setting != ''){
                \Mail::to($setting->email)->send(new ContactUs($request));
            }
            
            return response()->json(['status' => true , 'data' => 'تمت الإرسال بنجاح']);

        // }else{
        //     $request->session()->flash('danger', 'الرجاء إدخال التحقق');
        //     return redirect('/contactus')->withInput();
       
        
    }

    
  

}   