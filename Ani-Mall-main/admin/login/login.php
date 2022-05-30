<?php require_once "../database/database.php";
session_start();
if(isset($_POST['email']) && isset($_POST['password'])){
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $email=validate($_POST['email']);
    $pass=validate($_POST['password']);

    if(empty($email)){
        header("Location: index.php?error=Email is required");
        exit();
    }elseif(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else{
        $statement=$pdo->prepare("SELECT * FROM admins WHERE admin_email = :email AND admin_password = :pass");
        $statement->bindValue(':email',$email);
        $statement->bindValue(':pass',$pass);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result)){

            if($result[0]['admin_password'] == $pass && $result[0]['admin_email'] == $email){
                $_SESSION['name'] = $result[0]['admin_name'];
                $_SESSION['type'] = $result[0]['admin_type'];
                $_SESSION['image'] = $result[0]['admin_image'];
                header("Location: ../index.php");
                exit();
            }
        }else{
            header("Location: index.php?error=Incorrect Password or Email");
            exit();
        }
    }

}else{
    header("Location: index.php");
    exit();
}

?>
