<?php
$sid=$_POST['sid'];
$password=$_POST['password'];
$time=date("h.i.sa");
$date=date("Y/m/d");
$conn=new mysqli("localhost","root","","college");
$stmt=$conn->prepare("select *from student where sid=? and password=?");
$stmt1=$conn->prepare("insert into login(id,time,date) values(?,?,?)");
$stmt->bind_param("ss",$sid,$password);
$stmt->execute();
$r=$stmt->get_result();
if($r->num_rows>0)
{
	$stmt1->bind_param("sss",$sid,$time,$date);
	$stmt1->execute();
	$data=$r->fetch_assoc();
	if($data['password'] === $password)
	{
		
		?>
		<!DOCTYPE>
		<html>
		<head>
			
		</head>
		<frameset rows="20%,*" bordercolor="skyblue">
	<frame src="title-1.html" name="title">
</frame>
	<frameset cols="30%,*" bordercolor="skyblue">
		<frame src="features-students.html" name="features">	
	</frame>
		<frame src="biodata.php" name="biodata">
	</frame>
	</frameset>
</frameset>

</body>
</html>


<?php
	}
	else{
		echo "<script>alert('invalid username/password')
	window.location.href='http://localhost/college-automation-system/index.php';
	</script>";
}
	
}
else
{
	echo "<script>alert('invalid username/password')
	window.location.href='http://localhost/college-automation-system/index.php';
	</script>";
}

?>