<?php
	$username="";
	$errusername="";
	$email="";
	$erremail="";
	$password="";
	$errpassword="";
	$cpassword="";
	$errcpassword="";
	$formvalid = true;
	if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		if(empty($_POST['username']))
		{
			$errusername="*User Name Required";
			$formvalid = false;
		}
		else
		{			
			$username=htmlspecialchars($_POST['username']);
		}

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

		if(empty($_POST['cpassword']))
		{
			$errcpassword="*Confirm Password";
			$formvalid = false;
		}
		else
		{			
			$cpassword=htmlspecialchars($_POST['cpassword']);
		}

		if($formvalid==true)
		{
			header('location:LogIn.php');
		}

	}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Tazker | Register</title>
  <?php include("includes/content_head.php");?>
</head>
<body class="hold-transition login-page">
<div class="login-box" style="width: 45% !important;">
  <div class="login-logo">
  <a href=""><b>Taz</b>Ker</a>
  </div>
  <!-- /.login-logo -->
  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Lead Registration</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="username"  class="form-control <?php if(!empty($errusername)) echo "is-warning"; ?>" id="name" value="<?php echo $username;?>" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control <?php if(!empty($erremail)) echo "is-warning"; ?>" id="email" name="email" value="<?php echo $email;?>" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control <?php if(!empty($errpassword)) echo "is-warning"; ?>" id="password" name="password" value="<?php echo $password;?>" placeholder="Password">
                  </div>

                  <div class="form-group">
                    <label for="confpassword">Confirm Password</label>
                    <input type="password" class="form-control <?php if(!empty($errcpassword)) echo "is-warning"; ?>" id="confpassword" name="cpassword" value="<?php echo $cpassword;?>" placeholder="Confirm your password again">
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="row">
                        <div class="col-10">
                          <p class="mt-1 float-right">
                            <a href="LogIn.php" class="text-center">Already has a account, Log In ? </a>
                          </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-2">
                            <input type="submit" value="Submit" class="btn btn-outline-primary float-right"></input>
                        </div>
                        <!-- /.col -->
                      </div>
                  
                </div>
              </form>
            </div>
</div>
<!-- /.login-box -->
<?php include("includes/content_js.php");?>
</body>
</html>
