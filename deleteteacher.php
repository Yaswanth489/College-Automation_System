<?php
    $conn=new mysqli('localhost','root','','college');
        echo "entered";
        if(isset($_POST['submit'])){
            $a1=$_POST['tid'];
            $stmt=$conn->prepare("select count(tid) as scount from teacher where tid=?");
$stmt->bind_param("s",$a1);
$stmt->execute();
$r=$stmt->get_result();
    $data=$r->fetch_assoc();
    if($data['scount'] == 1)
    {
        $query=$conn->prepare("delete from teacher where tid=?");
        $query1=$conn->prepare("delete from allocation where tid=?");
        $query->bind_param("s",$a1);
        $query1->bind_param("s",$a1);
        $query->execute();
        $query1->execute();
        echo "<script>alert('deleted succesfully')</script>";
    }else{
        echo "<script>alert('enter valid id')</script>";
    }
    }
        ?>
        <!doctype html>
            <html>
            <head>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                    <link rel="stylesheet" href="css/style.css">
            </head>
            <body class="single_slider  slider_bg_1">
                <center>
       <table bgcolor="white" border="5px" style="width:75%" bordercolor="skyblue" cellpadding="5px">
        <tr>
            <th>Faculty_ID</th>
            <th>Delete</th>
            
        </tr>
        <tr>
            <form action="" method="post">
            <td>
                <input type="text" name="tid" placeholder="Faculty_ID" style="width:160px" required>
            </td>
            <td>
                <input type="submit" name="submit" value="Delete" style="width:160px;background-color: skyblue;">
            </td>
            </form>
        </tr>
    </table>
</center>
</body></html>