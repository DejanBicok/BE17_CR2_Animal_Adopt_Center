<?php

// $localhost = "127.0.0.1";
// $username = "root";
// $password = "";
// $dbname = "be17_cr5_animal_adoption_dejan";

$localhost = "173.212.235.205";
$username = "dejancodefactory_admin";
$password = "dejanadmin1!";
$dbname = "dejancodefactory_adopt_center";

// create connection
$connect = new  mysqli($localhost, $username, $password, $dbname);

// check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
// } else {
//     echo "Successfully Connected";
}