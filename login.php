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
            $_SESSION['id'] = $row['id'];
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
          padding:0;
          margin:0;
          font-family: sans-serif;
        }
        body{
          background: url('images/background.jpg') no-repeat ;
          background-size: cover;
        }
        .login-form{
          width:350px;
          top:50%;
          left:50%;
          transform: translate(-50% , -50%);
          position: absolute;
          color: #fff;
        }
        .login-form h2{
          font-size: 40px;
          text-align: center;
          text-transform: uppercase;
          margin: 40px 0;
          color: greenyellow;
        }
        .login-form label{
          font-size: 20px;
          margin: 15px 0;
          color: green;
        }
        .login-form input{
          font-size: 16px;
          width: 80%;
          padding: 15px 10px;
          border: 0;
          outline: none;
          border-radius: 5px;
        }
        .login-form button{
          font-size: 18px;
          font-weight: bold;
          margin:20px 0;
          padding:10px 15px;
          width:50%;
          border-radius: 5px;
          border: 0;
          color: green;
        }
    </style>
</head>
<body >
    <div class="login-form">
      <h2>Login</h2>
      <form action="#" method="post">
      <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
           <label for="password">Password</label>
              <input type="password" name="password" id="password" required>            
      <button type="submit" name="login" class="submit-btn">Login</button>
    </form>
    </div>
</body>
</html>