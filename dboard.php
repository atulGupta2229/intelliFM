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
	<link rel="stylesheet" href="css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="js/materialize.min.js"></script>
          
	<style type="text/css">
		.main{
  min-height: 600px;
  background: rgba(55, 71, 79, 0.7);
  margin-top: 0%;
  margin-bottom: 0%;
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
			<div class="row" style="margin-right: 2%;margin-left: 2%; margin-top: 5%">
			<div class="col-sm-12 text-center">
				<div class="row">
					<div class="col-sm-1">
						
					</div>
					<div class="col-sm-10 main"><br>
								<img src="images/discuss.png" width="120px"><br><br>
	<nav class="nav-extended" style="background-color: #263238;">
    <div class="nav-content">
      <ul class="tabs tabs-transparent text-center">
        <li class="tab" style="width: 33%"><a href="#test1" style="text-decoration: none;">Latest Discussions</a></li>
        <li class="tab" style="width: 33%"><a href="#test2" style="text-decoration: none;">View All</a></li>
        <li class="tab" style="width: 33%"><a href="#test4" style="text-decoration: none;">My Discussion</a></li>
      </ul>
    </div>
  </nav>
  <div id="test1" class="col s12" style="min-height: 350px; background: rgba(0,0,0,0.4);margin-bottom: 2%;overflow-y: auto; height: 400px;"><br>
  <?php
    $conn=mysqli_connect("localhost","root","","fms");
    $query="select * from tbl_query order by query_date desc limit 0,5";
    $res1=mysqli_query($conn, $query);
    while($data1=mysqli_fetch_array($res1)){   
  ?>
  	<div class="row">
  		<div class="col-sm-12">
  			<div class="col-sm-12 tag">
  			<a href="discussion.php?id=<?php echo $data1["query_id"]; ?>">
        <div class="row">
  				<div class="col-sm-4">
          <?php
          $empid=$data1["emp_id"];
          $qry="select emp_pic from tbl_emp where emp_id='$empid'";
          $res2=mysqli_query($conn, $qry);
          $data2=mysqli_fetch_array($res2);
          ?>
  					<img class="circle" src="<?php echo $data2[0]; ?>" width="60px" style=" margin-left: 2px;padding: 4px;">
  				</div>
  				<div class="col-sm-8" style="margin-top: 10px;">
  				 <span style="font-family: candara; font-size: 1.7em;"><?php echo $data1["query_title"]; ?></span>
  				 </div>
  			</div>
        </a>
  			</div>
  		</div>
  	</div></a>
    <?php
  }
    ?>
  </div>
  <div id="test2" class="col s12" style="background: rgba(0,0,0,0.4);margin-bottom: 2%;overflow-y: auto; height: 400px;"><br>
  <?php
    $conn=mysqli_connect("localhost","root","","fms");
    $query="select * from tbl_query order by query_date desc";
    $res1=mysqli_query($conn, $query);
    while($data1=mysqli_fetch_array($res1)){   
  ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-12 tag">
        <a href="discussion.php?id=<?php echo $data1["query_id"]; ?>">
        <div class="row">
          <div class="col-sm-4">
          <?php
          $empid=$data1["emp_id"];
          $qry="select emp_pic from tbl_emp where emp_id='$empid'";
          $res2=mysqli_query($conn, $qry);
          $data2=mysqli_fetch_array($res2);
          ?>
            <img class="circle" src="<?php echo $data2[0]; ?>" width="60px" style=" margin-left: 2px;padding: 4px;">
          </div>
          <div class="col-sm-8" style="margin-top: 10px;">
           <span style="font-family: candara; font-size: 1.7em;"><?php echo $data1["query_title"]; ?></span>
           </div>
        </div>
        </a>
        </div>
      </div>
    </div></a>
    <?php
  }
    ?>
  	</div>
  <div id="test4" class="col s12" style="height: 400px; background: rgba(0,0,0,0.4);margin-bottom: 2%;"><br>
    <?php
    $conn=mysqli_connect("localhost","root","","fms");
    $query="select * from tbl_query where emp_id='$uid' order by query_date desc";
    $res1=mysqli_query($conn, $query);
    while($data1=mysqli_fetch_array($res1)){   
  ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-12 tag">
        <a href="discussion.php?id=<?php echo $data1["query_id"]; ?>">
        <div class="row">
          <div class="col-sm-4">
          <?php
          $empid=$data1["emp_id"];
          $qry="select emp_pic from tbl_emp where emp_id='$empid'";
          $res2=mysqli_query($conn, $qry);
          $data2=mysqli_fetch_array($res2);
          ?>
            <img class="circle" src="<?php echo $data2[0]; ?>" width="60px" style=" margin-left: 2px;padding: 4px;">
          </div>
          <div class="col-sm-8" style="margin-top: 10px;">
           <span style="font-family: candara; font-size: 1.7em;"><?php echo $data1["query_title"]; ?></span>
           </div>
        </div>
        </a>
        </div>
      </div>
    </div></a>
    <?php
  }
    ?>
  </div>
        
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