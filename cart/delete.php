<?php
/** @var $pdo \PDO */
require_once "../config.php";
$id=$_GET['delete'] ?? null;
if(!$id){
    header("location: ../cart.php");
    exit;
}

$statement=$db->prepare("DELETE FROM cart WHERE cart_id=:id"); 
$statement->bindValue(":id",$id);
$statement->execute();
header("location: ../cart.php");