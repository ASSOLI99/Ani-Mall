<?php require_once "../admin/database/database.php";
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
        $statement=$pdo->prepare("SELECT * FROM users WHERE user_email = :email AND user_password = :pass");
        $statement->bindValue(':email',$email);
        $statement->bindValue(':pass',$pass);
        $statement->execute();
        $result=$statement->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result)){

            if($result[0]['user_password'] == $pass && $result[0]['user_email'] == $email){
                $_SESSION['Uname'] = $result[0]['user_name'];
                $_SESSION['Utype'] = $result[0]['user_email'];
                $_SESSION['Uid'] = $result[0]['user_id'];
                $_SESSION['Ulocation'] = $result[0]['user_location'];
                $_SESSION['Umobile'] = $result[0]['user_mobile'];
                header("Location: ../index.php");
                exit();
            }
        }else{
            header("Location: ./index.php?error=Incorrect Password or Email");
            exit();
        }
    }

}else{
    header("Location: index.php");
    exit();
}

?>