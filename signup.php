<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            $query = "insert into users (user_id, user_name,password) values (user_id, user_name,password)";
        }
        else
        {
            echo "Please enter some valid info!";
        }
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="signup.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sign Up</title>
</head>
<body>
<form method="post">
    <!-- Email input -->
    <div class="form-outline mb-1">
        <input type="text" id="form1Example1" class="form-control" name="user_name"/>
        <label class="form-label" for="form1Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-1">
        <input type="password" id="form1Example2" class="form-control" name="password"/>
        <label class="form-label" for="form1Example2">Password</label>
    </div>

    <!-- Submit button -->
    <div class="button">
        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
    </div>

    <!-- Sign Up button -->
    <div class="login">
        <a href="login.php">Log In</a>
    </div>
</form>
</body>
</html>


