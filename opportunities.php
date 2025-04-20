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
    <link rel="stylesheet" href="style/style.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opportunities</title>
</head>
<body>
<div class="header">
        <div class="list">
        <ul>
            <div><li><img src="assets/logoV.svg" height="50px" width="50px"></li></div>
            <li><a href="applications.php"><strong>HomePage</strong></a></li>
            <li><a href="applications.php"><strong>Organizations</strong></a></li>
            <li><a href="opportunities.php"><strong>Volunteer Opportunities</strong></a></li>
            <li><a href="applications.php"><strong>Applications</strong></a></li>
            <li><a href="logout.php"><img src="assets/logout.svg" height="55px" width="50px" alt="Logout"></a></li>
            
        </ul>
</div>
<div class="Current">  <h1>All available opportunities:</h1></div>
</div>

        <div class="body">
     <div class="add_opp">
        <form action="" method="POST">
        <label for="organisztion">Organisation:</label> <input type="text" name="organization">
        </form>
        </div>
    <div class="opportunities">
    <?php
    include("config.php");
    $req="select * from opportunities";
    $res=mysqli_query($c,$req); 
    while ($l=mysqli_fetch_array($res)){
        echo "<div class='oppdiv'>
        <ul>
        <li>id:$l[0] org: $l[1] titre : $l[2]<br>description : $l[3]<br>date de publication :$l[4]<br>
        </ul>
        <form action='' method='POST'>
        <input type='hidden' name='idopp' value='$l[0]'>
        <input type='submit' value='Apply' name='apply'></form>
        </div>";
      
    }
    if (isset($_POST['apply']))
    {   $oppid=$_POST['idopp'];
        $datesystem=date("Y/m/d");
        $app="INSERT INTO `applications` (`app_id`, `user_id`, `opportunity_id`, `applied_on`) VALUES (NULL, '$id',$oppid, '$datesystem');";
        $resx=mysqli_query($c,$app);
    }
    mysqli_close($c);
    ?>
    </div>
    </div>
    <div class="footer"><p> MADE WITH CARE</p>
        </div>
</body>
</html>