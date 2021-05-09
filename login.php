<?php
    include 'connection.php';
    if(!isset($_SESSION)){
        session_start();
    }
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $_SESSION["auth"] = true;

        $sql = "SELECT * FROM users WHERE username = '$username' AND password= '$password' ";

        $user = $con->query($sql) or die($con->error);
        $row = $user->fetch_assoc();
        $total = $user->num_rows;
        if($total>0){
            $_SESSION['UserLogin'] = $row['username'];
            $_SESSION['Access'] = $row['access'];
             header("Location: admin/home.php");
        }
        else{
            header("Location: login.php");
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Login</title>
    <style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            min-height: 100vh;
            background: white;
            display: flex;
            font-family: Arial, Helvetica, sans-serif;
        }
        .pos-login{
            margin: auto;
            width: 500px;
            max-width: 90%;
        }
        .pos-login form{
            width: 100%;
            height: 100%;
            padding: 20px;
            background: white;
            border-radius: 4px;
            box-shadow: 0 8px 16px rgba(0, 0, 0,.3);
        }
        .pos-login form h2{
            text-align: center;
            margin-bottom: 24px;
            color: black;
        }
        .pos-login form .form-control{
            width: 100%;
            height: 40px;
            background: white;
            border-radius: 4px;
            border: 1px solid silver;
            margin: 10px 0 18px 0;
            padding: 0 10px;
        }
        .pos-login form .submit-btn{
            margin-left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 34px;
            border:none;
            outline: none;
            background: blue;
            cursor: pointer;
            font-size: 16px;
            text-transform: uppercase;
            color: white;
            border-radius: 4px;
            transition: .3s;
        }
        .pos-login form .submit-btn:hover{
            opacity: .8;
        }
    </style>
</head>
<body >
    <div class="pos-login">
        <form action="" class="form" method="post">
            <img src="" alt="">
            <h2>Login</h2>
                <div class="input-group">
                <label for="uname">Username: </label>
                <input type="text" name="username" placeholder="Enter Username" class="form-control" required>   
                </div>
                <div class="input-group">
                    <label for="pass">Password: </label>
                    <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
                </div>
                <input type="submit" name="login" class="submit-btn" value="Login">
        </form>
    </div>
</body>
</html>