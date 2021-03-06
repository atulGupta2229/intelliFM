<?php
session_start();
if($_SESSION["logval"]!=1){
	header("Location: index.php");
}
$user=$_SESSION["user"];
$conn=mysqli_connect("localhost","root","","fms");
$query="SELECT COUNT(*),file_date FROM tbl_pending WHERE file_to='$user'";
$respen=mysqli_query($conn, $query);
$datapen=mysqli_fetch_array($respen);
$qry="SELECT COUNT(*) FROM tbl_processing WHERE file_to='$user'";
$respro=mysqli_query($conn, $qry);
$datapro=mysqli_fetch_array($respro);
$qr="SELECT COUNT(*) FROM tbl_complete";
$rescom=mysqli_query($conn, $qr);
$datacom=mysqli_fetch_array($rescom);
?>
<!DOCTYPE html>
<html>
<head>
	<title>FileMovementSystem | Dashboard</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap3.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
  //paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
</script>
	<style type="text/css">
	a:hover{
		text-decoration: none;
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
}
::-webkit-scrollbar{
	display: none;
}

		.crd{
			min-height: 150px;
			background: rgba(55, 71, 79, 0.7);
			box-shadow: 2px 2px 5px #111;
			transition: 0.5s;
			margin: 0%;
		}
		.crd:hover{
				background: rgba(55, 71, 71, 1);
		}
		.action-txt{
			color: #fafafa;
			font-family: Candara;
			font-size: 20px;
		}
		a{
			cursor: default;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#close").click(function(){
				$("#noti").hide(300);
			});
		});
	</script>
</head>
<body background="images/1.jpg" style="background-size: cover; background-attachment: fixed;">
<div class="se-pre-con"></div>
<center>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 text-center" style="margin-top: 3%; margin-bottom: 4%;">
			<span style="font-family: Candara; font-size: 55px;">Welcome, <?php echo $_SESSION["emp_name"]; ?>.</span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
		
		<?php 
			$dpen=$datapen["file_date"];
			$dp=date_create($dpen);
			$cdate=date_create(date("Y-m-d"));
			$diff=date_diff($dp ,$cdate);
			//echo $diff->format("%a");
			if($diff->format("%a")>=3){
		?>
		<div id="noti" style="width: 645px; background-color: rgba(254,0,0,0.6);min-height: 40px; border-radius: 3px 3px 3px 3px; margin-bottom: 1%; padding-top: 8px;color: #222; font-size: 18px;font-family: candara">
		<?php
		echo "Some Files are pending since 3 or more days!!";
		?>
			<span style="float: right;margin-right: 13px;"><a href="#" id="close"><i class="fa fa-times-circle" aria-hidden="true"></i></a></span>
		</div>
		<?php
		}
		?>
			<div class="row" style="margin-left: 2%; margin-right: 2%;">
			<div class="col-sm-3">
				
			</div>
				<a href="initiate.php">
				<div class="col-sm-2 crd">
				<center>
					<img src="images/initiateFile.png" class="img" width="70px" style="margin-top: 5%"><br><br>
					<span class="action-txt">Initiate File</span>
					</center>
				</div>
				<a href="pending.php">
				<div class="col-sm-2 crd">
				<center>
					<img src="images/pending.png" class="img" width="70px" style="margin-top: 5%"><br><br>
					<span class="action-txt">Files Pending</span>
					<?php 
					if($datapen[0]!=0||$datapen[0]=null)
					echo "<span class=\"badge\" style=\"background-color: #f44336; position: relative; z-index: 999;margin-left: 7px;margin-bottom: 17px;\">".$datapen[0]."</span>"; 
					else{
						echo "";
					}
					?>
					</center>
				</div></a>
				</a>
				<a href="processing.php">
				<div class="col-sm-2 crd">
				<center>
					<img src="images/processing.png" class="img" width="70px" style="margin-top: 5%"><br><br>
					<span class="action-txt">Files Processing</span>
					<?php 
					if($datapro[0]!=0||$datapro[0]=null)
					echo "<span class=\"badge\" style=\"background-color: #2196F3; position: relative; z-index: 999;margin-left: 7px;margin-bottom: 17px;\">".$datapro[0]."</span>"; 
					else{
						echo "";
					}
					?>
					</center>
				</div>
				</a>
				
				<div class="col-sm-2">
					
				</div>
			</div>
		</div>

	</div>
	<div class="row" style=" margin-bottom: 5%;">
		<div class="col-sm-12">
			<div class="row" style="margin-left: 2%; margin-right: 2%;">
			
				<div class="col-sm-3">
					
				</div>
				<a href="complete.php">
				<div class="col-sm-2 crd">
				<center>
					<img src="images/completed.png" class="img" width="70px" style="margin-top: 5%"><br><br>
					<span class="action-txt">Files Completed</span>
					<?php 
					if($datacom[0]!=0||$datacom[0]=null)
					echo "<span class=\"badge\" style=\"background-color: #8BC34A; position: relative; z-index: 999;margin-left: 7px;margin-bottom: 17px;\">".$datacom[0]."</span>"; 
					else{
						echo "";
					}
					?>
					</center>
				</div>
				</a>
				<a href="dboard.php">
				<div class="col-sm-2 crd">
				<center>
					<img src="images/discuss.png" class="img" width="70px" style="margin-top: 10%"><br><br>
					<span class="action-txt">Discussion Board</span>
					</center>
				</div>
				</a>
				<a href="track.php">
				<div class="col-sm-2 crd">
				<center>
					<img src="images/tf.png" class="img" width="70px" style="margin-top: 5%"><br><br>
					<span class="action-txt">Track File</span>
					</center>
				</div>
				</a>
				<div class="col-sm-1">
				</div>
			</div>
		</div>
	</div>
</div>
</center>
<div id="container-floating">
  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create">
    <a href="index.php" class="plus" title="Logout" style="text-decoration: none; "><i class="fa fa-power-off" aria-hidden="true"></i></a>
  </div>
</div>
</body>
</html>