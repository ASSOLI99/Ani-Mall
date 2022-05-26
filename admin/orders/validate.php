<?php
$order_total = $_POST["total"];
$order_mobile = $_POST["mobile"];
$order_status = $_POST["status"];
if(!$order_total){
    $errors[]='total is required';
};
if(!$order_status){
    $errors[]="status is required";
};
if(!$order_mobile){
  $errors[]="mobile is required";
};

