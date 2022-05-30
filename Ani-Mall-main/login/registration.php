<?php

use LDAP\Result;

require('config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="regstration.css">
    
    <title> ANIMALL registration </title>
</head>

<body>
    <div>
        <?php
        $error = 0;
        if (isset($_POST['create'])) {

            $UserName    = $_POST['username'];
            $Email       = $_POST['email'];
            $Password    = $_POST['password'];
            $Confirm     = $_POST['repassword'];
            $Phone       = $_POST['mobile'];
            $Location    = $_POST['location'];
            $emailvali   = "";
            $emailErr    = "";
            $regexpass   = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.!@$%^{}[]:;<>,.?~_+-=|).{8,32}+$/";
            $regexemail  = "/^[a-zA-Z\._\d] + @ [a-zA-Z\d\._]= \. [a-zA-Z\d\.]+$/";
            
            

            $sql = "INSERT INTO users (user_name, user_email, user_password, user_mobile, user_location) VALUES(?,?,?,?,?)";
		$stmtinsert = $DB->prepare($sql);
		$result = $stmtinsert->execute([$UserName, $Email, $Password,$Phone, $Location]);
		if($result){
			echo '';
		}else{
			header("location: registration.php");
		}
    } 
    
    if (isset($_POST['create'])) {

        //password alert
        
        if (preg_match($regexpass, $_POST['password'])) {
        
            $output = "<span style='color: green'> ✓ </span>";
            $error++;
        } else {
           
            
            $output = "<span style='color: red'> Password is invalid,password should contain At least 8 characters, uppercase and lowercase letters,numbers,and at least one special character </span> <br>";
            
        }
        
        //password Confirmation
        
        if ($Confirm === $Password) {
        
            $outputconf = "<span style='color: green'> ✓ </span> <br> ";
            $error++;
        } else {
            $outputconf = "<span style='color: red'> Password does not match  </span> <br>";
         
        }
    }
   
        ?>
        
       
    


    </div>

    <div>
        <form action="" method="POST">
            <div class="container">

                <div class="row"></div>

                <div class="col-sm-3" id="forms">
                    <h1 class="main-title"> Ani-mall.</h1>
                   
                    <h1> Create new account. </h1>

                    <hr class="mb-3">
                    <label for="username"> Username </label>
                    <input class="form-control" type="text" name="username" placeholder="username" required>

                    <label for="email"> Email: </label>
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                    <?php
                    if (isset($outputemail)) {
                        echo $outputemail;
                    }
                    ?>
                    <label for="password"> Password: </label>
                    <input class="form-control" type="password" name="password" placeholder="password" required>

                    <?php
                    if (isset($output)) {
                        echo $output;
                    }
                    ?>
                    <label for="re-pass"> Confirm password: </label>
                    <input class="form-control" type="password" name="repassword" placeholder="Confirm password" required>

                    <?php
                    if (isset($outputconf)) {
                        echo $outputconf;
                    }
                    ?>

                    <label for="phonenum"> Phone number </label>
                    <input class="form-control" type="tel"  name="mobile" placeholder="phonenumber" required>


                    <?php
                    if (isset($outputphone)) {
                        echo $outputphone;
                    }
                    ?>


                    <label for="location"> Your location </label>
                    <input class="form-control" type="text" name="location" placeholder="Location" required>

                    



                    <hr class="mb-3">
                 
                    <input id="botton" class="btn btn-outline-light mb-3" type="submit" name="create">
                    <p class="mt-3"> <a href="index.php" class="text-white link" style="text-decoration:none ;">Have an account</a></p> <br>
                    <p class="mt-3">   <a href="../index.php" class="text-white link" style="text-decoration:none ;">Back to shop</a></p>                </div>
            </div>
    </div>
    



    </form>
   </div>
   <?php
if($error == 2){
    header("location: login.php");

}


?>
</body>

</html>