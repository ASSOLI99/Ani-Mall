<?php 
require "./config.php";
include "navbar.php"; 
// if(!isset($_SESSION['Uname']) || !isset($_SESSION['Uemail']) || !isset($_SESSION['Uid']))){

// }

if(isset($_GET['product'])){
    $productGET=$_GET['product'];
    $sql='SELECT * FROM products WHERE product_id=:Category_id';
    $statement=$db->prepare($sql);
    $statement->bindValue(":Category_id",$productGET);
    $statement->execute();
    $data=$statement->fetchAll(PDO::FETCH_ASSOC);
}else{
header("Location: ./shop.php");
}   

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Animall Shop - Product Detail Page</title>
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

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
<!--
    
TemplateMo 559 Animall Shop
https://templatemo.com/tm-559-Animall-shop
-->
<style>
    body{margin-top:20px;}

.comment-wrapper .panel-body {
    max-height:650px;
    overflow:auto;
}

.comment-wrapper .media-list .media img {
    width:64px;
    height:64px;
    border:2px solid #e5e7e8;
}

.comment-wrapper .media-list .media {
    border-bottom:1px dashed #efefef;
    margin-bottom:25px;
}
</style>
</head>

<body>

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="./admin/products/public/<?php echo $data[0]['product_main_image'] ?>" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->
                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="./admin/products/public/<?php
                                                 if(!empty($data[0]['product_desc_image_1'])){
                                                    echo $data[0]['product_desc_image_1'];
                                                 }else{
                                                    echo $data[0]['product_main_image'];
                                                 }
                                                 
                                                 ?>" alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#">
                                            <img class="card-img img-fluid" src="./admin/products/public/<?php
                                                 if(!empty($data[0]['product_desc_image_2'])){
                                                    echo $data[0]['product_desc_image_2'];
                                                 }else{
                                                    echo $data[0]['product_main_image'];
                                                 }
                                                 
                                                 ?>" alt="Product Image 2">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#">
                                            <img class="card-img img-fluid" src="./admin/products/public/<?php
                                                 if(!empty($data[0]['product_desc_image_3'])){
                                                    echo $data[0]['product_desc_image_3'];
                                                 }else{
                                                    echo $data[0]['product_main_image'];
                                                 }
                                                 
                                                 ?>" alt="Product Image 3">
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#">
                                            <img class="card-img img-fluid" src="./admin/products/public/<?php
                                                 if(!empty($data[0]['product_desc_image_1'])){
                                                    echo $data[0]['product_desc_image_1'];
                                                 }else{
                                                    echo $data[0]['product_main_image'];
                                                 }
                                                 
                                                 ?>" alt="Product Image 4">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="#">
                                            <img class="card-img img-fluid" src="./admin/products/public/<?php
                                                 if(!empty($data[0]['product_desc_image_2'])){
                                                    echo $data[0]['product_desc_image_2'];
                                                 }else{
                                                    echo $data[0]['product_main_image'];
                                                 }
                                                 
                                                 ?>" alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#">
                                            <img class="card-img img-fluid" src="./admin/products/public/<?php
                                                 if(!empty($data[0]['product_desc_image_3'])){
                                                    echo $data[0]['product_desc_image_3'];
                                                 }else{
                                                    echo $data[0]['product_main_image'];
                                                 }
                                                 
                                                 ?>" alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Third slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?php echo $data[0]['product_name'] ?></h1>
                            <p class="h3 py-2">$<?php echo $data[0]['product_price'] ?></p>
                         
                            <h6>Description:</h6>
                            <p><?php echo $data[0]['product_description'] ?></p>
                            <!-- *********** description add it later ************
                                 <h6>Specification:</h6>

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">Size :
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">S</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">M</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">L</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">XL</span></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                    </div>
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                    </div>
                                </div>
                            </form> -->
                              <form method="POST" action="./addToCart/add.php">
                                  <input type="hidden" name="from" value="2">
                                  <input type="hidden" name="productName" value="<?php echo $data[0]['product_name'] ?>">
                                  <input type="hidden" name="addMe" value="<?php echo $data[0]['product_id'] ?>">
                                  <input type="hidden" name="productPrice" value="<?php echo $data[0]['product_price'] ?>">
                                  <input type="hidden" name="mainImage" value="<?php echo $data[0]['product_main_image'] ?>">
                                  <?php if(isset($_SESSION['Uid'])){ ?>
                                    <input type="hidden" name="productUserId" value="<?php echo $_SESSION['Uid'] ?>">
                                    <?php } ?>
                                  
                                  <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="productQuantity" value="1" id="quantityInput">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="minusButton">-</span></li>
                                            <li class="list-inline-item"><p class="w-2 bg-white border-none" id="quantValue">1</p></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="plusButton">+</span></li>
                                        </ul>
                                        <?php if(isset($_SESSION['Uid'])){ ?>
                                            <div class="row pb-3">
                                      <div class="col d-grid">
                                          <button type="submit" class="btn btn-success btn-lg">Add To Cart</button>
                                      </div>
                                  </div>
                                    <?php }else{ ?>
                                        <div class="row pb-3">
                                      <div class="col d-grid">
                                          <a href="./login/index.php" class="btn btn-success btn-lg">Login To Add</a>
                                      </div>
                                  </div>
                                    <?php } ?>

                                  
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Close Content start -->
    
    <?php  
        $sqlc='SELECT * FROM comments WHERE comment_product_id=:prod_id';
        $statementCom=$db->prepare($sqlc);
        $statementCom->bindValue(':prod_id',$_GET['product']);
        $statementCom->execute();
        $comData=$statementCom->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <div class="container pt-5">
