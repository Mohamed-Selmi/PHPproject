
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
<?php
    session_start();
    if (isset($_SESSION['id']))
    {
        $id=$_SESSION['id'];
        include("config.php");
        $reqx="select * from user where id='$id'";
        $resx=mysqli_query($c,$reqx);
        	
	
    }
?>
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

   
</body>
</html>