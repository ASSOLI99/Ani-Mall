<?php
$title = $_POST["title"];
$description = $_POST["description"];
$main_img = $_FILES['img'] ?? null;
if(isset($added)){
  $main_img['name']="imgIsAdded";//the image is added
}
$imagePath="";
if(!$title){
    $errors[]='product title is required';
};
if($main_img['name']==null){
  $errors[]="First Image is required";
};
if(!is_dir("images")){
  mkdir("images");
}
if(empty($errors)){
  $image = $_FILES['img'] ?? null;
  var_dump($_FILES["img"]);
  $imagePath=$product["category_image"];   //change the image name here
  if($image && $image["tmp_name"]){
    if($product["category_image"]){        //and the image name here
        unlink($product["category_image"]);//and the image name here
    }
    $imagePath="images/".randomString(8)."/".$image["name"];
    mkdir(dirname($imagePath));
    move_uploaded_file($image['tmp_name'],$imagePath);
  }

};