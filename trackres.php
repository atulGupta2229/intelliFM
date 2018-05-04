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
		$conn=mysqli_connect("localhost","root","","fms");
		$date=$_POST["di"];
		$file_id=$_POST["fn"];
		$query="select * from tbl_track where track_file_id='$file_id' and track_date='$date'";
		$res=mysqli_query($conn, $query);
		$data=mysqli_fetch_array($res);
		//echo $data["track_ini"].$data["track_date"]."->>>".$data["track_to"].$data["track_date_process"]."->>>".$data["track_ini"].$data["track_date_submit"];
		$ei=$data["track_ini"];
		$qryi="select emp_name,emp_pic from tbl_emp where emp_id='$ei'";
		$re=mysqli_query($conn, $qryi);
		$dataini=mysqli_fetch_array($re);
		$et=$data["track_to"];
		$qryt="select emp_name,emp_pic from tbl_emp where emp_id='$et'";
		$rt=mysqli_query($conn, $qryt);
		$datato=mysqli_fetch_array($rt);
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
  background: url(images/loader-64x/logo.gif) center no-repeat #fff;
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
<script type="text/javascript">
	
  $(document).ready(function(){
  	$("#ho").mouseover(function(){
  		$("#co1").css("filter","blur(5px)");
  		$("#cir1").css({"display":"block"});
  	});
  	$("#ho").mouseout(function(){
  		$("#co1").css("filter","blur(0px)");
  		$("#cir1").css({"display":"none"});
  	});

  	$("#ho2").mouseover(function(){
  		$("#co2").css("filter","blur(5px)");
  		$("#cir2").css({"display":"block"});
  	});
  	$("#ho2").mouseout(function(){
  		$("#co2").css("filter","blur(0px)");
  		$("#cir2").css({"display":"none"});
  	});

  	$("#ho3").mouseover(function(){
  		$("#co3").css("filter","blur(5px)");
  		$("#cir3").css({"display":"block"});
  	});
  	$("#ho3").mouseout(function(){
  		$("#co3").css("filter","blur(0px)");
  		$("#cir3").css({"display":"none"});
  	});
  });
</script>
</head>
<body background="images/1.jpg" style="background-attachment: fixed;background-size: cover; cursor: default;">
<div class="se-pre-con"></div>
	<div class="container">
	
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-1">
						
					</div>
					<div class="col-sm-10 text-center log" style="min-height: 600px; background: rgba(55,71,79,0.75); margin-top: 3%;">
					<br>
						<span class="h1 hdr" >Track File</span><br>
						<img src="images/tf.png">
						<div class="row">
							<div class="col-sm-12">
								<div class="row">
										
									</div>
									<div class="col-sm-12" style="margin-top:10%; margin-bottom: 5%; margin-left: 50px;text-shadow: 2px 2px 5px #333">
											<center>
										<div id="ho" style="background-color: rgba(0,0,0,0.6); border-radius: 100%; height: 150px; width: 150px;color: #111;display: inline-block;float: left;font-size: 27px;line-height: 90%;background-size: contain; border: 5px solid white; background-repeat: no-repeat;">
										<img id="co1" src="<?php echo $dataini["emp_pic"]; ?>" style="border-radius: 100%;transition: 0.4s; " width="100%">
											<div id="cir1" style="display: none; z-index: 999; position: relative;margin-top: -100px; font-family: candara;"><?php echo $dataini["emp_name"]; ?><br>
											<span style="font-size: 13px;"><?php echo $data["track_date"]; ?></span>
											</div>
										</div>
										<div style="height: 10px;width: 180px; background-color: rgba(0,0,0,0.6);float: left;margin-top: 73px;">
											
										</div>
										<div id="ho2" style="background-color: rgba(0,0,0,0.6); border-radius: 100%; height: 150px; width: 150px;color: #111;display: inline-block;float: left;font-size: 27px;line-height: 90%;background-size: contain; border: 5px solid white; background-repeat: no-repeat;">
										<img id="co2" src="<?php echo $datato["emp_pic"]; ?>" style="border-radius: 100%;transition: 0.4s; " width="100%">
											<div id="cir2" style="display: none; z-5dex: 999; position: relative;margin-top: -100px; font-family: candara;"><?php echo $datato["emp_name"]; ?><br>
											<span style="font-size: 13px;"><?php echo $data["track_date_process"]; ?></span>
											</div>
										</div>
										<div style="height: 10px;width: 180px; background-color: rgba(0,0,0,0.6);float: left;margin-top: 73px;">
											
										</div>
										<div id="ho3" style="background-color: rgba(0,0,0,0.6); border-radius: 100%; height: 150px; width: 150px;color: #111;display: inline-block;float: left;font-size: 27px;line-height: 90%;background-size: contain; border: 5px solid white; background-repeat: no-repeat;">
										<img id="co3" src="<?php echo $dataini["emp_pic"]; ?>" style="border-radius: 100%;transition: 0.4s; " width="100%">
											<div id="cir3" style="display: none; z-index: 999; position: relative;margin-top: -100px; font-family: candara;"><?php if($data["track_date_submit"]==null){ echo "File Not Submitted Yet!!"; }else echo $dataini["emp_name"]; ?><br>
											<span style="font-size: 13px;"><?php echo $data["track_date_submit"]; ?></span>
											</div>
										</div>
										<!--
										<div style="height: 70px; width: 10px;float: right;background-color: rgba(0,0,0,0.6);margin-right: 175px;">
											
										</div>-->
										<br><br>
										<!--<img src="images/fm.gif" width="70%" style="margin-right:100px;margin-top: 40px;opacity: 0.7">-->
										</center>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-1">
						
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