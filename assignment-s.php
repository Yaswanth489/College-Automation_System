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
</style>
</head>
<body class="slider_area">
	<div class="single_slider slider_bg_1">
<?php

$conn = new mysqli('localhost','root','','college');
$stmt=$conn->prepare("select id from login order by sno desc limit 1");
$stmt->execute();
$v1=$stmt->get_result();
$val=mysqli_fetch_assoc($v1);
$da=$conn->prepare("select year,dept,section from student where sid=?");
$da->bind_param("s",$val['id']);
$da->execute();
$r=$da->get_result();
$res=mysqli_fetch_assoc($r);
$data=$conn->prepare("select subject,assignment,section from assignment where year=? and section=? and dept=? order by sno desc");
$data->bind_param("iss",$res['year'],$res['section'],$res['dept']);
$data->execute();
$r1=$data->get_result();

?>
		<center>
			<h2>Assignment Table</h2>
			<table bgcolor="white" cellpadding="15px" style="width:75%;height: 200px;">
					
							<tr>
								<th class="serial">Subject</th>
								<th class="country">Assignment</th>
								<th class="country">SECTION</th>
							</tr>
						<?php
			while($rows=mysqli_fetch_assoc($r1))
			{
				?>
			
						<tr class="table-row">
							<td class="serial"><?php echo $rows['subject'];?></td>
							<td class="percentage"><?php echo $rows['assignment'];?></td>
							<td class="serial"><?php echo $rows['section'];?></td>

						</tr>
						<?php
			}
		?>
	</div>
			
		
	</table>
</center>
	
</body>
</html>