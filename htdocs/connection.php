<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "roxas1996";
$dbname = "login_sample_db";

if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)) //establish connection to database
{
    die("failed to connect!");
}