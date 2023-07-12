<?php
if(isset($_POST['submit']))
{
	$sid=$_POST['name'];
$password=$_POST['password'];
$time=date("h.i.sa");
$date=date("Y/m/d");
$conn=new mysqli("localhost","root","","college");
$stmt=$conn->prepare("select *from admin where name=? and password=?");
$stmt->bind_param("ss",$sid,$password);
$stmt->execute();
$r=$stmt->get_result();
if($r->num_rows>0)
{
	$data=$r->fetch_assoc();
	if($data['password'] == $password)
	{
		echo "<script>alert('login Successfull')
	window.location.href='http://localhost/edumark-master/admin1.php';
	</script>";
}
else{
	echo "<script>alert('Invalid Username/password')</script>";

}
}
else{
echo "<script>alert('Invalid Username/password')</script>";
}
}

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sri Vasavi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style>
.button {
  background-color:deepskyblue; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {width: 100%;}
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: 2px;
  outline: black;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color:#ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color:skyblue;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>

</head>
<body class="single_slider  slider_bg_1">
	<center>
		<h1>Admin Login</h1>
	<form method="post">
		<table cellpadding="5px" bgcolor="">
			<tr>
				<td>
					<input type="text" name="name" placeholder="Username" style="width:260px;height: 50px; " required>
				</td>
			</tr>
			<tr>
				<td>
					<input type="password" name="password" placeholder="password" style="width:260px;height: 50px;" required>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" class="boxed_btn">
				</td>
			</tr>
		</table>
	</form>
</center>

</body>
</html>

