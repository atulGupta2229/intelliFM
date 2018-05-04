<?php
session_start();
if($_SESSION["logval"]!=1){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee Registration</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<style type="text/css">
		.main{
  min-height: 550px;
  background: rgba(55, 71, 79, 0.7);
  margin-top: 2%;
  margin-bottom: 5%;
  padding-left: 6%;
  padding-right: 6%; 
}
::-webkit-scrollbar{
	display: none;
	}

th{
	text-align: center;
}
td{
	color: #fafafa;
}
tr:hover{
	background: rgba(55, 71, 79, 0.7);
}
</style>
<script type="text/javascript">
		$(document).ready(function(){
			$("#imgf").click(function(){
				$("#fu").trigger("click");
			});
		});
	</script>	
</head>
<body background="images/1.jpg" style="background-size: cover;background-attachment: fixed; background-repeat: no-repeat;"> 
	<div class="container-fluid">
			<div class="row" style="margin-left: 2%; margin-right: 2%;">
			<div class="col-sm-12 text-center"><br>
				<span class="h1" style="font-family: candara; font-size: 40px;">Employee Registration</span>
				<br><br>
				<div class="row">
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-8 main">
					<br><br>
						<form action="code.php?act=2" method="post" enctype="multipart/form-data">
						<input type="hidden" name="pic" value="images/dp.png">
						<input type="file" id="fu" style="display: none" name="ufile">
								<img src="images/addimage.png" title="Upload Image" id="imgf"><br><br>
						<div class="input-group">
  <span class="input-group-addon" id="basic-addon1" style="border: 2px solid #8bc34a; border-right: none;">
<img src="images/user.png" width="20px"></span>
  <input type="text" class="form-control" placeholder="Employee name..." name="nm" aria-describedby="basic-addon1" style="border: 2px solid #8bc34a;" required="">
</div>
<br>	
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1" style="border: 2px solid #8bc34a; border-right: none;">
<img src="images/email.png" width="20px"></i></span>
  <input type="email" class="form-control" placeholder="Email..." name="em" aria-describedby="basic-addon1" style="border: 2px solid #8bc34a;" required="">
</div>
<br>	
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1" style="border: 2px solid #8bc34a; border-right: none;">
<img src="images/password.png" width="20px"></span>
  <input type="text" class="form-control" placeholder="Password..." name="pw" aria-describedby="basic-addon1" style="border: 2px solid #8bc34a;" required="">
</div>
<br>	
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1" style="border: 2px solid #8bc34a; border-right: none;">
<img src="images/flag.png" width="20px"></span>
  <input type="text" class="form-control" placeholder="Department..." name="dept" aria-describedby="basic-addon1" style="border: 2px solid #8bc34a;" required="">
</div>
<br>	
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1" style="border: 2px solid #8bc34a; border-right: none;">
<img src="images/tie.png" width="20px"></span>
  <input type="text" class="form-control" placeholder="Designation..." name="desg" aria-describedby="basic-addon1" style="border: 2px solid #8bc34a;" required="">
</div>
<br>
<br>
<button class="btn btn-primary" type="submit" style="background-color: #8bc34a; border: none;">Register</button> &nbsp;<button class="btn btn-primary" type="reset" style="background-color: #8bc34a; border: none;">Reset</button>
<br><br><br>
						</form>
					</div>
					<div class="col-sm-2">
						
					</div>
				</div>
			</div>			
		</div>
	</div>
	<br>
	<br>
	<div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create">
    <a href="index.php" class="plus" title="Logout" style="text-decoration: none; "><i class="fa fa-power-off" aria-hidden="true"></i></a>
  </div>	
  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" style="margin-bottom: 80px;">
    <a href="dashboard.php" class="plus" title="Logout" style="text-decoration: none; "><i class="fa fa-step-backward" aria-hidden="true"></i></a>
  </div>
</body>
</html>