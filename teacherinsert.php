<?php
    $conn=new mysqli('localhost','root','','college');
        echo "entered";
        if(isset($_POST['submit'])){
            $a1=$_POST['tid'];
            $d1=$_POST['dept'];
        $query=$conn->prepare("insert into teacher(tid,department) values(?,?)");
        $query->bind_param("ss",$a1,$d1);
        $query->execute();
        echo "<script>alert('inserted succesfully')</script>";
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
            <th>Department</th>
            <th>Insert</th>
            
        </tr>
        <tr>
            <form action="" method="post">
            <td>
                <input type="text" name="tid" placeholder="Faculty_ID" style="width:160px" required>
            </td>
            <td>
                <input type="text" name="dept" placeholder="department" style="width:160px" required>
            </td>
            <td>
                <input type="submit" name="submit" value="Insert" style="width:160px;background-color: skyblue;">
            </td>
            </form>
        </tr>
    </table>
</center>
</body></html>