<?php
namespace Ulogin\Modulse\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Routing\Controller;
use Ulogin\Modulse\Request\ULoginRequest;
use Ulogin\Modulse\Models\ULogin;
use Ulogin\Modulse\Models\UserULogin;
use App\User;

class UloginController extends Controller
{

    public function uLoginFormShow(){
        return view('ulogin::confirm_form');
    }

    public function uLoginFormCallback(Request $request){
        $s = file_get_contents('http://ulogin.ru/token.php?token=' . $request->get('token') . '&host=' . $_SERVER['HTTP_HOST']);
        $user = json_decode($s, true);
        $uUser = ULogin::where('uid',$user['uid'])->where('network',$user['network'])->first();
        if(!$uUser){
            $request->session()->put('uLogin',$user);
            $request->session()->put('enter_email' , true );
            return redirect()->to(config('ulogin.confirm_form_uri'));
        }
        $oUser = UserULogin::where('u_login_id',$uUser->id)->first();
        if($oUser->user){
            Auth::login($oUser->user);
            return redirect('/');
        }
        dd('беда');
    }

    private function updateULoginTable(User $oUser){
        $uLogin = ULogin::where('uid',request()->session()->get('uLogin')['uid'])
            ->where('network',request()->session()->get('uLogin')['network'])->first();
        if (!$uLogin){
            $uLogin = ULogin::create(request()->session()->get('uLogin'));
            UserULogin::create([
                'user_id' => $oUser->id,
                'u_login_id' => $uLogin->id
            ]);
        }
    }

    public function UserSave(ULoginRequest $request){
        $oUser = User::where('email',$request->get('email'))->first();
        if($oUser){
            $this->updateULoginTable($oUser);
            $request->session()->pull('uLogin');
            $request->session()->pull('enter_email');
            Auth::login($oUser);
            return redirect('/');
        }
        $uLogin = ULogin::create($request->session()->get('uLogin'));
        $input['name'] = $uLogin->first_name . " " . $uLogin->last_name;
        foreach (config('ulogin.confirm_inputs') as $key => $value){
            $input[$key] = $request->get($key);
        }

        $input['u_login_id'] = $uLogin->id ;
        $input['password'] = bcrypt(config('section.default_password'));

        $oUser = User::create($input);


        $oUser->fill($input)->save();
        if($oUser){
            UserULogin::create(['user_id' => $oUser->id, 'u_login_id' => $uLogin->id]);
            $request->session()->pull('uLogin');
            $request->session()->pull('enter_email');
            Auth::login($oUser);

            return redirect('/');
        }
        dd('что то не то');
    }
}