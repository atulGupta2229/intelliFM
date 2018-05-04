<?php
session_start();
if($_SESSION["logval"]!=1){
	header("Location: index.php");
}
$conn=mysqli_connect("localhost","root","","fms");
$uid=$_SESSION['user'];
if($uid=="admin"){
	$url="dashboard.php";
}
else{
	$url="dashboardemp.php";
}
$query="select * from tbl_emp";
$res=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
<head>

	<title>Initiate File</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap3.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<style type="text/css">
		.main{
  min-height: 600px;
  background: rgba(55, 71, 79, 0.7);
  margin-top: 2%;
  margin-bottom: 2%;
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
</head>
<body background="images/1.jpg" style="background-size: cover;background-attachment: fixed; background-repeat: no-repeat;"> 

	<div class="container-fluid">
			<div class="row" style="margin-right: 2%;margin-left: 2%;">
			<div class="col-sm-12 text-center">
				<div class="row">
					<div class="col-sm-1">		
					</div>
					<div class="col-sm-10 main"><br>
								<img src="images/initiateFile.png" width="80px"><br>	
								<span style="font-family: candara; font-size: 2em;">Initiate File</span>
								<form action="code.php?act=3" method="post">
								<input type="hidden" name="from_id" value="<?php echo $_SESSION["user"]; ?>">
								<div class="input-group">
  											<span class="input-group-addon" id="basic-addon1" style=" border: 2px solid  #8bc34a; border-right: none;"><img src="images/file.png" width="20px"></span>
  											<input type="text" class="form-control" name="fn" style="color: #fafafa ;background: rgba(55,71,79,0.4); border: 2px solid  #8bc34a;height: 40px;" placeholder="File Number..." required=""  aria-describedby="basic-addon1">
										</div>
										<br><div class="input-group">
										<span class="input-group-addon" id="basic-addon1" style=" border: 2px solid  #8bc34a; border-right: none;"><img src="images/send2.png" width="20px"></span>
										<select  class="form-control" name="send" style="background: transparent;height: 40px; border: 2px solid  #8bc34a; color: #fafafa;" aria-describedby="basic-addon1" required="">
											<option disabled="" selected="">--Send to--</option>
											<?php
											while($data=mysqli_fetch_array($res)){
											?>
											<option style="color: #444;" value="<?php echo $data["emp_id"]; ?>" ><?php echo $data["emp_name"]; ?></option>
											<?php
											}
											?>
										</select>
										</div><br>
										<div class="input-group">
  											<span class="input-group-addon" id="basic-addon1" style=" border: 2px solid  #8bc34a; border-right: none;"><img src="images/purpose.png" width="20px"></span>
  											<input type="text" class="form-control" name="pr" style="background: rgba(55,71,79,0.4); border: 2px solid  #8bc34a;height: 40px;color: #fafafa;" placeholder="Purpose..." required=""  aria-describedby="basic-addon1">
										</div>
										<br><div class="input-group">
										<span class="input-group-addon" id="basic-addon1" style=" border: 2px solid  #8bc34a; border-right: none;"><img src="images/follow.png" width="20px"></span>
										<select class="form-control" name="follow" style="background: transparent;height: 40px; border: 2px solid  #8bc34a; color: #fafafa;" aria-describedby="basic-addon1" required="">
											<option disabled="" selected="" style="color: #444;">--Follow--</option>
											<option style="color: #444">Normal line</option>
											<option style="color: #444">Green Line</option>
										</select>
										</div><br>
										<textarea class="form-control" rows="3" style="color: #fafafa ;border: 2px solid  #8bc34a; background: transparent;" placeholder="Remark..." name="remark"></textarea><br>
										<button class="btn btn-primary" type="submit" style="font-family: 'Josefin Sans', cursive;padding: 2% 3% 2% 3%; font-size: 1.5em; background-color:  #8bc34a; border: none; color: #f1f8e9"">Send File</button> &nbsp;&nbsp;<button class="btn btn-primary" type="reset" style="font-family: 'Josefin Sans', cursive;padding: 2% 3% 2% 3%; font-size: 1.5em; background-color:  #8bc34a; border: none; color: #f1f8e9"">Reset</button>
					</div>
					</form>
					<div class="col-sm-2">
						
					</div>
				</div>
			</div>			
		</div>
	</div>
	<div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create">
    <a href="index.php" class="plus" title="Logout" style="text-decoration: none; "><i class="fa fa-power-off" aria-hidden="true"></i></a>
  </div>	
  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" style="margin-bottom: 80px;">
    <a href="<?php echo "$url"; ?>" class="plus" title="Back" style="text-decoration: none; "><i class="fa fa-step-backward" aria-hidden="true"></i></a>
  </div>
</body>
</html>