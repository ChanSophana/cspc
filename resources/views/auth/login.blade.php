<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Login</title>

  <!-- Favicons -->
  <link href="{{ URL::asset("assets/img/favicon.png")}}" rel="icon">
  <link href="{{ URL::asset("assets/img/apple-touch-icon.png")}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ URL::asset("assets/lib/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
  <!--external css-->
  <link href="{{ URL::asset("assets/lib/font-awesome/css/font-awesome.css")}}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ URL::asset("assets/css/style.css")}}" rel="stylesheet">
  <link href="{{ URL::asset("assets/css/style-responsive.css")}}" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="POST" action="{{ route('login') }}">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
                @csrf
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          <br>
          <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            <label class="checkbox">
                &nbsp; &nbsp; &nbsp; &nbsp;<input type="checkbox" value="remember-me"> Remember me
            
            </label>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
          <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="{{ route('register') }}">
              Create an account
              </a>
          </div>
        </div>

      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{ URL::asset("assets/lib/jquery/jquery.min.js")}}"></script>
  <script src="{{ URL::asset("assets/lib/bootstrap/js/bootstrap.min.js")}}"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="{{ URL::asset("assets/lib/jquery.backstretch.min.js")}}"></script>
  <script>
    $.backstretch("{{ URL::asset("assets/img/login-bg.jpg")}}", {
      speed: 500
    });
  </script>
</body>

</html>
