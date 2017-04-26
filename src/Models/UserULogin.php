<?php
namespace Ulogin\Modulse\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserULogin extends Model
{
    protected $table = 'user_u_login';
    protected $fillable = ['user_id', 'u_login_id'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function uLogin(){
        return $this->belongsTo(ULogin::class,'id','u_login_id');
    }
}