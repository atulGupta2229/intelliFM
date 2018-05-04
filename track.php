<?php
session_start();
if($_SESSION["logval"]!=1){
	header("Location: index.php");
}
$uid=$_SESSION['user'];
if($uid=="admin"){
	$url="dashboard.php";
}
else{
	$url="dashboardemp.php";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FMS</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap3.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<style type="text/css">
		.hdr{
			font-family: 'Josefin Sans', cursive;
			font-size: 3.5em;
			color: #8bc34a;
		}
		
		input[type="text"]{
			color: #fafafa;
		}
		input[type="password"]{
			color: #fafafa;
		}
		.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/loader-64x/loading_animation.gif) center no-repeat #000011;
  background-border:none;
}
	</style>
<script>
  //paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
</script>
</head>
<body background="images/1.jpg" style="background-attachment: fixed;background-size: cover;">
<div class="se-pre-con"></div>
	<div class="container">
			<div class="row" style="margin-top: 7%;">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-6 text-center log" style="min-height: 400px; background: rgba(55,71,79,0.75); margin-top: 3%;">
					<br>
						<span class="h1 hdr" >Track File</span><br>
						<img src="images/tf.png">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-1">
										
									</div>
									<div class="col-sm-10" style="margin-top: 5%; margin-bottom: 5%;">
									<form action="trackres.php" method="post">
										
										<div class="input-group">
  											<span class="input-group-addon" id="basic-addon1" style=" border: 2px solid  #8bc34a; border-right: none;"><img src="images/initiateFile.png" width="20px"></span>
  											<input type="text" class="form-control" name="fn" style="background: rgba(55,71,79,0.4); border: 2px solid  #8bc34a;height: 40px;" placeholder="Enter File number..." required=""  aria-describedby="basic-addon1">
										</div>
										<br><br>
										<div class="input-group">
  											<span class="input-group-addon" id="basic-addon1" style=" border: 2px solid  #8bc34a; border-right: none;"><img src="images/calender.png" width="20px"></span>
  											<input type="date" class="form-control" name="di" style=" border: 2px solid  #8bc34a;height: 40px;" placeholder="Date Initiated (yyyy-mm-dd)..." required=""  aria-describedby="basic-addon1">
										</div><br>
										<button type="submit" class="btn btn-primary" style="font-family: 'Josefin Sans', cursive;padding: 2% 3% 2% 3%; font-size: 1.5em; background-color:  #8bc34a; border: none; color: #f1f8e9">Track<ins></ins></button><br><br>
									</div>
									</form>
									<div class="col-sm-1">
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						
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