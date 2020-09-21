<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\SigninRequest;
use App\Models\User,
    Session, Hash;

class UserController extends SiteMainController
{

    public function signup(Request $request){

        $dtv =& self::$dtv;
        
        $dtv['page_title'] .= 'Signup Page';
        $dtv['mini_nav'] = [
            'USER' => '',
            'SIGNUP' => ''
        ];

        return view('site.users.signup', $dtv);

    }

    public function postSignup(SignupRequest $request){
        
        User::saveNew($request);

        if($request['backTo']){
            return redirect($request['backTo']);
        }

        return redirect('shop');

    }

    public function logout(){

        if(!Session::has('user_id')) return redirect('shop');
        Session::forGet([
            'user_id',
            'user_name',
            'is_admin',
        ]);
        Session::flash('warning', 'You have successfully logged out!');

        return redirect('user/signin');

    }

    public function signin(){

        $dtv =& self::$dtv;

        $dtv['page_title'] .= 'Signin Page';
        $dtv['mini_nav'] = [
            'USER' => '',
            'SIGNIN' => ''
        ];
        
        return view('site.users.signin', $dtv);

    }

    public function postSignin(SigninRequest $request){

        $is_connection = User::verify($request);

        if($is_connection) return redirect('shop');

        self::$dtv['restoration'] = [
            'email' => $request['email'],
        ];

        self::$dtv['verify_error'] = 'The name or password is incorrect';
        return $this->signin();

    }

}