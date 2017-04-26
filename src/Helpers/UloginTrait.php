<?php
namespace Ulogin\Modulse\Helpers;

use Ulogin\Modulse\Models\ULogin;

trait UloginTrait {

    public function ulogin()
    {
        return ULogin::selectRaw('u_login.*')
            ->join('user_u_login','user_u_login.u_login_id','=','u_login.id')
            ->where('user_u_login.user_id',$this->id)->first();
    }
}