<?php
$tid=$_POST['tid'];
$password=$_POST['password'];
$time=date("h.i.sa");
$date=date("Y/m/d");
$conn=new mysqli("localhost","root","","college");
$stmt=$conn->prepare("select *from teacher where tid=? and password=?");
$stmt1=$conn->prepare("insert into loginfaculty(id,time,date) values(?,?,?)");
$stmt1->bind_param("sss",$tid,$time,$date);
$stmt1->execute();
$stmt->bind_param("ss",$tid,$password);
$stmt->execute();
$r=$stmt->get_result();
if($r->num_rows>0)
{
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
		<frame src="features-teachers.html" name="features">	
	</frame>
		<frame src="biodata-t.php" name="biodata">
	</frame>
	</frameset>
</frameset>

</body>
</html>


<?php
	}
	else{
		echo "<script>alert('invalid username/password')
	window.location.href='http://localhost/edumark-master/index.php';
	</script>";
}
	}
	
else
{
	echo "<script>alert('invalid username/password')
	window.location.href='http://localhost/edumark-master/index.php';
	</script>";
}
?>