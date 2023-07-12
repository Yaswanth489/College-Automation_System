
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sri Vasavi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <script type="text/javascript" src="index.js"></script>

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
	<body align="center">
		<div class="slider_area ">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
            <div class="container">
		<table  align="center" cellpadding="20px" cellspacing="60px"  style="width: 50%;"bgcolor="white">
		<tr>
			<td colspan="2" align="center"><b>Student Information</b></td>
		</tr>
		<?php

?>
		<?php
$conn = new mysqli('localhost','root','','college');
$stmt=$conn->prepare("select id from loginparent order by sno desc limit 1");
$stmt->execute();
$v1=$stmt->get_result();
$val=mysqli_fetch_assoc($v1);
$da=$conn->prepare("select *from parent where email=?");
$da->bind_param("s",$val['id']);
$da->execute();
$r1=$da->get_result();
$r2=mysqli_fetch_assoc($r1);
$da1=$conn->prepare("select *from student where sid=?");
$da1->bind_param("s",$r2['sid']);
$da1->execute();
$r=$da1->get_result();

			while($rows=mysqli_fetch_assoc($r))
			{
				//echo $rows['sid'];
				?>
				<tr>
			<th>Rollno</th>
			<td><?php echo $rows['sid']?></td>
		</tr>
				<tr>
					<th>Branch</th>
					<td>
					<?php echo $rows['dept']?>
				</td>
			</tr>
			<tr>
					<th>Year</th>
					<td>
					<?php echo $rows['year']?>
				</td>
			</tr><tr>
				<th>Section</th>
				<td><?php echo $rows['section']?></td></tr>
					<?php
			}
		?>

	</table>
</div></div></div>

</body>
</html>