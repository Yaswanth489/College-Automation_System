<?php
$conn=new mysqli('localhost','root','','college'); 
$date=date("Y/m/d");
    $st=$conn->prepare("select id from login order by sno desc limit 1");
$st->execute();
$v1=$st->get_result();
$val=mysqli_fetch_assoc($v1);
$stmt=$conn->prepare("select *from student where sid=?");
$stmt->bind_param("s",$val['id']);
echo "<h3 style='color:white;''>".$val['id']."</h3>";
$stmt->execute();
$r=$stmt->get_result();
$res=mysqli_fetch_assoc($r);
$s1=$conn->prepare("select distinct subject from allocation where year=? and section=? and dept=?");
            $s1->bind_param("iss",$res['year'],$res['section'],$res['dept']);
            $s1->execute();
            $m=$s1->get_result();
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
    <?php
        if(isset($_POST['SubmitButton'])){
            $a=$_POST['tid'];
            $b=$_POST['question'];
            $tid=$conn->prepare("select tid from allocation where year=? and section=? and dept=? and subject=?");
            $tid->bind_param("isss",$res['year'],$res['section'],$res['dept'],$a);
            $tid->execute();
            $t1=$tid->get_result();
            $t=mysqli_fetch_assoc($t1);
            $s=$conn->prepare("insert into question(tid,subject,question,sid,date) values(?,?,?,?,?)");
            $s->bind_param("sssss",$a,$t['tid'],$b,$val['id'],$date);
            $s->execute();
            echo '<script>alert("inserted successfully")</script>';
        }

    ?>
<form  action="" method="post">
        <center>
            <h1>Question</h1>
    <table cellpadding="6px" cellspacing="2px"  style="width:50%;">
    <tr>
                <h2><th>Subject</th></h2>
                <td>
                    <select name="tid" style="width:570px; height: 50px;">
                <?php
                        while($n=mysqli_fetch_assoc($m))
                        {
                ?>
                            <option value="<?php echo $n['subject']; ?>"><?php echo $n['subject']; ?></option>
                            <?php
                
                        }
                        
                ?>
                </select>
                </td>
                
               </tr>
               <tr>
                <th>Question</th>
                <td>
        <textarea rows="8" cols="75" name="question"></textarea>
    </td>
</tr>
<tr>
    <td colspan="2" align="center">
        <input type="submit" value="post" class="boxed_btn" name="SubmitButton" >
    </td>
</tr>
</table>
                        <h1>Response From Faculty</h1>
    <table bgcolor="white" style="width:50%;" bordercolor="skyblue">
            <tr>
                <?php
                    $v1=$conn->prepare("select tid,question,answer from question where sid=? order by sno desc");
                    $v1->bind_param("s",$val['id']);
                    $v1->execute();
                    $value=$v1->get_result();
                ?>
                <th>Subject</th>
                <th>question</th>
                <th>Answer</th>
            </tr>
            <tr>
                <?php
                    while($d1=mysqli_fetch_assoc($value))
                    {
                ?>
                <td><?php echo $d1['tid'] ?></td>
                <td><?php echo $d1['question'] ?></td>
                <td><?php echo $d1['answer'] ?></td>
            </tr>
            <?php
        }?>
                  
        </table>

    
<br>

</table>
</center>
</form>
</center>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
?>