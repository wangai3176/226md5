<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MD5 Decryption</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
</head>
<body>

<div class="container">
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
        <div class="container">
            <a href="/" class="navbar-brand">MD5 Decryption</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <span class="nav-link" style="cursor: default;" >无需登录/无限查询</span>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <div>
        <div class="jumbotron">
            <h1 class="display-3">Hello, world!</h1>
            <p class="lead">输入让你无语的MD5</p>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Input MD5" id="md5_input">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" onclick="queryMd5()">查 询</button>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-4">
                    <div class="alert alert-dismissible alert-primary">
                        查询结果：<strong id="result">等待查询</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer">
        <div class="row">
            <div class="col-lg-12">
                <p>Made by <a href="http://www.hackersb.cn">Tuuu Nya</a>.</p>
                <p>Based on <a href="https://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fontawesome.io/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="https://fonts.google.com/" rel="nofollow">Google</a>.</p>

            </div>
        </div>

    </footer>
</div>

<script src="{{ URL::asset('js/app.js') }}"></script>
<script>
    function queryMd5() {
        let md5 = document.getElementById('md5_input').value;
        let resultDOM = document.getElementById('result');

        resultDOM.innerText = '查询中....';

        $.ajax({
            url: '/api/md5/search',
            type: 'POST',
            data: {
                md5,
            },
            dataType: 'json',
            success: function (data) {
                resultDOM.innerText = data.message;
            }
        })
    }
</script>

</body>
</html>