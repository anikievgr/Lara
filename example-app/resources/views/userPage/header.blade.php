
<!doctype html>
<html lang="en">
<head>
    @section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel = "shortcut icon" href = "style/images/favicon-1.svg" sizes="any" >
   
         <title> @section('title')Branko - О нас   @show</title>
 
   
    <!-- Bootstrap core CSS -->
    <link href="{{asset('style/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('style/userPage/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('style/userPage/css/color/blue.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href="{{asset('style/userPage/type/icons.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @show
   
</head>
<body>
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>
<div class="body-wrapper">
    @section('navBar-tag')
     <nav class="navbar navbar-default default">
    @show
        <div class="container">
            <div class="navbar-header">
                <div class="basic-wrapper">
                    <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
                    <div class="navbar-brand">
                        <a href="https://brankorus.ru" style="position: absolute; top: -18px">
                            <img src="style/images/logo.png" height="50"  class="logo-light" alt="BRANKO">
                            <img src="style/images/logo-dark.png" height="50" class="logo-dark" alt="BRANKO">
                        </a>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @section('activpage')
                        <li class="">
                        <a href="/">О нас</a>
                    </li>
                    <li class="/">
                        <a href="/incubirovanie">Инкубирование</a>
                    </li>
                    <li class="/">
                        <a href="/contact">Контакты</a>
                    </li>
                    @show
                </ul>
            </div>
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
