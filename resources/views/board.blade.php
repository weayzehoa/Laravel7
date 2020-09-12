@extends('layouts.master')

@section('title', '排行榜')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo action('BoardController@getIndex'); ?>" class="nav-link">
                        排行榜
                    </a>
                </div>
                <div class="card-body p-1">
                    <table class="table table-hover m-0">
                        <thead class="thead-dark">
                            <tr>
                                <th>名次</th>
                                <th>學號</th>
                                <th>姓名</th>
                                <th>國文</th>
                                <th>英文</th>
                                <th>數學</th>
                                <th>總分</th>
                                <th>動作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scores as $score)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$score->student->no}}</td>
                                <td>{{$score->student->user->name}}</td>
                                <td>{{$score->chinese}}</td>
                                <td>{{$score->english}}</td>
                                <td>{{$score->math}}</td>
                                <td>{{$score->total}}</td>
                                <td>
                                    <a href="{{ route('students', ['student_no' => $score->student->no ]) }}" class="btn btn-info btn-sm">
                                        查看學生資料
                                    </a>
                                    {{-- <a href="{{ action('SchoolController@edit', ['student_no' => $score->student->no]) }}" class="btn btn-success btn-sm">
                                        編輯
                                    </a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
