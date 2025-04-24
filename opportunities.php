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
    <script src="scripts.js" defer></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opportunities</title>
  
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
 <h1>VOlunteering opportunities</h1>
    <p>View all available opportunities!</p> 
</div>
<div style="font-weight:bold; color:#52050A; text-align:left; padding:10px;">
    <?php 
             include("config.php");
                            $reqa = "
                    SELECT 
                        (SELECT username FROM user WHERE id = '$id') AS username, 
                        (SELECT COUNT(*) FROM opportunities) AS opp_count
                ";
                $resa = mysqli_query($c, $reqa);
             if($l=mysqli_fetch_array($resa)){
                echo"<h2>Welcome $l[0]!</h2><br>
                <h3>There are $l[1] opportunities available to choose from!</h3>";
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
        <label for="org_id">Organisation id:</label> <input type="number" name="org">
        <label for="title">Title:</label><input type="text" name="title">
        <label for="description">Description:</label><input type="text" name="desc">
        <label for="location">Location:</label> <input type="text" name="location">
        <label for="Dated">Start Date:</label> <input type="date" name="date_deb">
        <label for="DateF">End Date:</label> <input type="date" name="date_fin">
        <input class="button" type="submit" value="Add" name="ok">
        </div>
    </form>
   
    <div class="selectiondiv">
    <?php
    include("config.php");
     
    if (isset($_POST['search']))
    {   $titre=$_POST['titre'];
        $req = "SELECT * FROM opportunities WHERE title LIKE '%$titre%'";
    }
    else {$req = "SELECT * FROM opportunities"; }
        $res=mysqli_query($c,$req); 
        while ($l=mysqli_fetch_array($res)){
            echo "<div class='fetchdiv'>
            <ul style='display:flex; flex-direction:column; align-items:flex-start; padding:10px;'>
            <li><strong>Titre :</strong> $l[2] </li>
            <li> <strong>Description : </strong> $l[3]</li>
            <li><strong>Location:</strong>$l[4]</li>
            <li><strong>Publication Date :</strong>$l[5]</li>
             <li><strong>Deadline :</strong>$l[6]</li>
            </ul>
            <form class='buttonsForm'  action='' method='POST'>
            <input type='hidden' name='idopp' value='$l[0]'>
            <input class='submit'  type='submit' value='Delete' name='delete'>
            <input class='submit'  type='submit' value='Apply' name='apply'> </form>
           
            </div>";
          
        }
    
    if (isset($_POST['ok']))
    {   $org=$_POST['org'];
        $title=$_POST['title'];
        $desc=$_POST['desc'];
        $location=$_POST['location'];
        $startDate=$_POST['date_deb'];
        $endDate=$_POST['date_fin'];
        $opp="INSERT INTO `opportunities` (`opportunity_id`, `org_id`, `title`,`description`,`location`,`start_date`,`end_date`) VALUES (NULL, '$org','$title', '$desc','$location','$startDate','$endDate');";
        $resy=mysqli_query($c,$opp);
        echo "<script>
        window.location.href = 'opportunities.php'; // Redirect to the same page
      </script>";
    }
    
    
    if (isset($_POST['apply']))
    {   $oppid=$_POST['idopp'];
        $datesystem=date("Y/m/d");
        $app="INSERT INTO `applications` (`app_id`, `user_id`, `opportunity_id`, `applied_on`) VALUES (NULL, '$id',$oppid, '$datesystem');";
        $resx=mysqli_query($c,$app);
    }
    if (isset($_POST['delete']))
    {   $oppid=$_POST['idopp'];
        $reqx = "DELETE o FROM opportunities o 
        JOIN organization org ON o.org_id = org.org_id
        WHERE o.opportunity_id = '$oppid' 
        AND org.email = (SELECT email FROM user WHERE id = '$id')";
        $resx=mysqli_query($c,$reqx);
        if (!$resx) {
            die("Error deleting opportunity: " . mysqli_error($c));
        }
        echo "<script>
        window.location.href = 'opportunities.php'; // Redirect to the same page
      </script>";

    }
    mysqli_close($c);
    ?>
    </div>
    </div>
    
    <div class="footer"><h3> Created by mohamed Amine Selmi 3G1 for a php project. Note 18/20</h3>
        </div>
</body>

</html>