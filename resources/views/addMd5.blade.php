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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">查询</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/addMd5">加密明文&&入库</a>
                    </li>
                </ul>
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
            <p class="lead">加密明文&&入库</p>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-4">
                    <textarea class="form-control" rows="4" placeholder="支持多行，按回车分割，提交后会将该内容加密并存入数据库" id="raw_input"></textarea>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" onclick="addMd5()">批量加密</button>
                    <div class="alert alert-dismissible alert-primary" style="margin-top: 20px">
                        加密结果：<strong id="result">等待查询</strong>
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
    function addMd5() {
        let raw = document.getElementById('raw_input');
        let resultDOM = document.getElementById('result');

        resultDOM.innerText = '入库中....';

        $.ajax({
            url: '/api/md5/add',
            type: 'POST',
            data: {
                raw: raw.value,
            },
            dataType: 'json',
            success: function (data) {
                resultDOM.innerText = data.message;
                raw.value = '';
            }
        })
    }
</script>

</body>
</html>