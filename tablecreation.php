<?php
include("config.php");
/*
$sql = "CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(50) NOT NULL,
    email VARCHAR(55) UNIQUE,
    password VARCHAR(55) NOT NULL
)";
$res = mysqli_query($c, $sql);
if ($res === TRUE) {
    echo "Table user created successfully<br>";
} else {
    echo "Error creating user: " . $c->error . "<br>";
}

$sql2 = "CREATE TABLE Organization (
    org_id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(50) UNIQUE,
    mission VARCHAR(225),
    email VARCHAR(55) NOT NULL,
    location VARCHAR(55) NOT NULL
)";
$res = mysqli_query($c, $sql2);
if ($res === TRUE) {
    echo "Table organization created successfully<br>";
} else {
    echo "Error creating organization: " . $c->error . "<br>";
}

$sql3 = "CREATE TABLE Opportunities (
    opportunity_id INT AUTO_INCREMENT PRIMARY KEY,
    org_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(225),
    location VARCHAR(55) NOT NULL,
    start_date DATE,
    end_date DATE,
    FOREIGN KEY (org_id) REFERENCES Organization(org_id)
)";
$res = mysqli_query($c, $sql3);
if ($res === TRUE) {
    echo "Table Opportunities created successfully<br>";
} else {
    echo "Error creating Opportunities: " . $c->error . "<br>";
}
*/
$sql4 = "CREATE TABLE Applications (
    app_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    opportunity_id INT NOT NULL,
    applied_on DATE,
    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (opportunity_id) REFERENCES Opportunities(opportunity_id)
)";
$res = mysqli_query($c, $sql4);
if ($res === TRUE) {
    echo "Table Applications created successfully<br>";
} else {
    echo "Error creating Applications: " . $c->error . "<br>";
}

mysqli_close($c);
?>
