<?php


$con = new mysqli('localhost', 'root', '', 'campuscarpool') or die(mysqli_error());
if(isset($_POST['sub']))
{
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$bdate=$_POST['bdate'];
	$email=$_POST['email'];
	$gen = $_POST['gen'];
	$pnumber=$_POST['pnumber'];
	$pw=$_POST['pw'];
	$query=mysqli_query($con,"SELECT * FROM `user` WHERE `e-mail` LIKE '$email'");
	$row=mysqli_num_rows($query);
	if($row>0){
		echo "Email address already exist!";
	}else{
		$sorgu="INSERT INTO `user` (`user_id`, `name`, `surname`, `birthdate`, `e-mail`, `gender`, `phone_number`, `password`) VALUES (NULL, '$name', '$surname', '$bdate', '$email', '$gen', '$pnumber', '$pw');";
		if(mysqli_query($con,$sorgu)){ 
			echo "Successfully Signed Up";
		}
		else
			echo "error";
	}
	

	
}
?>