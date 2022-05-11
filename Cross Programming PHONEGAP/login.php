<?php

$con = new mysqli('localhost', 'root', '', 'campuscarpool') or die(mysqli_error());;

if(isset($_POST['submit']) ) 
{
	
	$email2 = $_POST['email2'];
	$password2 = $_POST['password2'];
	$key = "";
	$name = "";
	$surname = "";
	$bdate = "";
	$email ="";
	$pnumber = "";
	$query=mysqli_query($con, "SELECT * FROM `user` WHERE `e-mail` LIKE '$email2' AND `password` LIKE '$password2';");
	
	$row=mysqli_num_rows($query);
	if($row <= 0)
	{
		echo "Invalid ID Password";
	}
	else
	{
		while($b = mysqli_fetch_array($query)) {
		$key = $b['USER_ID'];
		$name = $b['NAME'];
		$surname = $b['SURNAME'];
		$bdate = $b['BIRTHDATE'];
		$email = $b['E-MAIL'];
		$pnumber = $b['PHONE_NUMBER'];	 
	}
		echo "$key"."_"."$name"."_"."$surname"."_"."$bdate"."_"."$email"."_"."$pnumber";
	}

	
}