<?php session_start(); ?>

<?php include("logic.php"); ?>

<?php
  if (!isset($_SESSION['loggedIn'])) {
      $_SESSION['loggedIn'] = false;
  }

  if (isset($_POST['password'])) {

    $submit_user = $_POST['password'];
    $submit_pass = $_POST['user'];
    $u_bool = false;
    $p_bool = false;
    $email = strtolower($_POST['user']);
    
    $log_sql = "SELECT * FROM users";
    $log_query = mysqli_query($conn, $log_sql);

    foreach($log_query as $q) { 
      if (($email == $q['email']) && ($_POST['password'] == $q['user_password'])) {
        
        $u_bool = true;
        
              $GLOBALS['a_user'] = $q['display_name'];
              $GLOBALS['a_avatar'] = $q['avatar'];
              
              $_SESSION['a_user'] = $q['display_name'];
              $_SESSION['a_avatar'] = $q['avatar'];
              $_SESSION['a_ID'] = $q['user_id'];
              $_SESSION['a_date'] = $q['reg_date'];
              $_SESSION['a_email'] = $q['email'];
              $_SESSION['a_password'] = $q['user_password'];

              $a_username = $q['email'];
              $a_id = $q['user_id'];

?> 

<?php 
    break;
    };
  };

  if ($u_bool) {
          $_SESSION['loggedIn'] = true;
      } else {
          header("Location: home.php?info=invalid");
          die ('Incorrect password');
      }
  } 

  if (!$_SESSION['loggedIn']):
?>

<?php include_once('head_section.php'); ?>
  <title>Log In - Blog App</title>
</head>

  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: -webkit-box;
      display: flex;
      -ms-flex-align: center;
      -ms-flex-pack: center;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #fff;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .checkbox {
      font-weight: 400;
    }
    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>
<?php if(isset($_REQUEST['info'])) { ?>

<?php if($_REQUEST['info'] == "user-exists") { ?>

    <div class=" col-12 alert alert-danger mt-3 position-absolute top-0" role="alert">
        Email address is already registered, select new email address.
    </div>
    
<?php }
}?>

    <body class="text-center bg-gray">
      <div class="continaer-md bg-light g-5 p-5 bg-rounded w-75">


      <form class="form-signin" method="post">
        <img class="mb-4" src="b.ico" alt="" width="50" height="50">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputUser" class="sr-only">Email</label>
        <input type="text" name="user" id="inputUser" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control " placeholder="Password" required>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <input type="submit" name="submit" value="Login" class="btn btn-md btn-primary btn-block bg-rounded" >
        <div class="text-center">
          <p class="py-3">Not a member? <a href="sign-up.php">Register</a></p>
        </div>
      </form>   
      </div>  



      
  </body>
</html>

<?php
exit();
endif;
?>