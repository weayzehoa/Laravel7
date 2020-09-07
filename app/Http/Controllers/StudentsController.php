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