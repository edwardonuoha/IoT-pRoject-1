<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eps32 Login | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
                                <?php 
          if(isset($_SESSION["success"])){ ?>
          <p class="message" style="color: green;font-size: 16px;text-align: center;font-weight: bold;"><?php echo $_SESSION["success"];?></p>
        <?php 
session_unset(); 
session_destroy(); 

      }
          ?>
         <?php 
          if(isset($_SESSION["error"])){ ?>
          <p class="message" style="color: red;font-size: 16px;text-align: center;font-weight: bold;"><?php echo $_SESSION["error"];?></p>
        <?php 
session_unset(); 
session_destroy(); 

      }

          ?>
            <form action="back.php" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" name="pass" name="" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-block btn-success" value="Log In"  name="login" id="login">
               
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />


              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
                      <?php 
          if(isset($_SESSION["success"])){ ?>
          <p class="message" style="color: red;font-size: 16px;text-align: center;font-weight: bold;"><?php echo $_SESSION["success"];?></p>
        <?php 
session_unset(); 
session_destroy(); 

      }

          ?>
            <form action="back.php" method="post">
              <h1>Create Account</h1>
              <div>
                <input type="text" name="name" class="form-control" placeholder="Name" required="" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="text" name="phone" class="form-control" placeholder="Phone" required="" />
              </div>
              <div>
                <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required="" />
              </div>
               <div>
                <input type="password" name="rpass" id="rpass" class="form-control" placeholder="Reenter Password" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-block btn-success" value="Register"  name="submit" id="submit">
                <small id="error" class="text-center"></small>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br/>

              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
        <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <script type="text/javascript">
    $('#rpass').on('keyup', function () {
  if ($('#pass').val() == $('#rpass').val()) {
    $('#error').html('Password Matched').css('color', 'green');

  } else 
    $('#error').html('Password Not Matching').css('color', 'red');


});
  </script>
  </body>
</html>
