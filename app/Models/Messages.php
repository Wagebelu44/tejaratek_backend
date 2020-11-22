<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messages extends Model
{

    use SoftDeletes;
    protected $table = 'messages';
    protected $fillable = ['user_id','name','email','mobile','details','user_id','responnse','read_at'];

    public function curr(){
        return $this->belongsTo(System_Constants::class,'currency','value')->where('type','currency')->select('value','name_ar');
    }
}