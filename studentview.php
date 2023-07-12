<?php
    $conn=new mysqli('localhost','root','','college');
        echo "entered";
        $query=$conn->prepare("select *from student order by sid");
        $query->execute();
        $r1=$query->get_result();
        ?>
        <!doctype html>
            <html>
            <head>
                <link rel="stylesheet" href="css/bootstrap.min.css">
                    <link rel="stylesheet" href="css/style.css">
            </head>
            <body class="single_slider  slider_bg_1">
                <center>
       <table bgcolor="white" border="5px" bordercolor="skyblue" style="width: 75%;">
        <tr>
            <th>Student_ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Year</th>
            <th>section</th>
        </tr>
        
             <?php while($res=mysqli_fetch_assoc($r1)){
            ?>
            <tr>
            <td>
                <?php echo $res['sid']?>
            </td>
            <td >
                <?php echo $res['name']?>
            </td>
            <td>
                <?php echo $res['dept']?>
            </td>
            <td>
                <?php echo $res['year']?>
            </td>
            <td>
                <?php echo $res['section']?>
            </td>
            </tr>
            <?php
        }
?>
</table>
</center>
</body></html>