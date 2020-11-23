<?php
include ('connection.php');
$building_id="SELECT * FROM building
WHERE name='".$_GET["name"]."';";
$row=mysqli_query($con,$building_id);
foreach($row as $ofr){
   $building_id=$ofr['id'];
   $building_mail=$ofr['email'];
   $building_name=$ofr['name'];
}
$sql_insert = "INSERT INTO data (building_id,temperature, humidity,ppm) VALUES ('$building_id','".$_GET["temperature"]."', '".$_GET["humidity"]."', '".$_GET["ppm"]."')";

if(mysqli_query($con,$sql_insert))
{
if (($_GET['temperature']>30 || $_GET["humidity"]>80 ||$_GET["ppm"]>1.00) ||($_GET['temperature']>30 && $_GET["humidity"]>80 & $_GET["ppm"]>1.00) ) {
include "mail.php";
}
mysqli_close($con);
}
else
{
echo "error is ".mysqli_error($con );
}
?>