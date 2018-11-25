<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <style>
        body{
            font-family: 'Nunito', sans-serif;
        }
        h1,h2,h3,h4,h5,h6{
            font-family: 'Nunito', sans-serif; 
            font-style: bold;
        }
        .box{
            display: flex;
            /* flex-direction: column; */
            flex-shrink: inherit;
            max-width: 600px;
            max-height: 300px;
        }
        .box-half{
            width: inherit;
            height: inherit;
        }
        .login-img{
            display: block;
            /* text-indent: -9999px; */
            /* width: auto; */
            height: auto;
            background: url('img/student.svg');
            /* background-size: 100px 82px; */
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- <div class="box pt-5 justify-content-center">
            <div class="box-half">
                <div class="login-img"></div>
            </div>
            <div class="box-half">
                <h3 class="mb-1">Eneza App, Please Login</h3>
                <form action="route('/register')" method="post">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-sm"value="Login">
                    </div>
                </form>
            </div>
        </div> --}}
        <div class="row pt-5 align-items-center">

            <div class="col-md-6 col-sm-6">
                    {{-- <div class="login-img"></div> --}}
                    <img src="/img/student.svg" alt="">
            </div>
            <div class="col-md-6 col-sm-6">
                    <h3 class="pb-2">Eneza App, Please Login</h3>
                    <form action="/register" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control">
    
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-md"value="Login">
                        </div>
                    </form>
            </div>
        </div>

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>
