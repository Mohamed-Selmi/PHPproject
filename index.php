<?php
session_start();
if (!isset($_SESSION['id'])) {
    
    header("Location: login.php");
    exit();
}
$id = $_SESSION['id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="scripts.js" defer></script> 
    <link rel="stylesheet" href="style/style.css" defer>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>

    <div class="header" style="gap:0px;">
        <div class="list">
        <ul>
            <li><a href="index.php"><img src="assets/logoV.svg" height="50px" width="50px"></a></li>
            <li><a href="index.php"><strong>HomePage</strong></a></li>
            <li><a href="applications.php"><strong>Organizations</strong></a></li>
            <li><a href="opportunities.php"><strong>Volunteer Opportunities</strong></a></li>
            <li><a href="applications.php"><strong>Applications</strong></a></li>
            <li><a href="logout.php"><img src="assets/logout.svg" height="55px" width="50px" alt="Logout"></a></li>
            
        </ul>
</div>
<div style="display:flex; width:85%; background-image: linear-gradient(to right,#058ED9 ,#E9FF70); justify-content:space-between; padding:15px; align-items:center;">
<img src="assets/logoV.svg" height="100px" width="100px">
<div style="display:flex;flex-direction:column; margin-left:50px; font-size:24px; justify-content:space-evenly; font-weight:bold; color:white;">
 <h1>VolunteeringYouth</h1>
    <p>Become an active member and help society!</p> 
</div>
<div style="font-weight:bold; color:#52050A; text-align:left; padding:10px;">
    <?php 
             include("config.php");
             $reqa="select username,email from user where id='$id'";
             $resa=mysqli_query($c,$reqa);
             while($l=mysqli_fetch_array($resa)){
                echo"<h2>Welcome $l[0]!</h2><br>
                <h2>Mail:$l[1]</h2>";
             }
         
           

         mysqli_close($c);
?>

</div>

</div>
            </div>
<div class="body">  

<div class="stories">
    
<div class="story">
    <img src="assets/vol3.jpg" alt="volunteers" class="storyimg" width="250px" height="250px"> 
    <hr style="color:white;" width="100%;">
   <span> <h1>Journeé Agriculture </h1></span>
</div>
 <div class="story">
    <img src="assets/vol1.jpg" alt="volunteers" class="storyimg" width="250px" height="250px"> 
    <hr style="color:white;" width="100%;">
   <span> <h1>Journeé Medicale </h1></span>
</div>
<div class="story">
    <img src="assets/vol4.jpg" alt="volunteers" class="storyimg" width="250px" height="250px"> 
    <hr style="color:white;" width="100%;">
   <span> <h1>Journeé Culturelle </h1></span>
</div>

</div>
</div>

<div class="footer"> <h3> Created by mohamed Amine Selmi 3G1 for a php project. Note 18/20</h3>
</div>
</body>
</html>