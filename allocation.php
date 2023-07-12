<?php
    $conn=new mysqli('localhost','root','','college');
        echo "entered";
   
        $a=$_POST['tid'];
        $b=$_POST['subject'];
        $c=$_POST['year'];
        $d=$_POST['dept'];
        $e=$_POST['section'];
         $stmt=$conn->prepare("select count(tid) as scount from teacher where tid=?");
$stmt->bind_param("s",$a);
$stmt->execute();
$r=$stmt->get_result();
    $data=$r->fetch_assoc();
    if($data['scount'] == 1)
    {
        $query=$conn->prepare("insert into allocation(tid,subject,year,dept,section) values(?,?,?,?,?)");
        $query->bind_param("ssiss",$a,$b,$c,$d,$e);
        $query->execute();
        echo "<script>alert('Allocation Successfull')
    window.location.href='http://localhost/edumark-master/admin1.php';
    </script>";
    }else{
        echo "<script>alert('Allocation Failed')
    window.location.href='http://localhost/edumark-master/admin1.php';
    </script>";

    }
       
?>
