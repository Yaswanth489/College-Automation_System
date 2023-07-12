<?php
	$v1=$_POST['tid'];
	$v2=$_POST['name'];
	$v3=$_POST['department'];
	$v4=$_POST['mobile'];
	$v5=$_POST['email'];
	$v6=$_POST['password'];
	$conn=new mysqli('localhost','root','','college');
	$query=$conn->prepare("update teacher set name=?,department=?,mobile=?,email=?,password=? where tid=?");
	echo $v2;
	echo $v3;
	echo $v1;
	echo $v4;
	echo $v5;
	echo $v6;
	$query->bind_param("ssssss",$v2,$v3,$v4,$v5,$v6,$v1);
	$query->execute();
	echo "updated successfully";
	$conn->close();

?>