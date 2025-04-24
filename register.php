
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js" defer></script> 
    <link rel="stylesheet" href="style/style.css">
    <title>register</title>
</head>
<body style="height: 100vh;">
<div class="header">
        <div class="list">
        <ul>
           <li><img src="assets/logoV.svg" height="50px" width="50px"></li>
            <li ><a style="display:flex;justify-content:flex-end;" href="login.php">Already have an account?</a></li>
        </ul>
</div>

</div>

<div class="container">
    
<div class="logoText">
            <div><img src="assets/logoV.svg" height="300px" width="300px"></div>
            <div>  <h2>Volunteer:</h2></div>
</div>

    <div class="form">
    <div class="Current">  <h2>Create an account:</h2></div>
        <div>
        <form action="" method="POST">
            <label for="username">Username:</label> <input type="text" name="username" required>
        <label for="email">Email:</label> <input type="email" name="email" required>
            <label for="password">Password:</label><input type="password" name="pw" required>
            <input type="submit" value="Register" name="ok" class="button">
        </form>
    </div>
    </div>
</div>
</div>
  <?php
        if (isset($_POST['ok']))
{
    $username=$_POST['username'];
	$password=$_POST['pw'];
	$email=$_POST['email'];
    include("config.php");
    $req="INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password')";
    $res=mysqli_query($c,$req);

mysqli_close($c);

}
  ?>
   <div class="footer"><p> MADE WITH CARE</p>
   </div>
</body>
</html>