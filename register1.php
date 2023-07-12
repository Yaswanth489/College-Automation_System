<?php
$conn=new mysqli('localhost','root','','college');
if(isset($_POST['parent'])) {
	$t1=$_POST['email'];
	$t2=$_POST['password'];
	$t3=$_POST['cpassword'];
    echo $t1;
    echo $t2;
    echo $t3;
    $stmt=$conn->prepare("select count(email) as scount from parent where email=?");
$stmt->bind_param("s",$t1);
$stmt->execute();
$r=$stmt->get_result();
    $data=$r->fetch_assoc();
    if($data['scount'] >=1)
    {
    	echo "execte";
	if($t2 === $t3 ){
	$query=$conn->prepare("update parent set password=? where email=?");
	$query->bind_param("ss",$t2,$t1);
	echo "execte";
	$query->execute();
	echo "<script>alert('Registration Successfull - Login To Continue')
	window.location.href='http://localhost/edumark-master/index.php';
	</script>";
} else{
	echo "<script>alert('invalid password')
	window.location.href='http://localhost/edumark-master/index.php';
	</script>";
}
}
echo "<script>alert('User Not Registered')
	window.location.href='http://localhost/edumark-master/index.php';
	</script>";
}
?>