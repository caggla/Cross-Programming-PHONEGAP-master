<?php

$con = new mysqli('localhost', 'root', '', 'campuscarpool') or die(mysqli_error());

if(isset($_POST['submit']) ) 
{
	$selectnative1 =$_POST['selectnative1'];
	$selectnative2 = $_POST['selectnative2'];
	$date1 = $_POST['date1'];
	
	$date = array();
	$startingPoint = array();
	$destination = array();
	$time = array();
	$emptySeat = array();
	$carModel = array();
	$smoke = array();
	$food = array();
	$music = array();
	$eId = array();
	$dates = "";
	$startingPoints = "";
	$destinations = "";
	$times = "";
	$emptySeats = "";
	$carModels = "";
	$smokes = "";
	$foods = "";
	$musics = "";
	$eIds = "";
	$i = 0;
	$query=mysqli_query($con, "SELECT * FROM `event` WHERE `STARTING_POINT` LIKE '$selectnative1' AND `DESTINATION` LIKE '$selectnative2' AND `DATE` LIKE '$date1' AND `VACANT_SEAT_NUMBER` > 0");

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
			array_push($time, $b['Time']);
			array_push($emptySeat, $b['VACANT_SEAT_NUMBER']);
			array_push($carModel, $b['CAR_MODEL']);
			array_push($food, $b['FOOD_BEVERAGE']);
			array_push($music, $b['MUSIC_TYPE']);
			array_push($smoke, $b['SMOKE']); 
			array_push($eId, $b['EVENT_ID']);
			$dates .= gettext($date[$i])."_"; 
			$startingPoints .= gettext($startingPoint[$i])."_";
			$destinations .= gettext($destination[$i])."_";
			$times .= gettext($time[$i])."_";
			$emptySeats .= gettext($emptySeat[$i])."_";
			$carModels .= gettext($carModel[$i])."_";
			$smokes .= gettext($smoke[$i])."_";
			$foods .= gettext($food[$i])."_";
			$musics .= gettext($music[$i])."_";
			$eIds .= gettext($eId[$i])."_";
			$i++;
		}

		echo "$startingPoints~~$destinations~~$dates~~$times~~$emptySeats~~$carModels~~$foods~~$musics~~$smokes~~$eIds";
	}

	
}
?>
