<?php


$con = new mysqli('localhost', 'root', '', 'campuscarpool') or die(mysqli_error());
if(isset($_POST['submit']))
{
	$userID=$_POST['userId'];
	$eventID=$_POST['eventId'];
	$control =mysqli_query($con, "SELECT * FROM `event_passenger` WHERE `EVENT_ID` LIKE '$eventID' AND `USER_ID` LIKE '$userID';");
	$control1 =mysqli_query($con, "SELECT * FROM `event` WHERE `USER_ID` LIKE '$userID' AND `EVENT_ID` LIKE '$eventID';");
	$sorgu="INSERT INTO `event_passenger` (`EVENT_ID`, `USER_ID`) VALUES ('$eventID', '$userID');";
	$sorgu1 = "UPDATE `event` SET `VACANT_SEAT_NUMBER` = VACANT_SEAT_NUMBER-1 WHERE `event`.`EVENT_ID` = '$eventID';";
	$row=mysqli_num_rows($control);
	$row1 =mysqli_num_rows($control1);
	if($row1 <= 0){
		if($row <= 0)
		{
			if(mysqli_query($con,$sorgu) && (mysqli_query($con,$sorgu1))){ 
				echo "Successfully Joined";
			}
			else
				echo "Failed";
		}
		else{
			echo "You have already joined this event!";
		}
	}else echo "You can't join your own event by passenger!";
}
?>