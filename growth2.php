<?php
$conn=new mysqli('localhost','root','','college'); 
if(isset($_POST['SubmitButton'])){
    $i=0;
    $val=$_POST['count'];
    
                           while($i<$val){
                            $v1=$_POST['marks'][$i];
                            $v2=$_POST['attend'][$i];
                            $a1=$_POST['subject'];
                            $v3=$_POST['sid'][$i];
                            $e1=$_POST['type'];
                            echo "sid=".$v3;

                            $query=$conn->prepare("insert into growth(sid,marks,attendence,subject,type) values(?,?,?,?,?)");
                            $query->bind_param("sssss",$v3,$v1,$v2,$a1,$e1);
                            $query->execute();
                            echo "<script>alert('posted successfully')
    window.location.href='http://localhost/edumark-master/growth1.php';
    </script>";
                            $i++;
                            
                        }
                    }
                        else{
                            echo "<script>alert('Failed to post')
    window.location.href='http://localhost/edumark-master/index.php';
    </script>";
                        }
?>

