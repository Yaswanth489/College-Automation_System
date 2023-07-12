<?php
//$q=$_POST['tid'];
$conn=new mysqli('localhost','root','','college');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);
}else {
    $st=$conn->prepare("select id from loginfaculty order by sno desc limit 1");
$st->execute();
$v1=$st->get_result();
$val=mysqli_fetch_assoc($v1);
	$stmt= $conn->prepare("select distinct year from allocation where tid=?");
    $stmt2= $conn->prepare("select distinct dept from allocation where tid=?");
    $stmt1= $conn->prepare("select distinct subject from allocation where tid=?");
    $stmt1->bind_param("s",$val['id']);
    $stmt2->bind_param("s",$val['id']);
    $stmt->bind_param("s",$val['id']);
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
                <?php



if(isset($_POST['SubmitButton'])){
    $q=$_POST['assignment'];
$r=$_POST['tid'];
$s=$_POST['year'];
$t=$_POST['section'];
$s1=$_POST['subject'];
$d1=$_POST['dept'];
     $stmt= $conn->prepare("insert into assignment(assignment,tid,year,section,subject,dept) value(?,?,?,?,?,?)");
$stmt->bind_param("ssisss",$q,$r,$s,$t,$s1,$d1);
$stmt->execute();
echo'<script>alert("inserted successfully")</script>';


}
?>
                <center>
				<form action="assignment-t.php" method="post">
                <table cellpadding="2px" cellspacing="2px"  style="width:75%">
                	
                     <tr>
                           <td><label><center><h3>Department:</h3></center></label></td>
                            <td>
                                <select name="dept" style="width:160px;">
                           <?php
                            $stmt2->execute();
                            $r2=$stmt2->get_result();
                        while($row2=mysqli_fetch_assoc($r2)){
                        ?>
                        <option value="<?php echo $row2['dept']; ?>"><?php echo $row2['dept']; ?></option>
                        <?php
                    }
                        ?>
                    </select>
                          </td>
                        
                                
                        </tr>
                         <tr>
                           <td><label><center><h3>Subject:</h3></center></label></td>
                            <td>
                                <select name="subject" style="width:160px;">
                           <?php
                           $stmt1->execute();
                            $r1=$stmt1->get_result();
                        while($row1=mysqli_fetch_assoc($r1)){
                        ?>
                        <option value="<?php echo $row1['subject']; ?>"><?php echo $row1['subject']; ?></option>
                        <?php
                    }
                        ?>
                    </select>
                          </td>
                        
                                
                        </tr>
                    <tr>
                        <td >
                            <label><center><h3>Section:</h3></center></label></td>
                        <td>
                        	
                            <select name="section" style="width:160px;">
                            	<option value="A">A</option>
                            	<option value="B">B</option>
                            	<option value="C">C</option>
                            	<option value="D">D</option>
                            </select>
                        </td></tr>
                        <tr>
                        	<td><label><center><h3>Year:</h3></center></label></td>
                        	<td>
                        	<select name="year" style="width:160px;">
                           <?php
                            $stmt->execute();
$r=$stmt->get_result();
                        while($row=mysqli_fetch_assoc($r)){
                        ?>
                        <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
                        <?php
                    }
                        ?>
                    </select>
                          </td>
                        
                            	
                        </tr>
                    <tr>
                        <td colspan="2" align="center">

	<input type="hidden" name="tid" value="<?php echo $q?>">
	<textarea rows="8" cols="60" name="assignment" placeholder="Assignment" ></textarea>
	</td></tr>
<tr>
    <td colspan="2" align="right">
	<div align="right">
			<div class="live_chat_btn" align="center">
                                        <input type="submit" class="boxed_btn_orange" value="post" name="SubmitButton" >
                                </div></div></td></tr>
                                <?php
                                $stmt->close();
                                $stmt1->close();
                                $stmt2->close();
$conn->close();
}

                                ?>
	

</form>
</center>
</div>
</div>
</div>
</div>
</body>
</html>