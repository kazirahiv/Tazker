<!DOCTYPE html>
<html>

<head>
  <title>Tazker | Register</title>
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
	<div class="login-box" style="width: 45% !important;">
		<div class="login-logo">
			<a href=""><b>Taz</b>Ker</a>
		</div>
		<!-- /.login-logo -->
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Register For Your Organization</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form id="orgRegistrationForm" method="POST" action="../Controller/OrgController.php">
				<div class="card-body">
					<div class="form-group">
						<label for="name">Organization Name</label>
						<input type="text" name="orgname"
							class="form-control" id="orgname" placeholder="Enter Organization Name">
					</div>
					<div class="form-group">
						<label for="name">Your Name</label>
						<input type="text" name="username"
							class="form-control" id="username" placeholder="Enter Your Name">
					</div>
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password">
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


<script>

$(document).ready(function () {

$('#orgRegistrationForm').validate({ // initialize the plugin
	rules: {
		orgname: {
			required: true,
			minlength: 5
		},
		username: {
			required: true,
			minlength: 5
		},
		password: {
			required: true,
			minlength: 5
		},
		email: {
			required: true,
			email: true
		},
	},
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
			var formData = { orgadd : {
			orgName : $('#orgRegistrationForm input[name="orgname"]').val(),
			name : $('#orgRegistrationForm input[name="username"]').val(),
			password : $('#orgRegistrationForm input[name="password"]').val(),
			email : $('#orgRegistrationForm input[name="email"]').val()
		}
      }

		$.ajax({
			url: form.action,
			type: form.method,
			data: formData,
			success: function(response) {
				if(response == "success")
				{
					window.location.replace("../View/LogIn.php");
				}else
				{
					alert("Invalid Request");
				}
			}            
		});
    }
});

});
</script>



</html>