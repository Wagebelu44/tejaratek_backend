<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','fullname','mobile','status','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function checkUser($type,$name,$id=''){
        if($type == 1){
            return $this->where('username',$name)->count();
        }else{
            return $this->where('username',$name)->where('id','!=',$id)->count();
        }
    }

    public function checkEmail($type,$email,$id=''){
        if($type == 1){
            return $this->where('email',$email)->count();
        }else{
            return $this->where('email',$email)->where('id','!=',$id)->count();
        }
    }

    public function getUsers($name){
        $users = $this->OrderBy('id','desc');
        if($name != ''){
            $users =  $users->where('email', $name)->orWhere('username', 'like', '%' .  $name . '%');
        }
        return $users = $users->paginate(8);
    }

    public function getUser($id){
        return $this->find($id);
    }


    public function addUser($name,$email,$mobile,$password,$status,$fullname){
        $this->username = $name;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->status = $status;
        $this->password = \Hash::make($password);
        $this->user_id = \Auth::user()->id;
        $this->save();
        return $this;
    }
  
    public function updateUser($obj,$name,$email,$mobile,$password,$status,$fullname){
        $obj->username = $name;
        $obj->fullname = $fullname;
        $obj->email = $email;
        $obj->mobile = $mobile;
        $obj->status = $status;
        if($password != ''){
            $obj->password = \Hash::make($password);
        }
        return $obj->save();
    }

    public function UpdateStatus($obj){
        if($obj->status == 0){
            $obj->status = 1;
        }else{
            $obj->status = 0;
        }
        return  $obj->save();
    }

    public function deleteUser($obj){
        return $obj->delete();
    }

    public function changePassword($obj,$password){
        $obj->password = \Hash::make($password);
        return $obj->save();
    }
    

}
