<?php
$conn=mysqli_connect("localhost","root","","fms");
$act=$_REQUEST['act'];
switch($act){

case 1:	
		session_start();
		$type=$_POST['typ'];
		$em=$_POST['em'];
		$pw=$_POST['pw'];
		if($type=="Admin"){

			$query="select * from tbl_admin where admin_un='$em'";
			$res=mysqli_query($conn,$query) or die("error in query!!");
			$data=mysqli_fetch_array($res);
				if($data["admin_pw"]==$pw){
					$_SESSION["logval"]=1;
					$_SESSION["user"]="admin";
					header("location: dashboard.php");
				}
				else{
					header("Location: index.php");
				}
			}
		else if($type=="Employee"){
			$query="select * from tbl_emp where emp_email='$em'";
			$res=mysqli_query($conn,$query) or die("error in query!!");
			$data=mysqli_fetch_array($res);
				if($data["emp_password"]==$pw){
					$_SESSION["logval"]=1;
					$_SESSION["emp_name"]=$data["emp_name"];
					$_SESSION["user"]=$data["emp_id"];
					header("location: dashboardemp.php");
				}
				else{
					header("Location: index.php");
				}
		}
		break;

case 2:
		$nm=$_POST["nm"];
		$em=$_POST["em"];
		$pw=$_POST["pw"];
		$dept=$_POST["dept"];
		$desg=$_POST["desg"];
		$mob=$_POST["mob"];
		
		$fn=$_FILES["ufile"]["name"];
		$tmp_name=$_FILES["ufile"]["tmp_name"];
		$type=$_FILES["ufile"]["type"];
		$size=$_FILES["ufile"]["size"];
		$location="images/uploads/";
		$pic=$location.$em.$fn;
		$query="INSERT INTO `tbl_emp`(`emp_name`, `emp_email`, `emp_password`, `emp_department`, `emp_designation`, `emp_mobile`, `emp_pic`, `doj`) VALUES ('$nm','$em','$pw','$dept','$desg','$mob','$pic',curdate())";


		if($type=='image/jpg'||$type=='image/png'||$type=='image/jpeg'){
			mysqli_query($conn,$query);
			move_uploaded_file($tmp_name,$pic);	
		}
		else{
			echo "Invalid file type!!!";
			}	
		header("Location: dashboard.php");
		break;
case 3:
		$from=$_POST["from_id"];
		$fn=$_POST["fn"];
		$sendto=$_POST["send"];
		$purpose=$_POST["pr"];
		$follow=$_POST["follow"];
		$remark=$_POST["remark"];
		$cdate=date("Y-m-d");
		echo $cdate;
		$query="INSERT INTO `tbl_pending`(`file_id`, `file_from`, `file_to`, `file_follow`, `file_remark`, `file_purpose`, `file_date`) VALUES('$fn','$from','$sendto','$follow','$remark','$purpose','$cdate')";
		mysqli_query($conn,$query);
		$qry="INSERT INTO `tbl_track`(`track_file_id`, `track_ini`, `track_to`, `track_date`) VALUES('$fn','$from','$sendto','$cdate')";
		mysqli_query($conn, $qry);
		if($from=="admin"){
			header("Location: dashboard.php");
		}
		else{
			header("Location: dashboardemp.php");
		}
		break;
case 4:
		$fid=$_REQUEST["fid"];
		$query1="select * from tbl_pending where file_id='$fid'";
		$res=mysqli_query($conn,$query1);
		$data=mysqli_fetch_array($res);
		$id=$data["file_id"];
		$from=$data["file_from"];
		$to=$data["file_to"];
		$follow=$data["file_follow"];
		$remark=$data["file_remark"];
		$purpose=$data["file_purpose"];
		$query3="INSERT INTO `tbl_processing`(`file_id`, `file_from`, `file_to`, `file_follow`, `file_remark`, `file_purpose`) VALUES ('$id','$from','$to','$follow','$remark','$purpose')";
		mysqli_query($conn,$query3) or die("Error");
		$query2="delete from tbl_pending where file_id='$fid'";
		mysqli_query($conn,$query2);
		$qry="update tbl_track set track_date_process='$curdate' where track_file_id='$fid'";
		mysqli_query($conn, $qry);
		header("Location: pending.php");		
		break;
case 6:
		$fid=$_REQUEST["fid"];
		echo $fid;
		$query1="select * from tbl_processing where file_id=$fid";
		$res=mysqli_query($conn, $query1);
		$data=mysqli_fetch_array($res);
		$frm=$data["file_from"];
		$file_to=$data["file_to"];
		$file_follow=$data["file_follow"];
		$file_remark=$data["file_remark"];
		$file_purpose=$data["file_purpose"];
		$query2="INSERT INTO `tbl_complete`(`file_id`, `file_from`, `file_to`, `file_follow`, `file_remark`, `file_purpose`) VALUES ('$fid','$frm','$frm','$file_follow','$file_remark','$file_purpose')";
		mysqli_query($conn, $query2);
		$query3="delete from tbl_processing where file_id='$fid'";
		mysqli_query($conn, $query3);
		$curdate=date("Y-m-d");
		$qry="update tbl_track set track_date_submit='$curdate' where track_file_id='$fid'";
		mysqli_query($conn, $qry);
		header("Location: dashboardemp.php");
		break;
case 7:	
		session_start();
		$title=$_POST["title"];
		$qry=$_POST["qry"];
		$id=$_SESSION["user"];
		echo "$id";
		$query="INSERT INTO `tbl_query`(`query_title`, `emp_id`, `query_query`, `query_date`) VALUES ('$title','$id','$qry',now())";
		mysqli_query($conn, $query);
		header("location: dboard.php");
		break;

case 8:
		$uid=$_REQUEST["uid"];
		$ans=$_POST["answer"];
		$qid=$_REQUEST["qid"];

		$query="INSERT INTO `tbl_answer`(`emp_id`, `answer_query_id`, `answer_data`, `answer_date`) VALUES ('$uid','$qid','$ans',now())";
		mysqli_query($conn,$query);
		header("location: discussion.php?id=".$qid);
		break;
case 9:
		$date=$_POST["di"];
		$file_id=$_POST["fn"];
		$query="select * from tbl_track where track_file_id='$file_id' and track_date='$date'";
		$res=mysqli_query($conn, $query);
		$data=mysqli_fetch_array($res);
		echo $data["track_ini"].$data["track_date"]."->>>".$data["track_to"].$data["track_date_process"]."->>>".$data["track_ini"].$data["track_date_submit"];
		break;

		default: echo "Invalid";
}
?>