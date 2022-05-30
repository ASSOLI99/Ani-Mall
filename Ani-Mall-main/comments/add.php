<?php
require "../config.php";
session_start();
$productId=$_POST['product_id'];
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_SESSION['Uid'])){
    $statement=$db->prepare("INSERT INTO comments (comment, comment_product_id, comment_user_id, comment_image,comment_name)
 VALUES (:comment, :comment_product_id, :comment_user_id, :comment_img, :comment_name)
 ");
 $statement->bindValue(':comment', $_POST['theComment']);
 $statement->bindValue(':comment_product_id', $productId);
 $statement->bindValue(':comment_user_id', $_POST['user_id']);
 $statement->bindValue(':comment_img', "../images/user-image.jpg");
 $statement->bindValue(':comment_name', $_POST['user_name']);
 $statement->execute();
 header("location:../shop-single.php?product=$productId");
}else{
    header("Location: ../login/index.php");
}
