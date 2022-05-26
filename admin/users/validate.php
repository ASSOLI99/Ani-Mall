<?php
$user_name = $_POST["title"];
$user_mobile = $_POST["description"];
$user_password = $_POST["price"];
$user_email = $_POST["email"];
if(!$user_name){
    $errors[]='name is required';
};
if(!$user_password){
    $errors[]="password is required";
};
if(!$user_mobile){
  $errors[]="mobile is required";
};
if(!$user_email){
  $errors[]="Email is required";
};

