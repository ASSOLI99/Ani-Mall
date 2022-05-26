<?php
/** @var pdo \PDO */
require_once "../database/database.php";
$id=$_GET['id'] ?? null;
if(!$id){
    header("location: ../index.php");
    exit;
}
echo "user id: ";
echo $id;
$statement=$pdo->prepare("SELECT * FROM users WHERE user_id=:id");
$statement->bindValue(':id',$id);
$statement->execute();
$users=$statement->fetch(PDO::FETCH_ASSOC); //give me the data
$errors =[];
$user_mobile=$users["user_mobile"];
$user_name=$users["user_name"];
$user_email=$users["user_email"];
$user_password=$users["user_password"];
if($_SERVER["REQUEST_METHOD"]==="POST"){
  require_once "./validate.php";

if(empty($errors)){

$statement=$pdo->prepare("UPDATE users SET user_name = :title,
                                              user_mobile = :mobile,
                                              user_email = :email,
                                              user_password = :pass WHERE user_id=:id");
 $statement->bindValue(':title', $user_name);
 $statement->bindValue(':mobile', "$user_mobile");
 $statement->bindValue(':pass', "$user_password");
 $statement->bindValue(':email', "$user_email");
 $statement->bindValue(':id', $id);
 $statement->execute();
 header('location:../users.php');
};
};

?>

<?php include_once "./partials/header.php" ?>
      <p><a href="../users.php" class="btn btn-secondary">GO Back</a></p>
      
    <h1>Edit Users <b><?php echo $users["user_name"] ?></b></h1>
   <?php include_once "./form.php" ?>
<?php include_once "./partials/footer.php" ?>