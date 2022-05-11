<?php

$con = new mysqli('localhost', 'root', '', 'campuscarpool') or die(mysqli_error());

if(isset($_POST['submit']) ) 
{
	$userId =$_POST['userId'];
	
	
	$date = array();
	$startingPoint = array();
	$destination = array();
	$time = array();
	$emptySeat = array();
	$carModel = array();
	
	
	$dates = "";
	$startingPoints = "";
	$destinations = "";
	$times = "";
	$emptySeats = "";
	$carModels = "";
	$smokes = "";
	$foods = "";
	$musics = "";
	
	$i = 0;
	$query=mysqli_query($con, "SELECT * FROM `event` WHERE `USER_ID` LIKE '$userId'");

	$row=mysqli_num_rows($query);
	
	if($row <= 0)
	{
		echo "Not Found";
	}
	else
	{
		while($b = mysqli_fetch_array($query)) {
			array_push($date, $b['DATE']);
			array_push($startingPoint, $b['STARTING_POINT']);
			array_push($destination, $b['DESTINATION']);
			array_push($time, $b['TIME']);
			array_push($emptySeat, $b['VACANT_SEAT_NUMBER']);
			array_push($carModel, $b['CAR_MODEL']);
			 
			$dates .= gettext($date[$i])."_"; 
			$startingPoints .= gettext($startingPoint[$i])."_";
			$destinations .= gettext($destination[$i])."_";
			$times .= gettext($time[$i])."_";
			$emptySeats .= gettext($emptySeat[$i])."_";
			$carModels .= gettext($carModel[$i])."_";
			$i++;
		}

		echo "$startingPoints~~$destinations~~$dates~~$times~~$emptySeats~~$carModels";
	}

	
}
?>
