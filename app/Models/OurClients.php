<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurClients extends Model
{
    //
    use SoftDeletes;
    protected $table = 'ourclients';
    protected $fillable = ['id','image','user_id','status','title','url'];

}
