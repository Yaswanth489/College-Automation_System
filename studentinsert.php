<?php
    $conn=new mysqli('localhost','root','','college');
        echo "entered";
        if(isset($_POST['submit'])){
            $a1=$_POST['sid'];
            $b1=$_POST['section'];
            $c1=$_POST['dept'];
            $d1=$_POST['year'];
             $stmt=$conn->prepare("select count(sid) as scount from student where sid=?");
$stmt->bind_param("s",$a1);
$stmt->execute();
$r=$stmt->get_result();
    $data=$r->fetch_assoc();
    if($data['scount'] == 0)
    {
        $query=$conn->prepare("insert into student(sid,year,section,dept) values(?,?,?,?)");
        $query->bind_param("siss",$a1,$d1,$b1,$c1);
        $query->execute();
        echo "<script>alert('inserted succesfully')</script>";
    }
    else
    {
        echo "<script>alert('Already inserted')</script>";
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
            <th>Student_ID</th>
            <th>Section</th>
            <th>Department</th>
            <th>Year</th>
            <th>Insert</th>
            
        </tr>
        <tr>
            <form action="" method="post">
            <td>
                <input type="text" name="sid" placeholder="Student_ID" style="width:160px" required>
            </td>
            <td>
                <input type="text" name="section" placeholder="section"style="width:160px" required>
            </td>
            <td>
                <input type="text" name="dept" placeholder="department" style="width:160px" required>
            </td>
            <td>
                <input type="number" min="1" max="4" name="year" placeholder="year" style="width:160px" required>
            </td>
            <td>
                <input type="submit" name="submit" value="Insert" style="width:160px;background-color: skyblue;">
            </td>
            </form>
        </tr>
    </table>
</center>
</body></html>