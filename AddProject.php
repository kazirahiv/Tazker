<?php
  $projectName="";
  $projectDescription="";
  $clientCompany="";
  $projectLeader="";
  $estimatedBudget="";
  $totalAmountSpent="";
  $estimatedProjectDuration="";

  $errProjectName="";
  $errProjectDescription="";
  $errClientCompany="";
  $errProjectLeader="";
  $errEstimatedBudget="";
  $errTotalAmountSpent="";
  $errEstimatedProjectDuration="";

  if($_SERVER['REQUEST_METHOD'] === 'POST')
	{
    	if(empty($_POST['projectName']))
		{
			$errProjectName="*Project Name Required";
			$formvalid = false;
		}
		else
		{			
			$projectName=htmlspecialchars($_POST['projectName']);
		}


		if(empty($_POST['projectDescription']))
		{
			$errProjectDescription="*Project Description Required";
			$formvalid = false;
		}
		else
		{			
			$projectDescription=htmlspecialchars($_POST['projectDescription']);
		}

		if(empty($_POST['clientCompany']))
		{
			$errClientCompany="*Client Company Required";
			$formvalid = false;
		}
		else
		{			
			$clientCompany=htmlspecialchars($_POST['clientCompany']);
		}


		if(empty($_POST['projectLeader']))
		{
			
			$errProjectLeader="*Project Leader Required";
			$formvalid = false;
		}
		else
		{			
			$projectLeader=htmlspecialchars($_POST['projectLeader']);
		}

		if(empty($_POST['estimatedBudget']))
		{
			$errProjectLeader="*Estimated Budget Required";
			$formvalid = false;
		}
		else
		{			
			$projectLeader=htmlspecialchars($_POST['estimatedBudget']);
		}


		if(empty($_POST['totalAmountSpent']))
		{
			$errTotalAmountSpent="*Total Amount Spent";
			$formvalid = false;
		}
		else
		{			
			$totalAmountSpent=htmlspecialchars($_POST['totalAmountSpent']);
		}


		if(empty($_POST['estimatedProjectDuration']))
		{
			$errEstimatedProjectDuration="*Estimated Project Duration Required";
			$formvalid = false;
		}
		else
		{			
			$estimatedProjectDuration=htmlspecialchars($_POST['estimatedProjectDuration']);
		}

		if($formvalid==true)
		{
			header('location:Dashboard.php');
		}

  }
?>


<!DOCTYPE html>
<html>

<head>
	<title>Tazker</title>
	<?php include("includes/content_head.php");?>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Nav Bar -->
		<?php include("includes/content_nav_bar.php");?>

		<!-- Main Sidebar Container -->

		<?php include("includes/content_sidebar.php");?>


		<!-- Content Wrapper. Contains page content -->

		<div class="content-wrapper" style="min-height: 1416.81px;">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Project Add</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Project Add</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>


			<!-- Main content -->
			<section class="content">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="row">
						<div class="col-md-6">
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">General</h3>

									<div class="card-tools">
										<!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button> -->
									</div>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label for="inputName">Project Name</label>
										<input type="text" name="projectName" id="inputName"
											class="form-control <?php if(!empty($errProjectName)) echo "is-warning"; ?>">
									</div>
									<div class="form-group">
										<label for="inputDescription">Project Description</label>
										<textarea name="projectDescription" id="inputDescription"
											class="form-control <?php if(!empty($errProjectDescription)) echo "is-warning"; ?>"
											rows="4"></textarea>
									</div>
									<div class="form-group">
										<label for="inputStatus">Status</label>
										<select name="projectStatus" class="form-control custom-select">
											<option selected="" disabled="">Select one</option>
											<option>On Hold</option>
											<option>Canceled</option>
											<option>Success</option>
										</select>
									</div>
									<div class="form-group">
										<label for="inputClientCompany">Client Company</label>
										<input name="clientCompany" type="text" id="inputClientCompany"
											class="form-control <?php if(!empty($errClientCompany)) echo "is-warning"; ?>">
									</div>
									<div class="form-group">
										<label for="inputProjectLeader">Project Leader</label>
										<input type="text" name="projectLeader" id="inputProjectLeader"
											class="form-control <?php if(!empty($errProjectLeader)) echo "is-warning"; ?>">
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<div class="col-md-6">
							<div class="card card-secondary">
								<div class="card-header">
									<h3 class="card-title">Budget</h3>

									<div class="card-tools">
										<!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button> -->
									</div>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label for="inputEstimatedBudget">Estimated budget</label>
										<input type="number" name="estimatedBudget" id="inputEstimatedBudget"
											class="form-control <?php if(!empty($errEstimatedBudget)) echo "is-warning"; ?>">
									</div>
									<div class="form-group">
										<label for="inputSpentBudget">Total amount spent</label>
										<input type="number" name="totalAmountSpent" id="estimatedBudget"
											class="form-control <?php if(!empty($errTotalAmountSpent)) echo "is-warning"; ?>">
									</div>
									<div class="form-group">
										<label for="inputEstimatedDuration">Estimated project duration</label>
										<input type="number" name="estimatedProjectDuration" id="inputEstimatedDuration"
											class="form-control <?php if(!empty($errEstimatedProjectDuration)) echo "is-warning"; ?>">
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<!-- <a href="#" class="btn btn-secondary">Cancel</a> -->
							<input type="submit" value="Create new Porject" class="btn btn-success float-right">
						</div>
					</div>
				</form>
			</section>
			<!-- /.content -->





		</div>
		<!-- /.content-wrapper -->

		<?php include("includes/content_footer.php");?>
		<!-- Main Sidebar Container -->



	</div>
	<!-- ./wrapper -->

	<?php include("includes/content_js.php");?>
</body>

</html>