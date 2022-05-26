<?php
/** @var $pdo \PDO */
require_once "./../database.php";
$id=$_POST['id'] ?? null;
if(!$id){
    header("location: index.php");
    exit;
}
try{
$statement=$pdo->prepare("DELETE FROM categories WHERE category_id=:id"); 
$statement->bindValue(":id",$id);
$statement->execute();
header("location:index.php");
}
catch (PDOException $e) {
    echo "<script>";
    echo 'alert("You Can\'t delete any category containing products");';
    echo 'window.location.href="index.php"';
    
    echo "</script>";
    
  
}
?>