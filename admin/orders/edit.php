<?php
/** @var pdo \PDO */
require_once "../database/database.php";
$id=$_GET['id'] ?? null;
if(!$id){
    header("location: ../index.php");
    exit;
}
echo "Order id: ";
echo $id;
$statement=$pdo->prepare("SELECT * FROM orders WHERE order_id=:id");
$statement->bindValue(':id',$id);
$statement->execute();
$orders=$statement->fetch(PDO::FETCH_ASSOC); //give me the data
$errors =[];
$order_mobile=$orders["order_mobile"];
$order_total=$orders["order_total"];
$order_status=$orders["order_status"];
if($_SERVER["REQUEST_METHOD"]==="POST"){
  require_once "./validate.php";

if(empty($errors)){

$statement=$pdo->prepare("UPDATE orders SET order_mobile = :mobile,
                                              order_total = :total,
                                              order_status = :status WHERE order_id=:id");
 $statement->bindValue(':mobile', $order_mobile);
 $statement->bindValue(':total', "$order_total");
 $statement->bindValue(':status', "$order_status");
 $statement->bindValue(':id', $id);
 $statement->execute();
 header('location:../orders.php');
};
};

?>

<?php include_once "./partials/header.php" ?>
      <p><a href="../users.php" class="btn btn-secondary">GO Back</a></p>
      
    <h1>Edit Order <b><?php echo $orders["order_user_name"] ?></b></h1>
   <?php include_once "./form.php" ?>
<?php include_once "./partials/footer.php" ?>