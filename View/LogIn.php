
<!DOCTYPE html>
<html>
<head>
  <title>Tazker | Log in</title>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="includes/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="includes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="includes/dist/css/styles.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
        <form id="loginForm" method="POST" action="../Controller/AuthController.php">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="is-warning"></div>
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


<?php include("includes/content_js.php");?>

<script>

  $('#loginForm').validate({ // initialize the plugin
    rules: {
      password: {
        required: true
      },
      email: {
        required: true,
        email: true
      },
    },
    messages: {
      email: {
        required: "Email is required",
      },
      password: {
        required: "Password is required",
      },
    },
    errorElement: 'div',
    errorLabelContainer: '.is-warning',
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function (form) {
      var formData = { login : {
        email : $('#loginForm input[name="email"]').val(),
        password : $('#loginForm input[name="password"]').val()
      }
      }

      $.ajax({
          url: form.action,
          type: form.method,
          data: formData,
          success: function(response) {
            console.log(response);
            if(response == "success")
            {
              window.location.replace("../View/Dashboard.php");
            }else
            {
              alert("Invalid Credentials");
            }
          }            
      }); 
    }
    });
</script>



</html>