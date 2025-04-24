<?php
include("config.php");
$sql1="INSERT INTO user (id,username,email,password) values (NULL,'mohamed','mohamed1@mail.com','123'),
                (2,'ALI','Hello@mail.com','123');";


$res = mysqli_query($c, $sql1);
if ($res === TRUE) {
    echo "Inserted into user successfully<br>";
} else {
    echo "Error inserting into user: " . $c->error . "<br>";
}

$sql2="INSERT INTO organization (org_id,name,mission,email,location) values (NULL,'Org2','aaaaa','org1@mail.com','sousse'),
                (NULL,'org3','orphans','org2@mail.com','sousse');";

$res = mysqli_query($c, $sql2);
if ($res === TRUE) {
    echo "Inserted into organization successfully<br>";
} else {
    echo "Error inserting into organization: " . $c->error . "<br>";
}

?>