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

	<title>Discussion Board</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

  <!-- Compiled and minified JavaScript -->
  <script src="js/materialize.min.js"></script>
          
	<style type="text/css">
		.main{
  min-height: 500px;
  background: rgba(55, 71, 79, 0.7);
  margin-top: 2%;
  margin-bottom: 2%;
  padding-left: 6%;
  padding-right: 6%; 
}
::-webkit-scrollbar{
	display: none;
	}
a{
	color: #B0BEC5;
}
ul li a{
	cursor: default;
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
.tag{
	min-height: 60px;
	background: rgba(0,0,0,0.3);
	transition: 0.4s;
	cursor: default;
}
.tag:hover{
	background: rgba(0,0,0,0.5);
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
<body background="images/1.jpg" style="background-size: cover;background-attachment: fixed; background-repeat: no-repeat;"> 
	<div class="se-pre-con"></div>
	<div class="container-fluid">
			<div class="row" style="margin-right: 2%;margin-left: 2%; margin-top: 4%">
			<div class="col-sm-12 text-center">
				<div class="row">
					<div class="col-sm-1">
						
					</div>
					<div class="col-sm-10 main"><br><br>
								<img src="images/discuss.png" width="120px"><br><br>
	       <form action="code.php?act=7" method="post">
          <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" style=" border: 2px solid  #8bc34a; border-right: none;"><img src="images/querytitle.png" width="20px"></span>
                        <input type="text" class="form-control" name="title" style="color: #fafafa ;background: rgba(55,71,79,0.4); border: 2px solid  #8bc34a;height: 40px;" placeholder="Query Title..." required=""  aria-describedby="basic-addon1">
                    </div><br>
                    <textarea class="form-control" rows="5" style="color: #fafafa ;border: 2px solid  #8bc34a; background: transparent;" placeholder="Query..." name="qry"></textarea><br>
                    <button class="btn btn-primary" type="submit" style="font-family: 'Josefin Sans', cursive;padding: 2% 3% 2% 3%; font-size: 1.5em; background-color:  #8bc34a; border: none; color: #f1f8e9"">Start Discussion</button> &nbsp;&nbsp;<button class="btn btn-primary" type="submit" style="font-family: 'Josefin Sans', cursive;padding: 2% 3% 2% 3%; font-size: 1.5em; background-color:  #8bc34a; border: none; color: #f1f8e9">Reset</button> 
         </form>
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
    <a href="<?php echo "$url"; ?>" class="plus" title="Logout" style="text-decoration: none; "><i class="fa fa-step-backward" aria-hidden="true"></i></a>
  </div>
  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" style="margin-bottom: 160px;"><center>
    <a href="startD.php"><img src="images/startDiscussion.png" width="30px" title="Start Discussion" style="margin: 14px;"></a></center>
  </div>
</body>
</html>