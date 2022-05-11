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
	$smoke = array();
	$food = array();
	$music = array();
	
	$dates = "";
	$startingPoints = "";
	$destinations = "";
	$times = "";
	$emptySeats = "";
	$carModels = "";
	$smokes = "";
	$foods = "";
	$musics = "";
	$userIds = "SELECT * FROM `event` WHERE `EVENT_ID` LIKE ";

	$i = 0;
	$get = mysqli_query($con, "SELECT * FROM `event_passenger` WHERE `USER_ID` LIKE '$userId'");
	$query=mysqli_query($con, "SELECT * FROM `event` WHERE `EVENT_ID` LIKE '$userIds'");

	
	$row1=mysqli_num_rows($get);
	if($row1 <= 0){
		echo "Not Found";
	}
	else{
		while ($c = mysqli_fetch_array($get)) {
			$userIds .= $c['EVENT_ID']. " OR `EVENT_ID` LIKE ";
		}
		$userIds .= " 0;";
	}

	$query=mysqli_query($con, $userIds);
	$row=mysqli_num_rows($query);
	if($row <= 0)
	{
		echo $userIds;
	}
	else
	{
		while($b = mysqli_fetch_array($query)) {
			array_push($date, $b['DATE']);
			array_push($startingPoint, $b['STARTING_POINT']);
			array_push($destination, $b['DESTINATION']);
			array_push($time, $b['Time']);
			array_push($emptySeat, $b['VACANT_SEAT_NUMBER']);
			array_push($carModel, $b['CAR_MODEL']);
			array_push($food, $b['FOOD_BEVERAGE']);
			array_push($music, $b['MUSIC_TYPE']);
			array_push($smoke, $b['SMOKE']); 
			
			$dates .= gettext($date[$i])."_"; 
			$startingPoints .= gettext($startingPoint[$i])."_";
			$destinations .= gettext($destination[$i])."_";
			$times .= gettext($time[$i])."_";
			$emptySeats .= gettext($emptySeat[$i])."_";
			$carModels .= gettext($carModel[$i])."_";
			$smokes .= gettext($smoke[$i])."_";
			$foods .= gettext($food[$i])."_";
			$musics .= gettext($music[$i])."_";
			$i++;
		}

		echo "$startingPoints~~$destinations~~$dates~~$times~~$emptySeats~~$carModels~~$foods~~$musics~~$smokes";
	}

	
}
?>
