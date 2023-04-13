<?php

$dbhost = "localhost";
$dbuser = "nami96";
$dbpass = "roxas1996";
$dbname = "login_sample_db";

if (!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect!");
}
