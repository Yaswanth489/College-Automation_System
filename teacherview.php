<?php
    $conn=new mysqli('localhost','root','','college');
        echo "entered";
        $query=$conn->prepare("select *from teacher order by tid");
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
            <th>Faculty_ID</th>
            <th>Name</th>
            <th>Department</th>
        </tr>
        
             <?php while($res=mysqli_fetch_assoc($r1)){
            ?>
            <tr>
            <td>
                <?php echo $res['tid']?>
            </td>
            <td>
                <?php echo $res['tid']?>
            </td>
            <td>
                <?php echo $res['department']?>
            </td>
            </tr>
            <?php
        }
?>
</table>
</center>
</body></html>