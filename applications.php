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
            <div><li><img src="assets/logoV.svg" height="50px" width="50px"></li></div>
            <li><a href="applications.php"><strong>HomePage</strong></a></li>
            <li><a href="applications.php"><strong>Organizations</strong></a></li>
            <li><a href="opportunities.php"><strong>Volunteer Opportunities</strong></a></li>
            <li><a href="applications.php"><strong>Applications</strong></a></li>
            <li><a href="logout.php"><img src="assets/logout.svg" height="55px" width="50px" alt="Logout"></a></li>
            
        </ul>
</div>
<div class="Current">  <h1>All applications:</h1></div>
</div>
<div class="body">
    <?php
    include("config.php");
    $req="select * from applications where user_id=$id";
    $res=mysqli_query($c,$req);
    while($l=mysqli_fetch_array($res)){

        echo "<div class='appdiv'>
        <ul>
        <li>id:$l[0] org: $l[1] titre : $l[2]<br>date de application :: $l[3]<br>
        </ul>
        <form action='' method='POST'>
        <input type='hidden' name='idapp' value='$l[0]'>
        <input type='submit' value='Delete' name='delete'></form>
        </div>";

    }
    if (isset($_POST['delete']))
    {   $appid=$_POST['idapp'];
        $reqx="DELETE from applications where app_id=$appid;";
        $resx=mysqli_query($c,$reqx);
        header("refresh:0");
    }
    mysqli_close($c);
?>
</div>
<div class="footer">
    <p> MADE WITH CARE</p>
</div>
</body>
</html>