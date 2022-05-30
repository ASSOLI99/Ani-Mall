<?php require "config.php";
require "navbar.php";
?>
<!-- search start -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="search.php" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="Search" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- search end -->
    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4 fw-bolder">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                <a href="./shop.php" class="collapsed d-flex justify-content-between h3 text-decoration-none pb-3">- All</a>
<?php
$sql='SELECT * FROM categories';
$statement=$db->query($sql);
$data=$statement->fetchAll();

foreach($data as $value):
?>                  
                   
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none pb-3" href="shop.php?categoryId=<?php echo $value['category_id']?>">
                      - <?php echo $value['category_name']?>
                        </a>
                   
<?php endforeach; ?>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
<?php
if(isset($_GET["Search"])){
    $searchResult=$_GET['Search'];
    $sql='SELECT * FROM products WHERE product_name LIKE :productName LIMIT 15';
    $statement=$db->prepare($sql);
    $statement->bindValue(':productName',"%$searchResult%");
}else{
    $sql='SELECT * FROM products LIMIT 15 OFFSET 0';
    $statement=$db->prepare($sql);
}
$statement->execute();
$data=$statement->fetchAll();

foreach($data as $value):
?>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="./admin/products/public/<?php echo $value['product_main_image']?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.html" class="h3 text-decoration-none"><?php echo $value['product_name']?></a>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <!-- stars -->
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0"><?php echo $value['product_price']?>$</p>
                            </div>
                        </div>
                    </div>

<?php endforeach; ?>
                </div>
                <!-- <div div="row">
                    <ul class="pagination pagination-lg justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                        </li>
                    </ul>
                </div> -->
            </div>

        </div>
    </div>
    <!-- End Content -->

  


   

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
<?php include "footer.php"?>