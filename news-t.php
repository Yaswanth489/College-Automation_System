<?php
$conn=new mysqli('localhost','root','','college'); 
$date=date("Y/m/d");
    $st=$conn->prepare("select id from loginfaculty order by sno desc limit 1");
$st->execute();
$v1=$st->get_result();
$val=mysqli_fetch_assoc($v1);
$stmt=$conn->prepare("select *from teacher where tid=?");
$stmt->bind_param("s",$val['id']);
$stmt->execute();
$r=$stmt->get_result();
$res=mysqli_fetch_assoc($r);
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
</head>
<body class="single_slider  slider_bg_1">
                    <center>
    <h1>Share A News</h1>
    <?php
    	if(isset($_POST['SubmitButton'])){
    		$a=$_POST['news'];
    		$s=$conn->prepare("insert into news(news,tid,date) values(?,?,?)");
    		$s->bind_param("sss",$a,$res['tid'],$date);
    		$s->execute();
            echo '<script>alert("inserted successfully")</script>';
    	}

    ?>
<form  action="" method="post">

    <textarea rows="5" cols="50" name="news" placeholder="News Regarding__-"></textarea><br>
    <input type="submit" class="boxed_btn_orange" value="post" name="SubmitButton" >
</form>
</center>
</div>
</div>
</div>
</div>
</body>
</html>