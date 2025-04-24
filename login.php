<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="scripts.js" defer></script> 
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body style="height: 100vh;">
<div class="header">
        <div class="list">
        <ul>
           <li><img src="assets/logoV.svg" height="50px" width="50px"></li>
            <li><a style="display:flex;justify-content:flex-end;"  href="register.php">Don't have an account?</li></a>
        </ul>
</div>

</div>
<div class="container">
<div class="logoText">
            <div><img src="assets/logoV.svg" height="300px" width="300px"></div>
            <div>  <h2>Volunteer:</h2></div>
</div>
    <div class="form">
    <div class="Current">  <h2>Sign into account:</h2></div>
    <div>
    <form action="" method="POST">
    <label for="email">Email:</label> <input type="email" name="email">
    <label for="password">Password:</label><input type="password" name="pw">
     <input class="button" type="submit" value="Login" name="ok">
    </form>
    </div>
</div>
</div>
</div>
    <?php
    if(isset($_POST['ok']))
    {
        $email=addslashes($_POST['email']);
        $password=addslashes($_POST['pw']);
        include("config.php");
        $req="select * from user where email='$email' and password='$password'";

        $res=mysqli_query($c,$req);
        if($l=mysqli_fetch_array($res))
	{
		session_start();
		$_SESSION['id']=$l[0];
		header("location:index.php");
		
	}
	else 
	{   
		"login/mdp erronée";
	}
    mysqli_close($c);
}
?>
</div>
 <div class="footer"><p> MADE WITH CARE</p>
 </div>
</body>
</html>