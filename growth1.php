<?php
        $conn=new mysqli('localhost','root','','college'); 
$date=date("Y/m/d");
    $st=$conn->prepare("select id from loginfaculty order by sno desc limit 1");
$st->execute();
$v1=$st->get_result();
$val=mysqli_fetch_assoc($v1);
$query=$conn->prepare("select distinct dept from allocation where tid=?");
$query->bind_param("s",$val['id']);
$query->execute();
$r1=$query->get_result();
$query1=$conn->prepare("select distinct subject from allocation where tid=?");
$query1->bind_param("s",$val['id']);
$query1->execute();
$r2=$query1->get_result();
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
    <h1>Select The Below Contents</h1>
  <form action="growth-t.php" method="post">
   <table cellpadding="10px" bgcolor="white" style="width: 50%;">
    <tr>
      <th>YEAR</th>
      <th>Exam Type</th>
      <th>Section</th>
      <th>Department</th>
      <th>Subject</th>
    </tr>
     <tr>
       <td>
         <select name="year" style="width:160px;">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
         </select>
       </td>
       <td>
         <select name="type" style="width:160px;">
           <option value="Mid-1">Mid-1</option>
                                <option value="Mid-2">Mid-2</option>
                                <option value="Semester">Semester</option>
                                <option value="Lab">Lab</option>  
                            </select>
       </td>
       <td>
         <select name="section" style="width:160px;">
            <option value="A">A</option>
           <option value="B">B</option>
           <option value="C">C</option>
           <option value="D">D</option>  
                            </select>
       </td>
       <td>
        <select name="dept" style="width:165px;">
       <?php
                        while($row2=mysqli_fetch_assoc($r1)){
                        ?>
                        
                            
                                <option value="<?php echo $row2['dept']; ?>"><?php echo $row2['dept'];?></option>  
                            
                        <?php
                    }?>
                    </select>
                </td>
                <td>
        <select name="subject" style="width:165px;">
       <?php
                        while($row2=mysqli_fetch_assoc($r2)){
                        ?>
                        
                            
                                <option value="<?php echo $row2['subject']; ?>"><?php echo $row2['subject'];?></option>  
                            
                        <?php
                    }?>
                    </select>
                </td>
     </tr>
     <tr>
       <td colspan="5" align="center">
        
        <input type="submit" name="submit" class="button">
         
       </td>
     </tr>
   </table> 
</form>
</center>
</body>
</html>