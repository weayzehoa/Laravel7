<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;
use Auth;
use Redirect;
use View;

class AuthController extends Controller
{
    /**
     * 物件初始化
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest', ['except' => ['getLogout']]);
    }

    public function getLogin(){
        return View::make('login');
    }

    public function postLogin(LoginRequest $request){
        $authData = $request->only([
            'email', 'password'
        ]);

        if(Auth::attempt($authData, $request->has('rememeber'))){
            return Redirect::action('BoardController@getIndex');
        }else{
            return Redirect::back()
                ->withErrors(['msg' => '帳號或密碼輸入錯誤'])
                ->withInput($request->except('password'));
        }
    }

    public function getLogout(){
        Auth::logout();
        return Redirect::action('BoardController@getIndex');
    }
}
