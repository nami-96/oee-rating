<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "roxas1996";
$dbname = "login_sample_db";
$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (!$con) //establish connection to database
{
    die("failed to connect!");
}