<?php 

	//connect to database
	$conn = mysqli_connect('localhost', 'Michi19935','freedum30', 'ninja_pizza');

	//check connection
	if(!$conn){
		echo 'Connection Error' . mysqli_connect_error();
	}


?>