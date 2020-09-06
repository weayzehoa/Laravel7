<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Student as StudentEloquent;

class StudentsController extends Controller
{
    //撈取學生資料
    public function getStudentData($student_no){
        //撈取學生資料表中 no欄位 等於 $student_no, 且回傳第一筆不然就失敗
        $student = StudentEloquent::where('no', $student_no)->firstOrFail();
        return View::make('student', [
            'student' => $student,
            'user' => $student->user,
            'score' => $student->score,
            'subject' => null
        ]);
    }

    //撈取學生分數
    public function getStudentScore($student_no, $subject = null){
        //撈取學生資料表中 no欄位 等於 $student_no, 且回傳第一筆不然就失敗
        $student = StudentEloquent::where('no', $student_no)->firstOrFail();
        return View::make('student', [
            'student' => $student,
            'user' => $student->user,
            'score' => $student->score,
            'subject' => $subject
        ]);   
    }
}
// Eloquent 查詢類方法
    // // 抓取國文分數等於80分的
    // App\Score::where('chinese', '80')->get();
    // // 抓取國文分數大於等於60
    // App\Score::where('chinese', '>=', '60')->get();
    // // 將總分由低到高排序
    // App\Score::orderBy('total','asc')->get();
    // // 將總分由高到低排序
    // App\Score::orderBy('total','desc')->get();
// Eloquent 撈取類方法
    // //抓所有學生資料, 如果使用where()或orderBy()之後不可以使用all(),只能使用get()
    // App\Student::all();
    // //抓所有學生資料
    // App\Student::get();
    // //抓取使用者姓名中有er的結果.
    // App\User::where('name', 'like', '%er%')->get();
    // //使用主鍵抓取特定資料, 這邊查詢只會抓table內的id欄位,此欄位記得要使用$primaryKey屬性.
    // App\Student::find('2');
    // App\Student::find(['2','3','5','9']);
    // //只取第一筆結果,與get()不太相同,不管多少資料都只取一筆
    // App\Score::orderBy('total','desc')->first();
    // //跟find功能一樣，差別在於find()找不到資料會回傳null,findOrFail會回傳
    // // Illuminate\Database\Eloquent\ModelNotFoundException 的錯誤例外, 請小心使用,
    // // 下方多筆資料只要一筆找不到就會跳出錯誤例外.
    // App\Student::findOrFail(['1','5','8']);
    // //跟first()功能一樣，差別在於first()不到資料會回傳null,firstOrFail會回傳
    // // Illuminate\Database\Eloquent\ModelNotFoundException 的錯誤例外, 請小心使用,
    // App\Score::orderBy('total','desc')->firstOrFail();



// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use View;

// class StudentsController extends Controller
// {
//     // //
//     // public function getStudentData($student_no){
//     //     return '學號： ' .$student_no;
//     // }

//     // public function getStudentScore($student_no, $subject = null){
//     //     return '學號： ' .$student_no. ' 的 '. (is_null($subject) ? '所有科目' : $subject . '科目') . '成績';
//     // }

//     public function getStudentData($student_no)
//         {
//             return View::make('student', [
//                 'student_no' => $student_no,
//                 'subject' => null
//             ]);
//         }

//         public function getStudentScore($student_no, $subject = null)
//         {
//             return View::make('student', [
//                 'student_no' => $student_no,
//                 'subject' => $subject
//             ]);
//         }
// }