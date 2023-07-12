<?php
	$db=mysqli_connect("localhost","root","","college");
	if(!$db)
	{
		die("Connection Failed:" .mysqli_connect_error());
	}
	else{
		echo "connected";
	}
?>