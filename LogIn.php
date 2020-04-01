<?php 
  	$email="";
	$erremail="";
	$password="";
	$errpassword="";
	$formvalid = true;

	if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if(empty($_POST['email']))
		{
			$erremail="*E-Mail Required";
			$formvalid = false;
		}
		else
		{			
			$email=htmlspecialchars($_POST['email']);
		}

		if(empty($_POST['password']))
		{
			$errpassword="*Password Required";
			$formvalid = false;
		}
		else
		{			
			$password=htmlspecialchars($_POST['password']);
		}
		
		if($formvalid==true && $email=="rahivjobs@gmail.com" && $password == "1234" )
		{
			session_start(); 
			$_SESSION['user']= "Kazi Rahiv";
			header('location:Dashboard.php');
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Tazker | Log in</title>
  <?php include("includes/content_head.php");?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">

  <a href=""><b>Taz</b>Ker</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
	  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control <?php if(!empty($erremail)) echo "is-warning"; ?>" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control <?php if(!empty($errpassword)) echo "is-warning"; ?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <p class="mb-0">
              <a href="Register.php" class="text-center">Register</a>
            </p>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" value="Sign In" class="btn btn-outline-primary btn-block">
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php include("includes/content_js.php");?>
</body>
</html>
