<?php
$q=$_POST['assignment'];
$r=$_POST['tid'];
$s=$_POST['year'];
$t=$_POST['section'];
$conn=new mysqli('localhost','root','','college');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);
}else{
	$stmt= $conn->prepare("insert into assignment(assignment,tid,year,section) value(?,?,?,?)");
$stmt->bind_param("ssis",$q,$r,$s,$t);
$stmt->execute();
echo "inserted successfully";
$stmt->close();
$conn->close();
}
?>