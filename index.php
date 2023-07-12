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
	echo "<script>alert('updated successfully____Login To Continue')</script>";

} else{
	echo "<script>alert('invalid password');
    window.location.href='index.php';</script>";
}
}
else{
    echo "<script>alert('UserName Not registered')</script>";
} 
}
if(isset($_POST['student'])) 
{
	$v1=$_POST['sid'];
	$v2=$_POST['name'];
	$v3=$_POST['dept'];
	$v4=$_POST['mobile'];
	$v5=$_POST['email'];
	$v6=$_POST['password'];
	$v7=$_POST['cpassword'];
   $v8=$_POST['parentemail'];
    $stmt=$conn->prepare("select count(sid) as scount from student where sid=?");
$stmt->bind_param("s",$v1);
$stmt->execute();
$r=$stmt->get_result();
    $data=$r->fetch_assoc();
    if($data['scount'] == 1)
    {
	if($v6 == $v7){
	$query=$conn->prepare("update student set name=?,dept=?,mobile=?,email=?,password=?,parentemail=? where sid=?");
	$query->bind_param("sssssss",$v2,$v3,$v4,$v5,$v6,$v8,$v1);
	$query->execute();
    $insert=$conn->prepare("insert into parent(email,sid) value(?,?)");
    $insert->bind_param("ss",$v8,$v1);
    $insert->execute();
		echo "<script>alert('Updated successfully____Login to Continue')</script>";

	}else{
			echo "<script>alert('invalid password')</script>";

	}
}
else{
    echo "<script>alert('UserName Not registered')</script>";
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
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
   
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="row align-items-center no-gutters">
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.html">home</a></li>
                                        <li><a href="">Faculty<i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="faculty-cse.html">CSE-DEPARTMENT</a></li>
                                                <li><a href="faculty-ece.html">ECE DEPARTMENT</a></li>
                                                <li><a href="faculty-eee.html">EEE DEPARTMENT</a></li>
                                                <li><a href="faculty-me.html">ME DEPARTMENT</a></li>
                                                <li><a href="faculty-civil.html">CIVIL DEPARTMENT</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about.html">About</a></li>
                                        </li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="admin-login.php">Admin</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="log_chat_area d-flex align-items-center">
                                <a href="#test-form-1" class="login popup-with-form">
                                    <i class="flaticon-user"></i>
                                    <span>log in</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area ">
        <div class="single_slider d-flex align-items-center justify-content-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 col-md-8">
                        <div class="slider_info">
                            <h3>Sri Vasavi Engineering College</h3><br>
                            <h4>DEPARTMENTS</h4>
                            <a href="course-cse.html" class="boxed_btn">CSE</a>
                            <a href="course-ece.html" class="boxed_btn">ECE</a>
                            <a href="course-eee.html" class="boxed_btn">EEE</a>
                            <a href="course-me.html" class="boxed_btn">ME</a>
                            <a href="course-civil.html" class="boxed_btn">CIVIl</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- about_area_start -->
    <div class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="single_about_info">
                        <h3>Over 7000 Students
                            from 5 DEPARTMENTS</h3>
                        <p>We are providing a wide variety of courses for each department seperately
                        .For each semester a student of any student can be able to learn 5 subjects + 3labs of their respective department.Along with our curriculum we encourage students for co-curricular activities and cultural activites to explore thier talents.</p>
                        
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6">
                    <div class="about_tutorials">
                        <div class="courses">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>300+</span>
                                    <p> Faculty</p>
                                </div>
                            </div>
                        </div>
                        <div class="courses-blue">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>7000+</span>
                                    <p> Students</p>
                                </div>

                            </div>
                        </div>
                        <div class="courses-sky">
                            <div class="inner_courses">
                                <div class="text_info">
                                    <span>64+</span>
                                    <p> Subjects per DEPT</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area_end -->

    
    <!-- our_courses_start -->
    
    <!-- footer -->
    <footer class="footer footer_bg_1">
        <div class="footer_top">

            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title" >Sri Vasavi Engineering College</h3>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                   
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Address
                            </h3>
                            <p>
                                Sri Vasavi Engineering College<br>
                                Peda Tadepalli,Tadepalli Gudem-534101 <br>
                                Tel:+91 88182-84322/84344/84544
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Sri Vasavi Engineering College</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->


    <!-- form itself end-->
    <form id="test-form" class="white-popup-block mfp-hide" action="login-student.php" method="post">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Sign in</h3>
                <form action="login-student.php">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="text" id="sid" name="sid" placeholder="Enter Student-Id" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="col-xl-12">
                            <input type="submit" class="boxed_btn_orange" />
                        </div>
                    </div>
                </form>
                <p class="doen_have_acc">Don’t have an account? <a class="dont-hav-acc" href="#test-form-11">Sign Up</a>
                </p>
            </div>
        </div>
    </form>
    <!-- form itself end -->
    <!-- form itself end-->
    <form id="test-form-parent" class="white-popup-block mfp-hide" action="login-parent.php" method="post">
        <div class="row align-items-center justify-content-center">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Sign in</h3>
                <form action="student.html">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-xl-12">
                             <input type="submit" class="boxed_btn_orange" onclick="handleSubmit()"/>
                    </div>
                </form>
                <center>
                <p class="doen_have_acc">Don’t have an account? <a class="dont-hav-acc" href="#test-form2">Sign Up</a>
                </p>
            </center>
            </div>
        </div>
        </div>
    </form>
    <!-- form itself end -->
    <!-- form itself end-->
    <form id="test-form-teacher" class="white-popup-block mfp-hide" action="login-faculty.php" method="post">
        <div class="row align-items-center justify-content-center">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Sign in</h3>
                <form action="student.html" method="post">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="text" placeholder="Enter Teacher-Id" name="tid">
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" placeholder="Password" name="password">
                        </div>
                        <div class="col-xl-12">
                            <input type="submit" class="boxed_btn_orange"/>
                        </div>
                    </div>
                </form>
                <center>
                <p class="doen_have_acc">Don’t have an account? <a class="dont-hav-acc" href="#test-form-12">Sign Up</a>
                </p>
                </center>
            </div>
        </div>
    </form>
    <!-- form itself end -->
    <!-- form itself end-->
    <form id="test-form-1" class="white-popup-block mfp-hide">
        <div class="row align-items-center justify-content-center">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>You Are</h3>
                <form action="#">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-8 col-md-8">
                            <a href="#test-form" class="dont-hav-acc" ><button class="boxed_btn"><h1>Student</h1></button></a>
                        </div>
                        <div class="col-xl-8 col-md-8">
                            <a href="#test-form-teacher" class="dont-hav-acc" ><button class="boxed_btn"><h1>Teacher</h1></button></a>
                        </div><br><br><br><br><br>
                        <div class="col-xl-8 col-md-8">
                            <a href="#test-form-parent" class="dont-hav-acc" ><button class="boxed_btn"><h1>Parent</h1></button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </form>
    <!-- form itself end -->
    <!-- form itself end-->
    <form id="test-form2" class="white-popup-block mfp-hide" action="register1.php" method="post">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Resistration</h3>
                <form action="register1.php" method="post">
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <input type="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="Password" name="cpassword"placeholder="Confirm password" required>
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" name="parent"class="boxed_btn_orange">Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->
    <form id="test-form-11" class="white-popup-block mfp-hide" action="" method="post">
        <div class="row align-items-center justify-content-center">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Resistration</h3>
                <form action="" method="post">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-12 col-md-12">
                            <input type="text"  name="sid" placeholder="Enter Student-Id" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="text" name="name"placeholder="Full Name" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="text" name="dept"placeholder="Branch"required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="tel" name="mobile" pattern="[0-9]{10}" title="1234512345" placeholder="Mobile Number"required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="email" name="email" placeholder="e-mail"required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="email" name="parentemail" placeholder="e-mail"required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="Password" name="cpassword" placeholder="Confirm password" required>
                        </div>

                        <div class="col-xl-12">
                            <input type="submit" name="student" value="SignUp" class="boxed_btn_orange">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </form>
    <!-- form itself end -->
     <!-- form itself end -->
    <form id="test-form-12" class="white-popup-block mfp-hide" action="register.php" method="post">
        <div class="row align-items-center justify-content-center">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Resistration</h3>
                <form action="" method="post">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-12 col-md-12">
                            <input type="text" name="tid" placeholder="Enter Teacher-Id" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="text" name="name"placeholder="Full Name" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="text" name="department" placeholder="Department" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="tel" name="mobile" placeholder="Mobile Number" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="email" name="email"placeholder="email" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="password" name="password" id="password"placeholder="Password" required>
                        </div>
                        <div class="col-xl-12 col-md-12">
                            <input type="Password" name="cpassword" placeholder="Confirm password" id="cpassword" required>
                        </div>

                        <div class="col-xl-12">
                            <input type="submit" name="teacher" class="boxed_btn_orange"  value="SignUp">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </form>
    <!-- form itself end -->


    <!-- JS here -->
    <script >
        const pswrd_1 = document.getElementIdBy("password").value;
         const pswrd_2 = document.getElementIdBy("cpassword").value;
        function checkpassword(){
           if(pswrd_1.value != pswrd_2.value){
             alert("Error! Confirm Password Not Match");
             return false;
           }else{
            window.location.href="register-t.php";
            return false;
           }
         }
        
    </script>
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
   
</body>

</html>
