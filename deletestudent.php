<?php
    $conn=new mysqli('localhost','root','','college');
        echo "entered";
        if(isset($_POST['submit'])){
            $a1=$_POST['sid'];
        $query=$conn->prepare("delete from student where sid=?");
        $query->bind_param("s",$a1);
        $query->execute();
        echo "<script>alert('deleted succesfully')</script>";
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
            <th>Delete</th>
            
        </tr>
        <tr>
            <form action="" method="post">
            <td>
                <input type="text" name="sid" placeholder="Student_ID" style="width:160px" required>
            </td>
            <td>
                <input type="submit" name="submit" value="Delete" style="width:160px;background-color: skyblue;">
            </td>
            </form>
        </tr>
    </table>
</center>
</body></html>