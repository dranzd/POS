<?php
include '../connection.php'; 
    session_start();
        if(isset($_POST['register'])){

            $fname = $con -> real_escape_string($_POST['fname']);
            $lname = $con -> real_escape_string($_POST['lname']);
            $uname = $con -> real_escape_string($_POST['uname']);
            $pword = $con -> real_escape_string($_POST['pword1']);
            $contact = $con -> real_escape_string($_POST['ctct']);
            $email = $con -> real_escape_string($_POST['email1']);
            $gender = $con -> real_escape_string($_POST['gender']);
            $access = $con -> real_escape_string($_POST['access']);
            $fullname = $con -> real_escape_string($_POST['fname'] . "".$_POST['lname']);
    
           
                $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`,`password`,`email`,`contact`,`gender`,`access`) 
            VALUES ('$fname','$lname','$uname','$pword','$email','$contact','$gender','$access')";
                $con->query($sql);
            
                if ($_POST['access'] == "Customer") {
                    $sql = "INSERT INTO `customer`(`customer_name`) VALUES ('$fullname')";
                    $con->query($sql);
                    header("Location: ../admin/home.php");
                }
                else{
                    echo "Error: ". $con->error;
                }
            }
            
            $con->close();
             
            
    ?>
<?php
    include '../admin/header.php';
?>
<div class="pos-register">
        <form action="" class="form" method="post">
                <h2>Sign up</h2>
                <div class="input-group1">
                <label for="firstname" >First Name: </label>
                <input type="text" name="fname" id="fname1" class="form-reg" required>  
                </div>
                <div class="input-group1">
                <label for="lastname"> Last Name: </label>
                <input type="text" name="lname" id="lname1" class="form-reg" required>
                </div>
                <div class="input-group1">
                <label for="uname"> Username: </label>
                <input type="text" name="uname" id="uname1" class="form-reg" required>
                </div>
                <div class="input-group1">
                <label for="pword"> Password: </label>
                <input type="password" name="pword1" id="password1" class="form-reg" required>
                </div>
                <div class="input-group1">
                <label for="contact"> Contact: </label>
                <input type="int" name="ctct" id="contact1" class="form-reg" required>
                </div>
                <div class="input-group1">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" required >
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>         
                </div>
                <div class="input-group1">
                    <label for="access">Access:</label>
                    <select name="access" id="access" required >
                        <option value="Admin">Admin</option>
                        <option value="Customer">Customer</option>
                        <option value="Employee">Employee</option>
                    </select>         
                </div>
                <div class="input-group1">
                <label for="email"> Email: </label>
                <input type="text" name="email1" id="email2" class="form-reg" required>
                </div>
                <input type="submit" name="register" class="register-btn">
        </form>
    </div>
<?php
    include '../admin/footer.php';
?>