<?php





namespace App\Models;





use Illuminate\Database\Eloquent\Model;


use Illuminate\Database\Eloquent\SoftDeletes;


class Slider extends Model


{


    use SoftDeletes;


    protected $table = 'slider';


    protected $fillable = ['photo','user_id','status','title_ar','details_ar','title_en','details_en','url','order_no'];





}


