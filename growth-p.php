<?php
$conn = new mysqli('localhost','root','','college');
$stmt=$conn->prepare("select id from loginparent order by sno desc limit 1");
$stmt->execute();
$i=1;
$v1=$stmt->get_result();
$val=mysqli_fetch_assoc($v1);
$q11=$conn->prepare("select sid from parent where email=?");
$q11->bind_param("s",$val['id']);
$q11->execute();
$q12=$q11->get_result();
$r1=mysqli_fetch_assoc($q12);
$query=$conn->prepare("select distinct *from growth where sid=?");
$query->bind_param("s",$r1['sid']);
$query->execute();
$q1=$query->get_result();

?><!doctype html>
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
<body class="single_slider  slider_bg_1">
	
                  <div class="slider_info">
                  	<div class="section-top-border">
				<h3 class="mb-30">Students Growth</h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<div class="table-head">
							<div class="serial">Exam</div>
							<div class="country">Subject</div>
							<div class="visit">Marks</div>
							<div class="percentage">Attendence</div>
						</div>
						<?php
								while($res=mysqli_fetch_assoc($q1)) {
						?>
						<div class="table-row">
							<div class="serial"><?php echo $res['type']?></div>
							<div class="country"><?php echo $res['subject']?></div>
							<div class="visit"><?php echo $res['marks']?></div>
							<div class="percentage">
								<?php echo $res['attendence']."%"; ?>
								<div class="progress">
									<div class="progress-bar color-<?php echo $i;
									$i=$i+1;?>" role="progressbar" style="width: <?php echo $res['attendence']?>%"
										aria-valuenow="<?php echo $res['attendence']?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
						<?php
						if($i==5)
						{
							$i=1;
						}

					}?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	
	</body>

