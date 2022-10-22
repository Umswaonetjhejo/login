<?php 
//Developer: Jonathan Musa Skosana
//https://www.linkedin.com/in/jonathan-musa-skosana-a31a26a1/

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
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
            <a class="navbar-brand" href="#">
            <?php
                if (isset($_SESSION['username'])) {
                    echo "Welcome  " . $_SESSION['username'];
                }
            ?>
            </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['username'])) {
                    
                    ?>
                    <li><a href="logout.php"><input type="button" class="btn btn-primary btn-logout"value="Logout"></a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </nav>

    <div class="alert alert-success">
        You are logged in <strong>Success!</strong>
    </div>
    
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-captcha.min.js"></script>
<script src="js/captcha.js"></script>
<script src="js/form-validate.js"></script>

</body>
</html>
