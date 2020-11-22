<?php

namespace App\Http\Controllers\Admin;

use App\Models\UploadsCenter as MyModel;
use Illuminate\Http\Request;
use App\Models\System_Constants;
// use Spatie\Permission\Models\Permission;
// use App\Models\User_Permission;
// use App\Models\Permission;
use DB;

class UploadsController extends AdminController
{   

    public function __construct()
    {
    }

    public function getCategory(){
        $data['category'] = System_Constants::where('type','category_upload')->select('name_ar as name','value as id')->paginate(15);
        return view('admin.uploads.table_category', compact('data'))->render();
    }

    public function addCategory(Request $request){
        $category = $request->get('category');
        if($category == ''){
            return response()->json(['status' => false , 'data' => 'حقل القسم مطلوب' ]);
        }
        $s = new System_Constants();
        $saved = $s->addconstant($category,'category_upload',1);
        if(!$saved){
            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية' ]);
        }
        return response()->json(['status' => true, 'data' => 'تمت العملية بنجاح']);
    }

    public function deleteCategory(Request $request){
        $id = $request->get('id');
        $s = new System_Constants();
        $obj = $s->getconstant($id);
        if($obj){
            $deleted = $s->deleteConstant($obj);
            if(!$deleted){
                return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية' ]);
            }
            return response()->json(['status' => true, 'data' => 'تمت العملية بنجاح']);
        }
        return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية' ]);
    }

    public function getSelectCategory(){
        $data['category'] = System_Constants::where('type','category_upload')->select('name_ar as name','value as id')->get();
        $select = '<option value="">القسم</option>';
        if($data['category'] and count($data['category']) > 0){
            foreach($data['category'] as $category){
                $select .= '<option value="'.$category->id.'">'.$category->name.'</option>';
            }
        }
        return response()->json(['status' => true, 'data' => $select]);
    }


    public function upload_file(Request $request){
        $title = $request->get('title');
        $category = $request->get('category');
        $file = $request->file('file');

        $rules = [
            'title' => 'required',
            'category' => 'required',
            'file' => 'required|mimes:pdf,xls,xlsx,doc',
        ];

        $messages = [
            'title.required' => 'العنوان مطلوب',
            'category.required' => 'القسم مطلوب',
            'file.required' => 'الملف مطلوب',
            'file.mimes' => 'يجب أن تكون صيغة الملف pdf,xls,xlsx,doc',
        ];

        $validator = \Validator::make([
            'title' => $title,
            'category' => $category,
            'file' => $file,
        ],
            $rules
            ,
            $messages
        );
    
        if ($validator->fails()) {
            return response()->json(['status' => false , 'data_validator' => $validator->messages() ]);
        }

        $files_doc = '';
        if($request->hasFile('file') && $file->isValid())
        {
            $files_doc = 'file_'.strtotime(date("Y-m-d H:i:s")) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $files_doc);
        }

