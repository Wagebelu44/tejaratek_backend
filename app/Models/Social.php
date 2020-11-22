<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Social extends Model
{
    protected $table = 'social';
    protected $fillable = ['social','user_id','status','url'];

    public function partner(){
        return $this->belongsTo(Partners::class,'partner_id','id');
    }
}
