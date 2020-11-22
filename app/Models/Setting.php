<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Setting extends Model
{
    use SoftDeletes;
    protected $table = 'settings';
    protected $fillable = ['name_ar','email','mobile','logo','user_id','description','location','from','to','lat','lon','profile','whatsapp_no'];

    public function getsetting($id){
        return $this->find($id);
    }

    public static function getSettingByName($name){
        return static::select($name)->first()[$name];
    }

    public function setting($obj,$title_ar,$email,$mobile1,$description,$location){
        $obj->name_ar = $title_ar;
        $obj->description = $description;
        $obj->email = $email;
        $obj->mobile = $mobile1;
        $obj->location = $location;
        $obj->save();
        return $obj;       
    }

}