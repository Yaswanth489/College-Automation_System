<?php
$conn = new mysqli('localhost','root','','college');
$stmt=$conn->prepare("select id from loginfaculty order by sno desc limit 1");
$stmt->execute();
$v1=$stmt->get_result();
$val=mysqli_fetch_assoc($v1);
$stmt1=$conn->prepare("select *from teacher where tid=?");
$stmt1->bind_param("s",$val['id']);
$stmt1->execute();
$r=$stmt1->get_result();
$res=mysqli_fetch_assoc($r);
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Srivasavi</title>
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
    
</head>
<body class="single_slider  slider_bg_1">
	<div align="center">
		<h1>Schedule A Meet</h1><br>
		<?php
			if(isset($_POST['submit']))
			{
				$v2=$_POST['type'];
$v3=$_POST['meeting'];
$v4=$_POST['time'];
$v5=$_POST['date'];
$da=$conn->prepare("insert into remainder(tid,meeting,dept,type,time,date) value(?,?,?,?,?,?)");
$da->bind_param("ssssss",$res['tid'],$v3,$res['department'],$v2,$v4,$v5);
$da->execute();
echo '<script>alert("inserted successfully")</script>';
			}
		?>
        <form method="post">
            <select name="type" style="width:160px;">
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
                <option value="parent">Parent</option>
            </select><br><br><br>
		<textarea rows="5" cols="50" placeholder="Description about Meetings" name="meeting" required></textarea>
		<br>
		<table >
			<tr>
				<td><h4>Date</h4></td>
				<td>
		<input type="date" name="date" placeholder="dd-mm-yyyy" style="width:160px" required>
	</td>
</tr>
<tr>
				<td><h4>Time</h4></td>
				<td>
		<input type="time" name="time" placeholder="hh:mm" style="width:160px" required>
	</td>
</tr>
</table><br><br>

		<center><input type="submit" name="submit" class="boxed_btn_orange"></center></div>
        </form>
        <br>
	<div >
<?php

$conn = new mysqli('localhost','root','','college');
$var="student";
$data=$conn->prepare("select *from remainder  order by sno desc");
$data->execute();
$r1=$data->get_result();

?>
		<center>
			<table bgcolor="white" cellpadding="15px" style="width:75%;height: 200px;">
					
							<tr>
								<th class="serial">Meeting</th>
								<th class="country">date</th>
								<th class="serial">Time</th>
							</tr>
						<?php
			while($rows=mysqli_fetch_assoc($r1))
			{
				?>
			
						<tr class="table-row">
							<td class="serial"><?php echo $rows['meeting'];?></td>
							<td class="percentage"><?php echo $rows['date'];?></td>
							<td class="serial"><?php echo $rows['time'];?></td>

						</tr>
						<?php
			}
		?>
	</div>
</div></div></div></div>
</body>
