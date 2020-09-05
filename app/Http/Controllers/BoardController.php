<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Route;
use View;

class BoardController extends Controller
{
    public function getIndex(){
        //此種方式直接使用 View facade 的 make 方式產生視圖, 不需使用blade,
        //如同直接執行 board.php
        return View::make('board');
    }

    public function getName(){
        return Route::currentRouteAction();
    }
}
