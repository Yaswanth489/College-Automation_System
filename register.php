<?php
	$conn=new mysqli('localhost','root','','college');
if(isset($_POST['teacher'])) {
	$t1=$_POST['tid'];
	$t2=$_POST['name'];
	$t3=$_POST['department'];
	$t4=$_POST['mobile'];
	$t5=$_POST['email'];
	$t6=$_POST['password'];
	$t7=$_POST['cpassword'];
    echo $t1;
    $stmt=$conn->prepare("select count(tid) as scount from teacher where tid=?");
$stmt->bind_param("s",$t1);
$stmt->execute();
$r=$stmt->get_result();
    $data=$r->fetch_assoc();
    if($data['scount'] == 1)
    {
	if($t6 === $t7 ){
	$query=$conn->prepare("update teacher set name=?,department=?,mobile=?,email=?,password=? where tid=?");
	$query->bind_param("ssssss",$t2,$t3,$t4,$t5,$t6,$t1);
	$query->execute();
	echo "<script>alert('Registration Successfull - Login To Continue')
	window.location.href='http://localhost/edumark-master/index.php';
	</script>";
	//redirect('http://localhost/edumark-master/index.php');

} 
	//redirect('http://localhost/edumark-master/index.php');
}
else{
	echo "<script>alert('invalid password')
	window.location.href='http://localhost/edumark-master/index.php';
	</script>";
}
}
?>