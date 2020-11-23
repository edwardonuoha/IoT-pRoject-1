<?php 
session_start();
include ('connection.php');
 if(isset($_POST['submit'])){
 	$email_exist="SELECT * FROM user
WHERE email='".$_POST['email']."'";
$result2=mysqli_query($con,$email_exist);
if (mysqli_num_rows($result2)>=1) {
$_SESSION["success"]="Email Already Exist.Please Try With Another Email.";
header('Location:register.php');
}else {
$sql_insert = "INSERT INTO user (name, email,phone,password) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['phone']."','".md5($_POST['pass'])."')";
$result=mysqli_query($con,$sql_insert);
if($result=='1')
{
$_SESSION["success"]="User Added Successfully.";
header('Location:index.php');

}
else
{
$_SESSION["success"]="Error is ".mysqli_error($con );
header('Location:register.php');

}
}
}


if(isset($_POST['assign_building'])){
 	$user_exist="SELECT * FROM assign_building
WHERE user_id='".$_POST['user_id']."' AND building_id='".$_POST['building_id']."'";
$result2=mysqli_query($con,$user_exist);
if (mysqli_num_rows($result2)>=1) {
$_SESSION["success"]="User Already Assigned to This Building.Try Another User.";
header('Location:assign.php');
}else {
$sql_insert = "INSERT INTO assign_building (user_id, building_id) VALUES ('".$_POST['user_id']."', '".$_POST['building_id']."')";
$result=mysqli_query($con,$sql_insert);
if($result=='1')
{
$_SESSION["success"]="User Assigned to Building Successfully.";
header('Location:assign.php');

}
else
{
$_SESSION["success"]="Error is ".mysqli_error($con );
header('Location:assign.php');

}
}
}








 if(isset($_POST['login'])){
 	$email_exist="SELECT * FROM user
WHERE email='".$_POST['email']."' AND password='".md5($_POST['pass'])."'";
$result2=mysqli_query($con,$email_exist);
if (mysqli_num_rows($result2)==0){
$_SESSION["error"]="Email Or Password Is Invalid!!";
header('Location:index.php');
}else {
	while($row = mysqli_fetch_array($result2)){
		$_SESSION['id']=$row['id'];
		$_SESSION['name']=$row['name'];
		$_SESSION['email']=$row['email'];
		$_SESSION['role']=$row['role'];
	}
	header('Location:dashboard.php');
}
}

 if(isset($_POST['add_user'])){
 	$email_exist="SELECT * FROM user
WHERE email='".$_POST['email']."'";
$result2=mysqli_query($con,$email_exist);
if (mysqli_num_rows($result2)>=1) {
$_SESSION["error"]="Email Already Exist.Please Try With Another Email.";
header('Location:add_user.php');
}else {
$sql_insert = "INSERT INTO user (name, email,password,phone,role) VALUES ('".$_POST['name']."', '".$_POST['email']."','".md5($_POST['pass'])."','".$_POST['phone']."','".$_POST['role']."')";
$result=mysqli_query($con,$sql_insert);
if($result=='1')
{
$_SESSION["success"]="User Added Successfully.";
header('Location:user_list.php');

}
else
{
$_SESSION["error"]="Error is ".mysqli_error($con );
header('Location:add_user.php');

}
}
}
 if(isset($_GET['id'])){
$delete_user="DELETE FROM user
WHERE id='".$_GET['id']."'";
$result2=mysqli_query($con,$delete_user);
$_SESSION["success"]="User Deleted Successfully.";
header('Location:user_list.php');
 }

 if(isset($_POST['add_record'])){
$data=date("Y-m-d h:i:s", strtotime($_POST['event']));
$sql_insert = "INSERT INTO data (building_id,event,temperature,humidity,ppm) VALUES ('".$_POST['building_id']."','$data','".$_POST['temp']."','".$_POST['hum']."','".$_POST['ppm']."')";
$result=mysqli_query($con,$sql_insert);
if($result=='1')
{
$_SESSION["success"]="Record Added Successfully.";
header('Location:dashboard.php');

}
else
{
$_SESSION["error"]="Error is ".mysqli_error($con );
header('Location:add_record.php');

}

}


 if(isset($_POST['add_greenhouse'])){
 	$email_exist="SELECT * FROM user
WHERE email='".$_POST['email']."'";
$result2=mysqli_query($con,$email_exist);
if (mysqli_num_rows($result2)>=1) {
$_SESSION["error"]="Email Already Exist.Please Try With Another Email.";
header('Location:add_greenhouse.php');
}else {
$sql_insert = "INSERT INTO building (name, email,address,phone) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['address']."', '".$_POST['phone']."')";
$result=mysqli_query($con,$sql_insert);
if($result=='1')
{
$_SESSION["success"]="Building Added Successfully.";
header('Location:add_greenhouse.php');

}
else
{
$_SESSION["error"]="Error is ".mysqli_error($con );
header('Location:add_greenhouse.php');

}
}
}



?>