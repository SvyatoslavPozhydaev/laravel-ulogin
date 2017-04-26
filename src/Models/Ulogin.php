<?php
namespace Ulogin\Modulse\Models;

use Illuminate\Database\Eloquent\Model;

class ULogin extends Model
{
    protected $table = 'u_login';
    protected $fillable = [
        'last_name' , 'first_name' , 'profile' , 'uid' , 'identity' , 'network'
    ];
}