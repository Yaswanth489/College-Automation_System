<?php
$a1=$_POST['type'];
$b1=$_POST['year'];
$c1=$_POST['section'];
$d1=$_POST['dept'];
$e1=$_POST['subject'];
echo $a1;
$conn=new mysqli('localhost','root','','college'); 
$date=date("Y/m/d");
    $st=$conn->prepare("select id from loginfaculty order by sno desc limit 1");
$st->execute();
$v1=$st->get_result();
$val=mysqli_fetch_assoc($v1);
$stmt=$conn->prepare("select count(sid) as scount from growth where type=? and subject=? ");
$stmt->bind_param("ss",$a1,$e1);
$stmt->execute();
$r=$stmt->get_result();
    $data=$r->fetch_assoc();
    echo $data['scount'];
    if($data['scount'] == 0)
    {
$stmt=$conn->prepare("select *from allocation where tid=?");
$stmt->bind_param("s",$val['id']);
$stmt->execute();
$r=$stmt->get_result();
$res=mysqli_fetch_assoc($r);
$std=$conn->prepare("select *from student where dept=? and year=? and section=?");
$std->bind_param("sis",$d1,$b1,$c1);
$std->execute();
$rd=$std->get_result();
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
</style>
</head>
<body class="single_slider  slider_bg_1">
    <center>
        <div>
            <h1>Update the Performance of Student</h1>
        </div><br>
        <form action="growth2.php" method="post">
            <table cellpadding="5px" cellspacing="5px" bgcolor="white" border="5px" style="width:75%;">
                <tr>
                    <th>Student_ID</th>
                    <th>Subject</th>
                    <th>Exam_Type</th>
                    <th>Marks</th>
                    <th>Attendence</th>
                </tr>
                
                    
                     <?php
                     $i=0;
                        while($row2=mysqli_fetch_assoc($rd)){
                            $i++;
                        ?>

                        <tr>
                        
                        <td>
                            <?php echo $row2['sid'];?>
                        </td>
                        <td><?php echo $e1;?></td>
                        <td><?php echo $a1;?></td>
                        <input type="hidden" name="sid[]" value="<?php echo $row2['sid']?>">
                        <td>
                            <input type="text" pattern="[0-9]{2}" name="marks[]" placeholder="enter total marks" required></td>
        <td>
        <input type="number" step="any" min="0" max="100" name="attend[]" placeholder="enter Attendence of student till now " required></td>
                                  <?php
}
}
else{
    echo "<script>alert('Aleready Posted')
    window.location.href='http://localhost/edumark-master/growth1.php';
    </script>";
}
?>
                    </tr>
                    <tr>
                         <input type="hidden" name="count" value="<?php echo $i?>">
                        <input type="hidden" name="subject" value="<?php echo $e1?>">
        
        <input type="hidden" name="type" value="<?php echo $a1?>">
                        <td><input type="submit" name="SubmitButton" class="button"></td>
                    </tr>
  

            </table>
        
    </center>
</body>
</html>
                 
