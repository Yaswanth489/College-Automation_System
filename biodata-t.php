
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
		<table  align="center" cellpadding="20px" cellspacing="60px" border-color="skyblue" bgcolor="white">
		<tr>
			<td colspan="2" align="center"><b>Faculty Information</b></td>
		</tr>
		<?php
$conn = new mysqli('localhost','root','','college');
$stmt=$conn->prepare("select id from loginfaculty order by sno desc limit 1");
$stmt->execute();
$v1=$stmt->get_result();
$val=mysqli_fetch_assoc($v1);
$da=$conn->prepare("select *from teacher where tid=?");
$da->bind_param("s",$val['id']);
$da->execute();
$r=$da->get_result();

			while($rows=mysqli_fetch_assoc($r))
			{
				//echo $rows['tid'];
				?>
				<tr>
			<th align="center">Rollno</th>
			<td ><h5><?php echo $rows['tid']?></h5></td>
		</tr>
				<tr>
					<th align="center">Branch</th>
					<td ><h5>
					<?php echo $rows['department']?></h5>
				</td>
			</tr>
			<tr>
					<th align="center">Name</th>
					<td ><h5>
					<?php echo $rows['name']?></h5>
				</td>
			</tr>
					<?php
			}
		?>

	</table>
</div></div></div>

</body>
</html>