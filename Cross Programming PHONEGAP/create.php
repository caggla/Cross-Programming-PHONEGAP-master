<?php


$con = new mysqli('localhost', 'root', '', 'campuscarpool') or die(mysqli_error());
if(isset($_POST['sub']))
{
	$from=$_POST['from'];
	$to=$_POST['to'];
	$time=$_POST['time'];
	$date=$_POST['date'];
	$nof = $_POST['nof'];
	$cModel=$_POST['cModel'];
	$cigarette=$_POST['cigarette'];
	$ed=$_POST['ed'];
	$music=$_POST['music'];
	$id =$_POST['id'];
	$sorgu="INSERT INTO `event` (`EVENT_ID`, `STARTING_POINT`, `DESTINATION`, `DATE`, `Time`, `USER_ID`, `ACTIVITY_STATUS`, `CAR_MODEL`, `VACANT_SEAT_NUMBER`, `SMOKE`, `FOOD_BEVERAGE`, `MUSIC_TYPE`) VALUES (NULL, '$from', '$to', '$date', '$time', '$id', 'T', '$cModel', '$nof', '$cigarette', '$ed', '$music');";
	
	if(mysqli_query($con,$sorgu)){ 
		echo "Successfully Created";
	}
	else
		echo "Failed";
}
?>