        $u = new MyModel();
        $saved = $u->addUpload($title,2,$files_doc,$category);
        if(!$saved){
            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية' ]);
        }
        return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح' ]);

    }

    public function getFile(Request $request){
        $type = $request->get('type');
        $u = new MyModel();
        $data['uploaded_file'] = $u->getFile($type);
        if($type == 1){
            return view('admin.uploads.table_upload_image', compact('data'))->render();
        }else{
            return view('admin.uploads.table_upload_file', compact('data'))->render();
        }
    }

    public function upload_image(Request $request){
        $title = $request->get('title');
        $category = $request->get('category');
        $image = $request->file('image');

        $rules = [
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif',
        ];

        $messages = [
            'title.required' => 'العنوان مطلوب',
            'category.required' => 'القسم مطلوب',
            'image.required' => 'الصورة مطلوبة',
            'image.mimes' => 'يجب أن تكون صيغة الصورة png,jpg,jpeg,gif',
        ];

        $validator = \Validator::make([
            'title' => $title,
            'category' => $category,
            'image' => $image,
        ],
            $rules
            ,
            $messages
        );
    
        if ($validator->fails()) {
            return response()->json(['status' => false , 'data_validator' => $validator->messages() ]);
        }

        $img = '';
        if($request->hasFile('image') && $image->isValid())
        {
            $img = 'img_'.strtotime(date("Y-m-d H:i:s")) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $img);
        }

        $u = new MyModel();
        $saved = $u->addUpload($title,1,$img,$category);
        if(!$saved){
            return response()->json(['status' => false , 'data' => 'حدث خطأ أثناء العملية' ]);
        }
        return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح' ]);

    }

    public function search(Request $request){
        $title = $request->get('title');
        $category = $request->get('category');
        $type = $request->get('type');
        $u = new MyModel();
        $data['search'] = $u->search($title,$category,$type);
        if($type == 1){
            return view('admin.uploads.table_image_search', compact('data'))->render();
        }else{
            return view('admin.uploads.table_file_search', compact('data'))->render();
        }
    }

    public function getLink(Request $request){
        $title = $request->get('title');
        $category = $request->get('category');
        $url = $request->get('url');

        $rules = [
            'title' => 'required',
            'category' => 'required',
            'url' => 'required',
        ];

        $messages = [
            'title.required' => 'العنوان مطلوب',
            'category.required' => 'القسم مطلوب',
            'url.required' => 'الرابط مطلوبة',
        ];

        $validator = \Validator::make([
            'title' => $title,
            'category' => $category,
            'url' => $url,
        ],
            $rules
            ,
            $messages
        );
    
        if ($validator->fails()) {
            return response()->json(['status' => false , 'data_validator' => $validator->messages() ]);
        }
        
        $contents = file_get_contents($url);
        $file = substr($url, strrpos($url, '/') + 1);
        $arr = explode('.',$file);
        if($arr['1']){
            $ext = strtolower($arr['1']);
            if($ext != 'png' and $ext != 'jpg' and $ext != 'jpeg' and $ext != 'gif'){
                return response()->json(['status' => false , 'data' => 'الرجاء التأكد من صيغة الصورة' ]);
            }
            $file = $arr['0'].time().'.'.$arr['1'];
            \Storage::disk('uploads')->put($file, $contents);
            $u = new MyModel();
            $data['uploaded_file'] = $u->addUpload($title,1,$file,$category);
            if($data['uploaded_file']){
                $view = view('admin.uploads.table_url_image', compact('data'))->render();
                return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح' ,'view' => $view]);
            }else{
                
            }
        }else{
            return response()->json(['status' => false , 'data' => 'عذرا ، حدث خطأ أثناء العملية' ]);
        }
    }

    public function deleteUpload(Request $request){
        $id = $request->get('id');
        $item = MyModel::find($id);
        if($item == ''){
            return response()->json(['status' => false , 'data' => 'عذرا ، حدث خطأ أثناء العملية' ]);
        }else{
            $deleted = $item->delete();
            if($deleted){
                return response()->json(['status' => true , 'data' => 'تمت العملية الحذف']);
            }
            return response()->json(['status' => false , 'data' => 'عذرا ، حدث خطأ أثناء العملية' ]);
        }

    }

    public function update_category(Request $request){
        $id = $request->get('id');
        $category = $request->get('category');
        if($category == ''){
            return response()->json(['status' => false , 'data' => 'القسم مطلوب' ]);
        }
        $category_upload = System_Constants::where('value',$id)->where('type','category_upload')->first();
        if($category_upload == ''){
            return response()->json(['status' => false , 'data' => 'عذرا ، حدث خطأ أثناء العملية' ]);
        }else{
            $category_upload->name_ar =  $category;
            $saved = $category_upload->save();
            if($saved){
                return response()->json(['status' => true , 'data' => 'تمت العملية بنجاح']);
            }
            return response()->json(['status' => false , 'data' => 'عذرا ، حدث خطأ أثناء العملية' ]);
        }
    }
  
}