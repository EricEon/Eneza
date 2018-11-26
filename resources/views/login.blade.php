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
            color: beige;
            background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
        }
        h1,h2,h3,h4,h5,h6{
            font-family: 'Nunito', sans-serif; 
            font-style: bold;
        }
        span>a{
            color:beige;
        }
        .container{
            height: 100vh;
        }
        
    </style>
</head>

<body>
    <div class="container">

        <div class="row pt-5 align-items-center">

            <div class="col-md-6 col-sm-6">
                {{-- <div class="login-img"></div> --}}
                <img src="/img/student.svg" alt="">
            </div>
            <div class="col-md-6 col-sm-6">
                <h3 class="pb-2">Eneza App, Please Login</h3>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group align-items-center">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control">

                    </div>
                    <div class="form-group align-items-center">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group align-items-center justify-content-center">
                        <input type="submit" class="btn btn-primary btn-lg" value="LOGIN">
                    </div>
                    <span><a href="/register">No Account, Register ?</a></span>
                </form>
            </div>
        </div>

    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>
