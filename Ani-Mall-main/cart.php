<?php
ob_start();
require "navbar.php"; ?>
<?php 

 require "config.php"; 
if(isset($_SESSION['Uid'])){
if($_SESSION['signIn']==false){
    $id=$_SESSION["Uid"];
}else{
    header("Location: login/login.php?state=no");
    ob_end_flush();
}}else{
    header("Location: ./index.php?state=no");
    ob_end_flush();
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Animall Shop - About Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<body>

    <!--  defining variables & Select-->
    

    <div class="section">
        <!-- container -->
        <div class="container mt-5">
            <form action="./cart/edit.php" method="POST">
                <table class="table table-bordered table-hover table-md h5" name="SHOPPING_CART">
                    <thead>
                        <tr style="background-color:#d4e4e547;text-align:center;">

                            <th scope="col">Item name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Remove </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
     $grand_total = 0;
        //link the selected items from cart
        $statement = $db->prepare("SELECT * FROM cart  WHERE user_f_id=:userId");
        $statement->bindValue(':userId',$_SESSION['Uid']);
        $statement->execute();
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);

    if (empty($products)) {
        echo '<tr>
        <td colspan="6" style="text-align:center;"> your cart is empty. </td>
    </tr>';
        exit();
    }
    ?>
                        <?php //if (empty($products)) : ?>
                            
                        <?php// endif; ?>
                        <?php $productValues= array(); ?>
                        <?php foreach ($products as $product) : ?>

                            <tr style="text-align:center;">
                            <?php  $productValues[]= $product['product_f_id'] ?>
                            <?php  $productValues[]= $product['product_quantity'] ?>
                                <td><?php echo $product['product_name'] ?></td>
                                <td><img style="width: 80px ;" src="./admin/products/public/<?php echo $product['product_main_image'] ?>" id="cart-im"></td>
                                <td><?php echo $product['product_price'] ?></td>

                                <td>
                                    <input type="number" name="<?php echo $product['cart_id'] ?>" style=" width: 50px; border:solid 1px #709192;" min="1" max="15" value="<?php echo $product['product_quantity']; ?>">
                                </td>
                                <td> <?php
                                        $total = ($product['product_price'] * $product['product_quantity']);
                                        $grand_total += $total;
                                        ?><h5 id="cart-total-price" style="font-size:18px">$<?php echo  $total ?></h5>
                                </td>
                                <td> <a href="cart/delete.php?delete=<?php echo $product['cart_id'] ?>" class="btn btn-outline-secondary btn-sm "><i class="fa-solid fa-xmark" aria-hidden="true" style="color: #709192;"></i></a></td>

                            </tr>

                        <?php endforeach ?>
                        <?php $_SESSION['Odetails']=$productValues;?>
                        <tr style="text-align:center;">
                            <?php
                            $statement = $db->prepare("SELECT * FROM coupons");
                            $statement->execute();
                            $coupons = $statement->fetchAll(PDO::FETCH_ASSOC);
                            ?>
                            <td colspan="3"><button type="submit" name="back" class="btn btn-warning my-3 row3" style="  color: #fff; background-color:#709192 !important; border-color: #709192;"><a href="shop.php" style="text-decoration: none;color:white;">Continue shopping <i class="fas fa-shopping-cart"></i></a></button></td>
                            <td>
                                    <input type="hidden" name="update" value="<?php $_SESSION['Uid'] ?>">
                                    <input type="submit" class="btn btn-primary mt-2 row3" name="sub" value="Update" style="color: #fff; background-color:#709192 !important; border-color: #709192;"></a>
                            </td>
                            <td>
                                <h5 id="cart-total-price" style="font-size:20px" name="t">$<?php echo $grand_total; ?> </h5>
                            </td>

                            <td>
                                <button type="submit" name="sub" value="checkout" class="btn btn-success my-3 mx-1 row3 " style="  color: #fff; background-color:#709192 !important; border-color: #709192;"><a href="checkout.php" style="text-decoration: none;color:white;">Proceed to Checkout<i class="fas fa-shopping-cart"></i></a></button>
                            </td>
                        </tr>
                    </tbody>
                </table>


            </form>


            <div class="container">

                <div class="row g-3 align-items-center">
                    <div class="col-4">

                    </div>
                </div>


                <span id="passwordHelpInline" class="form-text " style="font-size: 20px;">

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

                <!-- form for coupon -->
                <form action="" method="GET">
                    <div class="col-auto " style="width:500px ;">
                        <input type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Add Coupon here" name="discount" value="" style="font-size:17px">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success my-3 " style="  color: #fff; background-color:#709192 !important; border-color: #709192;font-size:15px;width:300px">Apply Coupon</button>
                    </div>
                </form>
                
            </div>
            <div class="col-sm-8">

                
                <div class="card mb-5 border  " style="width: 36rem;float:right;">
                    <div class="card-header" style="color:#245152 ;">
                        discount
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <span style="color:#245152 ;"> Total before discount :</span> $<?php echo $grand_total; ?> </li>

                        
                        <li class="list-group-item">
                            <span style="color: red ;"> 
                            <?php
                            if (isset($_GET['discount'])) {
                            
                                if ($_GET['discount'] ==  "ahmed123") {
                                    $grand_total = $grand_total - ($grand_total * 20 / 100);
                                } else {
                                    echo 'invalid coupon';
                                }
                            }
                            $_SESSION['sum'] = $grand_total;
                            ?>
                            </span>
                        </li>
                        <li class="list-group-item"> <span style="color:#245152 ;">Total after discount :</span> $<?php echo $grand_total ?></li>
                       
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<?php require "footer.php"; ?>