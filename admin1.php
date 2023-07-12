<?php
    $conn=new mysqli('localhost','root','','college');
    if(isset($_POST['StudentView'])){
        echo "entered";
        $query=$conn->prepare("select *from student");
        $query->execute();
        $r1=$query->get_result();
        ?>
       <table bgcolor="white" border="5px">
        <tr>
            <th>Student_ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Year</th>
            <th>section</th>
        </tr>
        <tr>
             <?php while($res=mysqli_fetch_assoc($r1)){
            ?>
            
            <td>
                <?php echo $res['sid']?>
            </td>
            <td>
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
            <?php
        }
    }
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
    <style>
.button {
  background-color:deepskyblue; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {width: 100%;}
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: 2px;
  outline: black;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color:#ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color:skyblue;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>

</head>
<body class="single_slider  slider_bg_1">
<center>
    <h2 align="center"> Sri Vasavi Engineering College</h2>
    <h3 align="center"> Admin Portal</h3>


<div class="tab" >
    <center>
  <button  class="tablinks" onclick="openCity(event, 'London')">Student</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Teacher</button>
  </center>
</div>

<div id="London" class="tabcontent" style="background:;">
  <h3>Operations</h3>
  <form action="studentinsert.php" method="post">
      <div><h3>Insert New Student</h3><input type="submit" value="Insert" name="StudentInsert"style="background: skyblue; width: 160px;"></div>
  </form><br>
  <form action="deletestudent.php" method="post">
      <div><h3>Delete Student</h3><input type="submit" value="Delete" name="StudentDelete"style="background: skyblue; width: 160px;"></div>
  </form><br>
  <form action="studentview.php">
      <div><h3>View All Students</h3><input type="submit" value="View" name="StudentView" style="background: skyblue; width: 160px;"></div>
  </form>
</div>

<div id="Paris" class="tabcontent" style="background:">
  <h3>Operations</h3>
  <form action="teacherinsert.php" method="post">
      <div><h3>Insert New Faculty</h3><input type="submit" value="Insert" name="FacultyInsert" style="background: skyblue; width: 160px;"></div>
  </form><br>
  <form action="deleteteacher.php" method="post">
      <div><h3>Delete Faculty</h3><input type="submit" value="Delete" name="FacultyDelete"style="background: skyblue; width: 160px;"></div>
  </form><br>
  <form action="teacherview.php" method="post">
      <div><h3>View All Faculty</h3><input type="submit" value="View" name="FacultyView"style="background: skyblue; width: 160px;"></div>
  </form>
</div><br><br>
<h2>Faculty Allocation</h2>
    <table bgcolor="white" border="5px" bordercolor="skyblue" style="width:75%" cellpadding="15px">
        <tr>
            <th>Faculty_ID</th>
            <th>Section</th>
            <th>Department</th>
            <th>Year</th>
            <th>Subject</th>
            <th>Allocate</th>
        </tr>
        <tr>
            <form action="allocation.php" method="post">
            <td>
                <input type="text" name="tid" placeholder="Faculty_ID" style="width:160px" required>
            </td>
            <td>
                <select name="section" style="width:160px;">
            <option value="A">A</option>
           <option value="B">B</option>
           <option value="C">C</option>
           <option value="D">D</option>  
                            </select>
            </td>
            <td>
                <select name="dept" style="width:160px;">
           <option value="CSE">CSE</option>
           <option value="ECE">ECE</option>
           <option value="EEE">EEE</option>
           <option value="ME">ME</option>
           <option value="CIVIL">CIVIL</option>
         </select>
            </td>
            <td>
                <select name="year" style="width:160px;">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
         </select>
            </td>
            <td>
                <input type="text" name="subject" placeholder="subject" style="width:160px" required>
            </td>
            <td>
                <input type="submit" name="submit" value="Allocate" style="width:160px;background-color: skyblue;">
            </td>
            </form>
        </tr>
    </table>

    
</center>
</body>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</html>
