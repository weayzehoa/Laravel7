<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/', function () {
    return view('admin/login');
});
// Route::get('test/', function () {
//     return view('test/welcome');
// });
// Route::get('test/', function () {
//     return view('test/welcome');
// });
// Route::get('test/{no}/', function ($no) {
//     return '編號:' . $no;
// });

// Route::get('test/{no}/score', function ($no) {
//     return '編號: ' . $no . ' 的所有成績';
// });

// Route::get('test/{no}/score/{subject}', function ($no, $subject) {
//     return '編號: ' . $no . ' 的 ' . $subject . ' 所有成績';
// });

//選擇性路由
// Route::get('test/{no}/score/{subject?}',
// function ($no, $subject = null) {
//     return '編號: ' . $no . ' 的 ' . ( is_null ($subject) ? '所有科目' : $subject) . ' 成績';
// });

//參數格式設定, 限制參數範圍s字串[0-9]數字{5}5個數字才會顯示
// Route::get('test/{no}', function ($no) {
//     return '編號:' . $no;
// })->where(['no' => 's[0-9]{5}']);

// Route::get('test/{no}/score/{subject?}',
// function ($no, $subject = null) {
//     return '編號: ' . $no . ' 的 ' . ( is_null ($subject) ? '所有科目' : $subject) . ' 成績';
// })->where(['subject' => '(chinese|english|math)']);

//路由群組
// Route::pattern('no','s[0-9]{5}');
// Route::group(['prefix'=>'test'], function(){
//     Route::get('{no}', function($no){
//         return '編號: '. $no ;
//     });
//     Route::get('{no}/score/{subject?}', function($no,$subject=null){
//         return '編號: ' . $no . ' 的 ' . ( is_null ($subject) ? '所有科目' : $subject) . ' 成績';
//     })->where(['subject' => '(chinese|english|math)']);
// });

//路由群組另一種寫法
// Route::pattern('no','s[0-9]{5}');
// Route::prefix('test')->group(function(){
//     Route::get('{no}', function($no){
//         return '編號: '. $no ;
//     });
//     Route::get('{no}/score/{subject?}', function($no,$subject=null){
//         return '編號: ' . $no . ' 的 ' . ( is_null ($subject) ? '所有科目' : $subject) . ' 成績';
//     })->where(['subject' => '(chinese|english|math)']);
// });

//路由命名
//替路由建立識別名稱, as, uses 特定字
// Route::pattern('no','s[0-9]{5}');
// Route::group(['prefix'=>'test'], function(){
//     Route::get('{no}', [
//         'as' => 'test',
//         'uses' => function($no){
//             return '編號: '. $no ;
//         }
//     ]);
//     Route::get('{no}/score/{subject?}', [
//         'as' => 'test.score',
//         'uses' => function($no,$subject=null){
//             return '編號: ' . $no . ' 的 ' . (is_null($subject) ? '所有科目' : $subject) . ' 成績';
//         }
//     ])->where(['subject' => '(chinese|english|math)']);
// });
//路由命名 縮短
//替路由建立識別名稱, as, uses 特定字
Route::pattern('no','s[0-9]{5}');
Route::group(['as'=>'test.','prefix'=>'test'], function(){
    Route::group(['as'=>'score.','prefix'=>'score'], function(){
        Route::pattern('no','s[0-9]{5}');
        Route::get('{no}', function($no){
            return '編號: '. $no ;
        });
        Route::get('{no}/{subject?}', function($no,$subject){
            return '編號: ' . $no . ' 的 ' . $subject . ' 成績';
        })->where(['subject' => '(chinese|english|math)']);
    
        Route::get('{no}/{subject?}/score/', function($no,$subject=null){
            $subject == 'chinese' ? $score = '92' : '';
            $subject == 'english' ? $score = '95' : '';
            $subject == 'math' ? $score = '90' : '';
            return '編號: ' . $no . ' 的 ' . $subject . ' 成績 '. $score;
        })->where(['subject' => '(chinese|english|math)']);
    });
});
