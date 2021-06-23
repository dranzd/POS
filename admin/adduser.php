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
            }
            
            $con->close();
             
            
    ?>
<?php
    include '../admin/header.php';
?>
<style>
    .wrapper1{
  max-width: 500px;
  width: 100%;
  background: #fff;
  margin: 20px auto;
  box-shadow: 1px 1px 2px rgba(0,0,0,0.125);
  padding: 30px;
}

.wrapper1 .title{
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 25px;
  color: greenyellow;
  text-transform: uppercase;
  text-align: center;
}

.wrapper1 .form{
  width: 100%;
}

.wrapper1 .form .inputfield{
  margin-bottom: 15px;
  display: flex;
  align-items: center;
}

.wrapper1 .form .inputfield label{
   width: 200px;
   color: green;
   margin-right: 10px;
  font-size: 14px;
}

.wrapper1 .form .inputfield .input,
.wrapper1 .form .inputfield .textarea{
  width: 100%;
  outline: none;
  border: 1px solid #d5dbd9;
  font-size: 15px;
  padding: 8px 10px;
  border-radius: 3px;
  transition: all 0.3s ease;
}

.wrapper1 .form .inputfield .textarea{
  width: 100%;
  height: 125px;
  resize: none;
}

.wrapper1 .form .inputfield .custom_select{
  position: relative;
  width: 100%;
  height: 37px;
}

.wrapper1 .form .inputfield .custom_select:before{
  content: "";
  position: absolute;
  top: 12px;
  right: 10px;
  border: 8px solid;
  border-color: #d5dbd9 transparent transparent transparent;
  pointer-events: none;
}

.wrapper1 .form .inputfield .custom_select select{
  -webkit-appearance: none;
  -moz-appearance:   none;
  appearance:        none;
  outline: none;
  width: 100%;
  height: 100%;
  border: 0px;
  padding: 8px 10px;
  font-size: 15px;
  border: 1px solid #d5dbd9;
  border-radius: 3px;
}


.wrapper1 .form .inputfield .input:focus,
.wrapper1 .form .inputfield .textarea:focus,
.wrapper1 .form .inputfield .custom_select select:focus{
  border: 1px solid #fec107;
}

.wrapper1 .form .inputfield p{
   font-size: 14px;
   color: #757575;
}
.wrapper1 .form .inputfield .check{
  width: 15px;
  height: 15px;
  position: relative;
  display: block;
  cursor: pointer;
}
.wrapper1 .form .inputfield .check input[type="checkbox"]{
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
}
.wrapper1 .form .inputfield .check .checkmark{
  width: 15px;
  height: 15px;
  border: 1px solid #fec107;
  display: block;
  position: relative;
}
.wrapper1 .form .inputfield .check .checkmark:before{
  content: "";
  position: absolute;
  top: 1px;
  left: 2px;
  width: 5px;
  height: 2px;
  border: 2px solid;
  border-color: transparent transparent #fff #fff;
  transform: rotate(-45deg);
  display: none;
}
.wrapper1 .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark{
  background: #fec107;
}

.wrapper1 .form .inputfield .check input[type="checkbox"]:checked ~ .checkmark:before{
  display: block;
}

.wrapper1 .form .inputfield .btn{
  width: 100%;
   padding: 8px 10px;
  font-size: 15px; 
  border: 0px;
  background:  greenyellow;
  color: #fff;
  cursor: pointer;
  border-radius: 3px;
  outline: none;
}

.wrapper1 .form .inputfield .btn:hover{
  background: green;
}

.wrapper1 .form .inputfield:last-child{
  margin-bottom: 0;
}

@media (max-width:420px) {
  .wrapper1 .form .inputfield{
    flex-direction: column;
    align-items: flex-start;
  }
  .wrapper1 .form .inputfield label{
    margin-bottom: 5px;
  }
  .wrapper1 .form .inputfield.terms{
    flex-direction: row;
  }
}

</style>
<div class="wrapper1">
    <form action="" class="form" method="POST">
    <div class="title">
      Registration Form
    </div>
    <div class="form">
       <div class="inputfield">
          <label>First Name</label>
          <input type="text" class="input" name="fname">
       </div>  
        <div class="inputfield">
          <label>Last Name</label>
          <input type="text" class="input" name="lname">
       </div> 
       <div class="inputfield">
          <label>Username</label>
          <input type="text" class="input" name="uname">
       </div>   
       <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input" name="pword1">
       </div>  
        <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
            <select name="gender">
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
       </div> 
       <div class="inputfield">
          <label>Access</label>
          <div class="custom_select">
            <select name="access">
              <option value="">Select</option>
              <option value="male">Admin</option>
              <option value="female">Employee</option>
            </select>
          </div>
       </div> 
        <div class="inputfield">
          <label>Email Address :</label>
          <input type="text" class="input"  name="email1">
       </div> 
      <div class="inputfield">
          <label>Contact Number:</label>
          <input type="text" class="input" name="ctct">
       </div> 
      <div class="inputfield">
        <input type="submit" value="Register" class="btn" name="register">
      </div>
    </div>
</div>
</form>
<?php
    include '../admin/footer.php';
?>