<div class="row bootstrap snippets bootdeys">
    <div class="col-md-12 col-sm-12">
        <div class="comment-wrapper">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Comment panel
                </div>
                <form action="./comments/add.php" method="POST">
                <div class="panel-body pt-3">
                <?php  if(isset($_SESSION['Uid'])){ ?>
                    <textarea class="form-control" name="theComment" placeholder="write a comment..." rows="3"></textarea>
                    <?php } ?>
                    <br>
                    <?php  if(isset($_SESSION['Uid'])){ ?>
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['Uid'] ?>">
                        <input type="hidden" name="user_name" value="<?php echo $_SESSION['Uname'] ?>">
                        <input type="hidden" name="product_id" value="<?php echo $_GET['product'] ?>">
                        <button type="submit" class="btn btn-info pull-right">Post</button>
                    <?php }else{ ?>
                        <a href="./login/index.php" class="btn btn-info pull-right">signin to comment</a>
                    <?php } ?>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <ul class="media-list">
                        <?php foreach($comData as $comment){ ?>
                        
                        <li class="media">
                            <a href="#" class="pull-left">
                                <img src="./images/user-image.jpg" alt="" class="img-circle">
                            </a>
                            <div class="media-body">
                                <!--comment date section not done 
                                    <span class="text-muted pull-right">
                                    <small class="text-muted">30 min ago</small>
                                </span> -->
                                <strong class="text-success">@<?php echo $comment['comment_name'] ?></strong>
                                <p>
                                <?php echo $comment['comment'] ?>
                                </p>
                            </div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>

    <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Related Products</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">
            <?php $select="SELECT  categories.category_name,products.product_main_image,products.product_price,products.product_description,products.product_name,products.product_id 
									FROM products LEFT JOIN categories ON categories.category_id = product_categorie_id ";
									$fromd=$db->prepare($select);
									$fromd->execute();
									$shwwl= $fromd->fetchAll();
									foreach($shwwl as $value):
									
									?>
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="./admin/products/public/<?php echo $value['product_main_image']; ?>">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                <li><a class="btn btn-success text-white mt-2" href="shop-single.php?product=<?php echo $value['product_id']?>"><i class="far fa-eye"></i></a></li>
                                        <li>
                                        <form method="POST" action="<?php 
                                             if($_SESSION['signIn']==false){
                                                echo "./addToCart/add.php";
                                            }else{
                                                echo "./login/index.php";
                                                
                                            }
                                            ?>">
                                  <input type="hidden" name="from" value="1">   
                                  <input type="hidden" name="productName" value="<?php echo $value['product_name'] ?>">
                                  <input type="hidden" name="addMe" value="<?php echo $value['product_id'] ?>">
                                  <input type="hidden" name="productPrice" value="<?php echo $value['product_price'] ?>">
                                  <input type="hidden" name="mainImage" value="<?php echo $value['product_main_image'] ?>">
                                  <?php if(isset($_SESSION['Uid'])){ ?>
                                  <input type="hidden" name="productUserId" value="<?php echo $_SESSION['Uid'] ?>">
                                  <?php } ?>
                                  <input type="hidden" name="productQuantity" value="1" id="quantityInput">
                                  <?php if(isset($_SESSION['Uid'])){ ?>
                                            <button class="btn btn-success text-white my-2" type="submit">
                                           
                                            <i class="fas fa-cart-plus"></i>
                                            </button>
                                            <?php }else{ ?>
                                            <a class="btn btn-success text-white my-2" href="./login/index.php">
                                           
                                            <i class="fas fa-cart-plus"></i>
                                            </a>
                                            <?php } ?>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <a href="shop-single.php?product=<?php echo $value['product_id']?>" class="h3 text-decoration-none"><?php echo $value['product_name']; ?></a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li><?php echo $value['category_name']; ?></li>
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <!-- <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul> -->
                            <p class="text-center mb-0">$<?php echo $value['product_price']; ?></p>
                        </div>
                    </div>
                </div>
<?php endforeach; ?>
                

            </div>


        </div>
    </section>
    <!-- end article -->
    <?php include "footer.php"?>
    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->
    <script src="assets/js/main.js"></script>

</body>

</html>