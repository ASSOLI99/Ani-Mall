 <!-- Start Footer -->
 <footer class="bg-dark" id="tempaltemo_footer">
     <div class="container">
         <div class="row">

             <div class="col-md-4 pt-5">
                 <h2 class="h2 text-success border-bottom pb-3 border-light logo">Animall store</h2>
                 <ul class="list-unstyled text-light footer-link-list">
                     <li>
                         <i class="fas fa-map-marker-alt fa-fw"></i>
                         123 Swifiya-Amman at Animall 10660
                     </li>
                     <li>
                         <i class="fa fa-phone fa-fw"></i>
                         <a class="text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                     </li>
                     <li>
                         <i class="fa fa-envelope fa-fw"></i>
                         <a class="text-decoration-none" href="mailto:abdullahassoli@gmail.com">animallstore@company.com</a>
                     </li>
                 </ul>
             </div>

             <div class="col-md-4 pt-5">
                 <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                 <ul class="list-unstyled text-light footer-link-list">
                     <?php $sql = 'SELECT * FROM categories';
                        $statement = $db->query($sql);
                        $data = $statement->fetchAll();
                        foreach ($data as $value) : ?>
                         <li><a class="text-decoration-none" href="./shop.php?categoryId=<?php echo $value['category_id'] ?>"><?php echo $value['category_name']; ?></a></li>
                     <?php endforeach; ?>

                 </ul>
             </div>

             <div class="col-md-4 pt-5">
                 <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                 <ul class="list-unstyled text-light footer-link-list">
                     <li><a class="text-decoration-none" href="./index.php">Home</a></li>
                     <li><a class="text-decoration-none" href="./about.php">About Us</a></li>
                     <li><a class="text-decoration-none" href="https://www.google.com/search?q=+123+Swifiya-Amman+at+Animall+10660&rlz=1C1CHZN_enJO984JO984&sxsrf=ALiCzsYxQ82eO_FiPv2SKL-0PQTgpD8xtQ%3A1653544404479&ei=1BWPYoLvHJGGxc8Pi7qewA0&ved=0ahUKEwiCqeX2vPz3AhURQ_EDHQudB9gQ4dUDCA4&uact=5&oq=+123+Swifiya-Amman+at+Animall+10660&gs_lcp=Cgdnd3Mtd2l6EANKBAhBGABKBAhGGABQAFgAYNwFaABwAXgAgAH7AYgB-wGSAQMyLTGYAQCgAQKgAQHAAQE&sclient=gws-wiz">Shop Locations</a></li>
                     <li><a class="text-decoration-none" href="#">FAQs</a></li>
                     <li><a class="text-decoration-none" href="./contact.php">Contact</a></li>
                 </ul>
             </div>

         </div>

         <div class="row text-light mb-4">
             <div class="col-12 mb-3">
                 <div class="w-100 my-3 border-top border-light"></div>
             </div>
             <div class="col-auto me-auto">
                 <ul class="list-inline text-left footer-icons">
                     <li class="list-inline-item border border-light rounded-circle text-center">
                         <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                     </li>
                     <li class="list-inline-item border border-light rounded-circle text-center">
                         <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                     </li>
                     <li class="list-inline-item border border-light rounded-circle text-center">
                         <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                     </li>
                     <li class="list-inline-item border border-light rounded-circle text-center">
                         <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                     </li>
                 </ul>
             </div>
             <div class="col-auto">
                 <label class="sr-only" for="subscribeEmail">Email address</label>
                 <div class="input-group mb-2">
                     <input type="text" class="form-control bg-dark border-light text-white" id="subscribeEmail" placeholder="Email address">
                     <div class="input-group-text btn-success text-light btn">Subscribe</div>
                 </div>
             </div>
         </div>
     </div>

     <div class="w-100 bg-black py-3">
         <div class="container">
             <div class="row pt-2">
                 <div class="col-12">
                     <p class="text-left text-light">
                         Copyright &copy; 2021 Animall store
                         | Designed by <a rel="sponsored" href="https://animallstore.com" target="_blank">animallstore</a>
                     </p>
                 </div>
             </div>
         </div>
     </div>

 </footer>
 <!-- End Footer -->

 <!-- Start Script -->
 <script src="assets/js/jquery-1.11.0.min.js"></script>
 <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
 <script src="assets/js/bootstrap.bundle.min.js"></script>
 <script src="assets/js/templatemo.js"></script>
 <script src="assets/js/custom.js"></script>
 <!-- End Script -->

 </body>

 </html>

</html>