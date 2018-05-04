<?php
$conn=mysqli_connect("localhost","root","","fms");
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
$query="select * from tbl_processing where file_to='$uid'";
$res=mysqli_query($conn, $query);
$qry="select * from tbl_emp";
$res1=mysqli_query($conn, $qry);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Files Processing</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript">
			$(document).ready(function(){
				$(".frwd").click(function(){
					$(".frwdto").ready();
				});
			});
		</script>
		<script>
  //paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
</script>
	<style type="text/css">
		.main{
  min-height: 550px;
  background: rgba(55, 71, 79, 0.7);
  margin-top: 2%;
  margin-bottom: 5%; 
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
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(images/loader-64x/ld1.gif) center no-repeat #fff;
}

</style>

</head>
<body background="images/1.jpg" style="background-size: cover;background-attachment: fixed; background-repeat: no-repeat;"> 
	<div class="se-pre-con"></div>
	<div class="container-fluid">
			<div class="row" style="margin-left: 2%; margin-right: 2%;">
			<div class="col-sm-12 text-center"><br><img src="images/processing.png" width="50px" style="padding-bottom: 15px;">
				<span class="h1" style="font-family: candara; font-size: 40px;">Files Processing</span>
				<br><br>
				<div class="row">
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-8 main">
						<table class="table table-resposive .table-striped .table-hover" style="margin-top: 2%;">
							<thead class="thead-inverse" style="width: 100%;">
								<tr>
									<th>
										File ID
									</th>
									<th>
										From
									</th>
									<th>
										Purpose
									</th>
									<th>
										Follow
									</th>
									<th>
										Remark
									</th>
									<th colspan="2">
										Action
									</th>
								</tr>
							</thead>
							<tbody>
							<?php
								while($data=mysqli_fetch_array($res))
								{
							?>
								<tr>
									<td><?php echo $data["file_id"]; ?></td>
									
									<td><?php echo $data["file_from"]; ?></td>
									<td><?php echo $data["file_purpose"]; ?></td>
									<td>
										<?php echo $data["file_follow"]; ?>
									</td>
									<td>
										<?php echo $data["file_remark"]; ?>
									</td>
									<td>
										<img class="frwd" src="images/forward.png" title="Forward" width="30px"></a>
										<br>
										<div style="display: none;" class="frwdto">
									<?php while($dat=mysqli_fetch_array($res1))
									{ 
										?>
											<a href="code.php?act=5&fid=<?php echo $data["file_id"]; ?>" style="text-decoration: none;"><?php echo $dat["emp_name"]; ?></a><br>
											<?php } ?>
										</div>
									</td>
									<td>
										<a href="code.php?act=6&fid=<?php echo $data["file_id"]; ?>"><img src="images/completed.png" title="Submit" width="30px"></a>
									</td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
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