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
        //read from database
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if ($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: oee.php");
                        die;
                    }
                }
            }
            echo "Wrong Username or Password!";
        }
        else
        {
            echo "Wrong Username or Password!";
        }
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<form method="post">
    <!-- Email input -->
    <div class="form-outline mb-1">
        <input type="email" id="form1Example1" class="form-control" placeholder="123@email.com"/>
        <label class="form-label" for="form1Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-1">
        <input type="password" id="form1Example2" class="form-control" />
        <label class="form-label" for="form1Example2">Password</label>
    </div>

    <!-- Submit button -->
    <div class="button">
        <button type="submit" class="btn btn-primary btn-block">Log In</button>
    </div>

    <!-- Sign Up button -->
    <div class="signup">
        <a href="signup.php">Sign Up</a>
    </div>
</form>
</body>
</html>
