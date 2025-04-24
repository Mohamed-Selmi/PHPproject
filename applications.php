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
    <script src="scripts.js" defer></script> 
    <link rel="stylesheet" href="style/style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
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
 <h1>Applications list</h1>
    <p>See all your applications here!</p> 
</div>
<div style="font-weight:bold; color:#52050A; text-align:left; padding:10px;">
    <?php 
             include("config.php");
             $reqa="SELECT username,count(a.app_id) from user u join applications a on (u.id=a.user_id) where id='$id'";
             $resa=mysqli_query($c,$reqa);
             while($l=mysqli_fetch_array($resa)){
                echo"<h2>Welcome $l[0]!</h2><br>
                <h2>You have applied to $l[1] opportunities!</h2>";
             }
         
           

         mysqli_close($c);
?>

</div>

</div>
    <div class="search_bar">
         <button class="add"><img src="assets/add.svg" height="30px" width="30px"></button>

         <button class="search"><img src="assets/search.svg" height="30px" width="30px"></button>
        </div>
    
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

<div class="selectiondiv">
    <?php
    include("config.php");
    if (isset($_POST['search']))
    {   $titre=$_POST['titre'];
    $req="SELECT org.name,o.description,o.location,a.applied_on,o.end_date,a.app_id from applications a join opportunities o on (a.opportunity_id=o.opportunity_id) join organization org on (org.org_id=o.org_id) where user_id=$id and o.title LIKE '%$titre%'";
    }
    else {
        $req="SELECT org.name,o.description,o.location,a.applied_on,o.end_date,a.app_id from applications a join opportunities o on (a.opportunity_id=o.opportunity_id) join organization org on (org.org_id=o.org_id) where user_id=$id";

    }
    $res=mysqli_query($c,$req);
    while($l=mysqli_fetch_array($res)){
        echo "<div class='fetchdiv'>
        <ul style='display:flex; flex-direction:column; align-items:flex-start; padding:10px;'>
        <li><strong>Organization name :</strong> $l[0] </li>
        <li><strong>Opportunity Description: :</strong> $l[1] </li>
        <li> <strong>Opportunity Location: </strong> $l[2]</li>
        <li><strong>Application Date:</strong>$l[3]</li>
        <li><strong>DeadLine :</strong>$l[4]</li>
        
        </ul>
        <form class='buttonsForm'   action='' method='POST'>
        <input type='hidden' name='idapp' value='$l[5]'>
        <input class='submit' type='submit' value='Delete' name='delete'></form>
        </div>";
      
    }
    if (isset($_POST['delete']))
    {   $appid=$_POST['idapp'];
        $reqx="DELETE from applications where app_id=$appid;";
        $resx=mysqli_query($c,$reqx);
        echo "<script>
        window.location.href = 'organizations.php'; // Redirect to the same page
      </script>";
exit(); 
        exit();
    }
    mysqli_close($c);
?>
</div>
</div>
<div class="footer">
    <h3> Created by mohamed Amine Selmi 3G1 for a php project. Note 18/20</h3>
</div>
</body>
</html>