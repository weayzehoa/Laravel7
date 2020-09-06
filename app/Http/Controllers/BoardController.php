<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use View;
use App\Score as ScoreEloquent; //這行將 App\Score 作為一個物件在下方使用

class BoardController extends Controller
{
    public function getIndex(){
        return View::make('board', [
            'scores' => ScoreEloquent::with('student') //透過ScoreEloquent並其與student的關聯撈出資料
                ->orderByTotal() //在Score.php裡面實際名稱是 scopeOrderByTotal
                ->orderBySubject() //在Score.php裡面實際名稱是 scopeOrderBySubject
                ->get()
        ]);
    }

    public function getName(){
        return Route::currentRouteAction();
    }
}


// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Route;
// use View;

// class BoardController extends Controller
// {
//     public function getIndex(){
//         //此種方式直接使用 View facade 的 make 方式產生視圖, 不需使用blade,
//         //如同直接執行 board.php
//         return View::make('board');
//     }

//     public function getName(){
//         return Route::currentRouteAction();
//     }
// }