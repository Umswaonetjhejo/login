<?php 
//Developer: Jonathan Musa Skosana
//https://www.linkedin.com/in/jonathan-musa-skosana-a31a26a1/

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/form-validate.css" rel="stylesheet"/>
</head>
<body>

<div class="container">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">User Management System</a>
    </div>
  </div>
</nav>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#user-login">Login</a></li>
        <li><a data-toggle="tab" href="#user-registration">Register</a></li>
    </ul>

    <div class="tab-content">
        <div id="user-login" class="tab-pane fade in active">
            <h3>Login</h3>
            
            <div id="login-message" style="display: none"></div>

            <form class="form-horizontal" id="login-form" action="" method="post" role="form">

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="username" id="login-username" class="form-control" placeholder="Username" />
                        <span class="error" id="login-username-info"></span> 
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="password" name="login-password" id="login-password" class="form-control" placeholder="Password" />
                        <span class="error" id="password-info"></span> 
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <canvas id="login-canvas"></canvas><br>
                        <input name="login-code" id="login-code" />
                        <input tyep="button" id="login-valid" class="btn btn-danger" value="Check">

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="button" id="btn-login" class="btn btn-primary" value="Log In" onclick="ajaxLogin()">
                    </div>
                </div>
            </form>

        </div>
        <div id="user-registration"  class="tab-pane fade in">
            <h3>Registration</h3>

            <div id="message" style="display: none"></div>

            <form class="form-horizontal" id="register-form" action="" method="post" role="form">

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="first-name" id="first-name" class="form-control" placeholder="First Name" value="" />
                        <span id="first-name-info"></span> 
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Last Name" value="" />
                        <span id="last-name-info"></span> 
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="" />
                        <span id="username-info"></span>  
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="password" name="register-password" id="register-password" class="form-control" placeholder="Password" />  
                        <span id="register-password-info"></span> 
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm Password" />  
                        <span id="confirm-password-info"></span> 
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <canvas id="canvas"></canvas><br>
                        <input name="code" id="code" />
                        <input tyep="button" id="valid" class="btn btn-danger" value="Check">

                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="button" id="btn-register" class="btn btn-primary" value="Register" onclick="ajaxRegistration()" hide/>
                    </div>
                </div>

            </form>
 
        </div>
    </div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-captcha.min.js"></script>
<script src="js/captcha.js"></script>
<script src="js/form-validate.js"></script>

</body>
</html>
