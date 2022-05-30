<?php
require_once "../config.php";
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['sub']=="Update"){
        $myPost=array_values($_POST);
        $arrPost=array_keys($_POST);
        for( $i = 0 ; $i < count($myPost)-2 ; $i++ ){
                $cartQ=$myPost[$i];
                $cartId=$arrPost[$i];
            $statement=$db->prepare("UPDATE cart SET product_quantity = :quantity WHERE cart_id=:cartId");
        $statement->bindValue(':quantity', $cartQ);
        $statement->bindValue(':cartId', $cartId);
    $statement->execute();

}
header("location: ../cart.php");

    }elseif($_POST['sub']=="checkout"){
        $_SESSION['ordered']=true;
        header("location: ../lastpage.php");
    }else{
        header("location: ../cart.php");
    }
}else{
        header("location: ../cart.php");
}
 
