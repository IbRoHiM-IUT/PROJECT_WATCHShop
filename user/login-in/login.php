<?php 
    session_start();
 ?>
 

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">

    <title>Sign in</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="style.css">    

    <script src="../../code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'http://bootsnipp.com/');
        });
    </script>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Website CSS style -->
        <link href="../css/bootstrap.min.html" rel="stylesheet">

        <!-- Website Font style -->
        <link rel="stylesheet" href="style/font-awesome/4.6.1/css/font-awesome.min.css">
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

        <title>Sign in</title>
    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="main-login main-center">
                <h5><center><strong>Sign in</strong></center></h5>
                    <form class="" method="post" action="#">
                        
                        <div class="form-group">
                            <label for="name" class="cols-sm-2 control-label">Your Name</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" required="required"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Your Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required="required"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <button type="submit" name="login" id="button" class="btn btn-primary btn-lg btn-block login-button">Login</button>
                        </div>
                        <center>
                            <font color='white'>Not registered yet? </font>
                            <a href='registration.php'>Sign Up Here</a>
                        </center>
                    </form>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    </body>
</html>
</body>
</html>


 <?php 
    include "../../libs/config.php";
    include "../../libs/database.php";

    $db = new database();

    if (isset($_POST['login'])) {
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $query = "SELECT * FROM users WHERE user_firstname='$name' AND user_email='$email' AND user_pass='$pass'";


        $user = $db->select($query);

        //$check = $user->num_rows;

        if (mysql_num_rows($user) > 0) {
            $_SESSION['user_email'] = $email;
            header("location: index.php?msg= Succesfully Logged in!");
        }
        else{
            echo "<script>alert('Password or Email is not correct!')</script>";
        }
    }

 ?>
