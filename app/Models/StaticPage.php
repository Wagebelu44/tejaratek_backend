<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class StaticPage extends Model
{
    use SoftDeletes;
    protected $table = 'static_pages';
    protected $fillable = ['photo','title','details','slug','user_id','delete_flag','status'];
}