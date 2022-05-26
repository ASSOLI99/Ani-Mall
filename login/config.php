<?php
$DB=new PDO("mysql:host=localhost;port=3306;dbname=e_commerce","root","");
$DB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>
