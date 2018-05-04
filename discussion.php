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
$qid=$_REQUEST["id"];
$conn=mysqli_connect("localhost","root","","fms");
$query="select * from tbl_query where query_id='$qid'";
$res=mysqli_query($conn, $query);
$data=mysqli_fetch_array($res);
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
.txt{
  border: 2px solid transparent;

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
			<div class="row" style="margin-right: 10%;margin-left: 10%; margin-top: 3%">
			<div class="col-sm-12 " style="min-height: 600px; background:rgba(66,66,66, 0.6);">
      <div class="row">
        <div class="col-sm-11" style="min-height: 550px; margin-top: 25px; margin-left: 4%; margin-right: 4%;">
        <div class="row">
        <div class="col-sm-12">
        <?php
        $empid=$data["emp_id"];
        $qry="select emp_pic from tbl_emp where emp_id='$empid'";
        $res1=mysqli_query($conn, $qry);
        $fpath=mysqli_fetch_array($res1);
        ?>
        <img src="<?php echo $fpath[0]; ?>" class="circle" style="float: left" width="80px"> &nbsp;<span style="float: left; font-size: 40px;margin-top: 26px;margin-left: 10px;text-decoration: underline;"><?php echo $data["query_title"]; ?></span>
        </div>
        </div>
        <div class="row">
          <div class="col-sm-12" style="background: rgba(66,66,66, 0.4);min-height: 140px; padding-top: 10px;">
            <img src="images/question.png" class="img" width="55px" style="float: left;margin-left: 7px;">
            <span style="font-size: 25px;margin-top: 80px; margin-left: 20px; color: #fafafa;"><?php echo $data["query_query"]; ?></span>
          </div>
        </div>
        <div class="row">

          <div class="col-sm-12" style="background: rgba(66,66,66, 0.5);height: 290px; padding-top: 8px;margin-top: 10px; overflow-y: scroll;">
          <?php
          $query="select * from tbl_answer where answer_query_id='$qid' order by answer_date desc";
          $res1=mysqli_query($conn, $query);
          while($data1=mysqli_fetch_array($res1))
          {
         ?>
            <div class="row" style="margin-top: 10px;">
              <div class="col-sm-2">
              <?php 
                $eid=$data1["emp_id"];
                $qry="select emp_pic from tbl_emp where emp_id='$eid'";
                $r=mysqli_query($conn, $qry);
                $dat=mysqli_fetch_array($r);
              ?>
                <img src="<?php echo $dat[0]; ?>" class="circle" width="70px" style="margin-left: 30px;">
              </div>
              <div class="col-sm-9" style="background: rgba(66,66,66, 0.4); min-height: 110px;">
                <p style="color: #fafafa">
                <img src="images/answer.png" width="30px" style="margin-top: 10px;margin-right: 10px;">
                  <span style="padding-top: 10px;"><p style="color: #fafafa"><?php echo $data1["answer_data"]; ?></p></span>
                </p>
                <span style="float: right; font-size: 10px; color: white;"><?php echo $data1["answer_date"]; ?></span>
              </div>
            </div>
            <?php } ?>
            <div class="row" style="margin-top: 10px;height: 240px;">
              <div class="col-sm-2">
              <?php
                $qy="select emp_pic from tbl_emp where emp_id='$uid'";
                $re=mysqli_query($conn, $qy);
                $d=mysqli_fetch_array($re);
              ?>
                <img src="<?php echo $d[0]; ?>" class="circle" width="70px" style="margin-left: 30px;">
              </div>
              <div class="col-sm-9" style="background: rgba(66,66,66, 0.5); min-height: 110px;">
                <p style="color: #fafafa">
                <img src="images/answer.png" width="30px" style="margin-top: 10px;margin-right: 10px;margin-bottom: 5px;">
                <form action="code.php?qid=<?php echo $qid; ?>&act=8&uid=<?php echo $uid; ?>" method="post">
                  <span style="padding-top: 0px;"><textarea class="txt" name="answer" required="" rows="10" style="border: none; height: 110px; margin-bottom: 10px; color: #fafafa; padding: 10px; outline: none" placeholder="Reply here..."></textarea></span>
                  <input class="btn btn-primary" type="submit" style="float: right; margin-bottom: 5px;" value="Reply">
                  </form>
                </p>
              </div>
            </div>    
          </div>
        </div>
        </div>
      </div>
			</div>			
		</div>
	</div>
	<div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create">
    <a href="index.php" class="plus" title="Logout" style="text-decoration: none; "><i class="fa fa-power-off" aria-hidden="true"></i></a>
  </div>	
  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" style="margin-bottom: 80px;">
    <a href="dboard.php" class="plus" title="Logout" style="text-decoration: none; "><i class="fa fa-step-backward" aria-hidden="true"></i></a>
  </div>
</body>
</html>