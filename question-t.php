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
    
<form  action="" method="post">
        <center>
                        <h1>Questions</h1>
        <table cellpadding="6px" cellspacing="2px"bgcolor="white" style="width:50%;" >
            <tr>
                <?php
                $conn=new mysqli('localhost','root','','college');
                $date=date("Y/m/d");
                $st=$conn->prepare("select id from loginfaculty order by sno desc limit 1");
$st->execute();
$v1=$st->get_result();

$val=mysqli_fetch_assoc($v1);
$data=$conn->prepare("select *from question where  subject=? and status=0");
$s1=$conn->prepare("select distinct sid from question where subject=? and status=0");
$st=$conn->prepare("select sno from question where subject=? and status=0");
            $st->bind_param("s",$val['id']);
$s1->bind_param("s",$val['id']);
$data->bind_param("s",$val['id']);
$data->execute();
$da=$data->get_result();


                ?>
                <th>Question</th>
                <th>Student/Parent</th>
                <th>Question</th>
                <th>date</th>
                <th>Status</th>
            </tr>
            <tr>
                <?php
                    while($d=mysqli_fetch_assoc($da))
                    {
                ?>
                <td><?php echo $d['sno']?>
                </td>
                <td><?php echo $d['sid']?>
                </td>
                <td><?php echo $d['question']?></td>
                <td><?php echo $d['date']?></td>
                <td><?php if($d['status'] === 0){
                    echo "not Submitted";
                }else{
                    echo "submitted";
                } ?></td>
            </tr>
            <?php
        }
            ?>
                  
        </table>
        <br>
        <h1>Answer</h1>
        <table cellpadding="6px" cellspacing="2px" style="width: 50%;">
            <?php
            
        if(isset($_POST['SubmitButton'])){
            $a=$_POST['sid'];
            $b=$_POST['answer'];
            $c=$_POST['sno'];
            $st=1;
            $s=$conn->prepare("update question set answer=? where sid=? and sno=?");
            $s->bind_param("ssi",$b,$a,$c);
            $s->execute();
            $s11=$conn->prepare("update question set status=? where answer=?");
            $s11->bind_param("is",$st,$b);
            $s11->execute();
            echo '<script>alert("inserted successfully")</script>';
            header("location:question-t.php");
        }
        ?>
        <tr>
                <th>Student Id</th>
                <td>
       <select name="sid" style="width:530px; height: 50px;">

                <?php
                $s1->execute();
$s2=$s1->get_result();

                        while($n=mysqli_fetch_assoc($s2))
                        {
                ?>
                            <option value="<?php echo $n['sid']; ?>"><?php echo $n['sid']; ?></option>
                            <?php
                
                        }
                        
                ?>
                </select>
    </td>
</tr>
<tr>
                <th>Question No.</th>
                <td>
       <select name="sno" style="width:530px; height: 50px;">

                <?php
                $st->execute();
$s22=$st->get_result();

                        while($n1=mysqli_fetch_assoc($s22))
                        {
                ?>
                            <option value="<?php echo $n1['sno']; ?>"><?php echo $n1['sno']; ?></option>
                            <?php
                
                        }
                        
                ?>
                </select>
    </td>
</tr>

        <tr>
                <th>Answer</th>
                <td>
        <textarea rows="5" cols="69" name="answer"></textarea>
    </td>
</tr>
<tr>
    <td colspan="2" align="center">
        <input type="submit" value="post" class="boxed_btn" name="SubmitButton" >
    </td>
</tr>
        </table>
    </center>
</form>
</body>
</html>