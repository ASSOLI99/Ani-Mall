<?php
require_once "../config.php";
if(isset($_POST['from'])){
    if($_POST['productQuantity']<1){
        $_POST['productQuantity']=1;
    }elseif($_POST['productQuantity']>12){
        $_POST['productQuantity']=12;
    }
    $idLocation=$_POST['addMe'];
    $sql='INSERT INTO cart (product_name, product_main_image, product_f_id, product_price, product_quantity ,user_f_id)
    VALUES (:title, :image, :prodId, :price, :quant, :userId)';
    $statement=$db->prepare($sql);
    $statement->bindValue(":title",$_POST['productName']);
    $statement->bindValue(":image",$_POST['mainImage']);
    $statement->bindValue(":prodId",$_POST['addMe']);
    $statement->bindValue(":price",$_POST['productPrice']);
    $statement->bindValue(":quant",$_POST['productQuantity']);
    $statement->bindValue(":userId",$_POST['productUserId']);
    $statement->execute();
    if($_POST['from']==1){
        header("Location: ../shop.php");
    }else{
        header("Location: ../shop-single.php?product=$idLocation!");
    }
    
}else{
    header("Location: ../shop.php");
}