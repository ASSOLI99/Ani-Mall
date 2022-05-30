<?php
require('config.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if(isset($_POST['email'] ) && isset($_POST['password'])){

    $statement = $DB->prepare("SELECT * FROM users WHERE email= :email AND password = :password");
    $statement -> bindValue(":password", $_POST['password'] );
    $statement -> bindValue(":email", $_POST['email'] );
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
   
    if(!empty($users)){
       header("location: index.php");
}

else{
  echo  ("<span style='color: red'> Something went wrong <span>");
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">

    <title>Document</title>
</head>

<body>
    <form action="login.php" method="POST">
        <div class="container">

            <div class="row"></div>

            <div class="col-sm-3" id="forms">
            <h1 class="mainHeader">Ani-mall.</h1>
                <h1> Login </h1>
                <label for="email"> Email: </label>
                <input class="form-control" type="email" name="email" placeholder="Email" required> <br>
                <label for="password"> Password: </label>
                <input class="form-control" type="password" name="password" placeholder="password" required><br>
                <hr class="mb-3">
                <?php if(isset($_GET['error'])) { ?>
                    <p class="text-danger"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                <input id="button" class="btn btn-outline-light border-login" type="submit" name="create">
                    <p class="mt-3"><a  id="btn" href="registration.php"> Create account </a></p><br>
                    <p class="mt-3">   <a href="../index.php" class="text-white link" style="text-decoration:none ;">Back to shop</a></p>
                </div>

            </div>
        </div>
    </form>

    </div>
    </div>
    </div>
    </div>

</body>

</html>