<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>排行榜</title>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('bower/bootstrap/dist/css/bootstrap.min.css'); ?>" />
    <script type="text/javascript" src="<?php echo asset('bower/jquery/dist/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo asset('bower/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <style>
        body{
            font-family: '微軟正黑體';
            background-color: #f8fafc;
        }
        .navbar-default{
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-default">
        <div class="container">
            <a href="<?php echo url('/'); ?>" class="navbar-brand">
                HelloLaravel
            </a>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a href="<?php echo action('BoardController@getIndex'); ?>" class="nav-link">
                        排行榜
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">排行榜</div>
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
                                    <tr>
                                        <td>1</td>
                                        <td>s1234567890</td>
                                        <td>小明</td>
                                        <td>60</td>
                                        <td>60</td>
                                        <td>60</td>
                                        <td>180</td>
                                        <td>
                                            <a href="<?php echo route('students', ['student_no' => 's1234567890']); ?>" class="btn btn-info btn-sm">
                                                查看學生資料
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>