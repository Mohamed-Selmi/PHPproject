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
<link rel="stylesheet" href="style/style.css" >
    <script src="scripts.js" defer></script> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="header">
        <div class="list">
            <ul>
            <li><a href="index.php"><img src="assets/logoV.svg" height="50px" width="50px"></a></li>
                <li><a href="index.php"><strong>HomePage</strong></a></li>
                <li><a href="organizations.php"><strong>Organizations</strong></a></li>
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
    <div class="search_bar">
         <button class="add"><img src="assets/add.svg" height="30px" width="30px"></button>

         <button class="search"><img src="assets/search.svg" height="30px" width="30px"></button>
        </div>
        <div>
   
</div>

<div class="body">
    
<form class="addform" style="all: unset; align-self:center;" action="" method="POST">
    <div style="flex-direction:column;flex:wrap; display:flex;  align-self:center;">
        <label for="name">Organisation name:</label> <input type="text" name="name">
        <label for="mission">Mission:</label><input type="text" name="mission">
        <label for="email">Email:</label><input type="mail" name="email">
        <label for="location">Location:</label> <input type="text" name="location">
        <input class="button" type="submit" value="Add" name="ok">
        </div>
    </form>
</div>
   
    <div class="selectiondiv">
    <?php
        include("config.php");
        $req="select * from organization";
        $res=mysqli_query($c,$req); 
        while ($l=mysqli_fetch_array($res)){
            echo "<div class='fetchdiv'>
            <ul style='display:flex; flex-direction:column; align-items:flex-start; padding:10px;'>
            <li><strong>Name: :</strong> $l[1] </li>
            <li> <strong>Mission : </strong> $l[2]</li>
            <li><strong>Email:</strong>$l[3]</li>
            <li><strong>Location :</strong>$l[4]</li>
            
            </ul>
            <form class='buttonsForm'  action='' method='POST'>
            <input type='hidden' name='orgid' value='$l[0]'>
           
            <input class='submit'  type='submit' value='Delete' name='delete'></form>
            </div>";
          
        }
        if (isset($_POST['ok']))
        {   $name=$_POST['name'];
            $mission=$_POST['mission'];
            $email=$_POST['email'];
            $location=$_POST['location'];
            $org="INSERT INTO `organization` (`org_id`, `name`,`mission`,`email`,`location`) VALUES (NULL, '$name','$mission', '$email','$location');";
            $resy=mysqli_query($c,$org);
            header("refresh:0");
        }
        if (isset($_POST['delete']))
        {   $orgid=$_POST['orgid'];
            $org="DELETE FROM organization where org_id=$orgid;";
            $resy=mysqli_query($c,$org);
            header("Location: organizations.php");
            exit();
        }
       

    ?>
    </div>
   
</div>
<div class="footer"><p> MADE WITH CARE</p>
</div>
</body>
</html>