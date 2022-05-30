<?php require "../config.php";  
$id=36;
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>User</title>
  <link rel="stylesheet" href="style.css">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Card</title>
    <!-- SEO -->
    <!-- SEO FIN -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="styles.css">
   
    
    <style>
       
    </style>
</head>
<body>

    <!-- Fondo detras con efecto blur -->
    <

    <div class="main-content">
        <!-- Parte izquierda del cv -->
        <aside class="main-content__left">
            <figure class="user-profile">
               
                <img class="user-profile__img" src="./img/profile.jpg"> <!-- Sustituir fondo detras -->
                <figcaption class="user-profile__info">
                    <h1 class="user-profile__name"></h1> <!-- Sustituir Nombre -->
                    <p class="user-profile__ocupation"><strong></strong></p> <!-- Sustituir Dedicación -->
                    <p class="user-profile__tagline"><em></em></p> <!-- Sustituir Tagline -->
                </figcaption>
            </figure>
        </aside>

        <!-- Parte derecha - contenido principal -->
        <main class="main-content__right">
            <input type="radio" name="tab" id="tab-1" class="tab-1 welcome" checked>
            <input type="radio" name="tab" id="tab-2" class="tab-2 profile">
            <input type="radio" name="tab" id="tab-3" class="tab-3 resume">
           
            <?php  $sql = "SELECT * FROM users WHERE user_id=$id";
     $staa=$db->query($sql);
     $show = $staa->fetchall(); ?>
            <nav class="navbar">
                <ul class="navbar__menu" onclick="currentTab(event)" role="list">
                    <li class="navbar__item" role="listitem">
                        <label for="tab-1" class="navbar__link active" role="label">
                            <span>Profile</span>
                            <i class="fas fa-user"></i>
                        </label>
                    </li>
                    <li class="navbar__item" role="listitem">
                        <label for="tab-2" class="navbar__link" role="label">
                            <span>Edit profile</span>
                            <i class="fas fa-user"></i>
                        </label>
                    </li>
                    <li class="navbar__item" role="listitem">
                        <label for="tab-3" class="navbar__link" role="label">
                            <span>My Orders</span>
                            <i class="fas fa-file-alt"></i>
                        </label>
                    </li>
                   
                    
                </ul>
            </nav>
            <?php foreach($show as $value): ?>
            <div class="tab-content-1">
                <section class="welcome">
                <h3>
                    Name : <?php echo $value['user_name'] ?>
            </h3>
                    <br>
                    <h3>
                    Email : <?php echo $value['user_email'] ?>
                    </h3>
                    <br>
                    <h3>
                    Mobile : <?php echo $value['user_mobile'] ?>
                    </h3>
                    <br>
                    <h3>
                    Location : <?php echo $value['user_location'] ?>
                    </h3>

                    <br>
                    <h3>
                    Address : <?php echo $value['user_address'] ?>
                    </h3>
                    <?php  endforeach; ?>
                </section>
            </div>
            <?php foreach($show as $value): ?>
            <div class="tab-content-2">
                <section class="profile">
                    <h3>Profile</h3>
                    <div id="r" class="">
  <form method="post" >
    <label for="fname">Name</label>
    <input type="text" id="fname" placeholder="first name"  name="name"  value="<?php echo $value['user_name'] ?>">

    <label for="lname">Phone Number</label>
    <input type="text" id="lname" name="phone" placeholder="enter phone number" value="<?php echo $value['user_mobile'] ;?>">

    <label for="location">Country</label>
    
    <input type="text" id="lname" name="location" placeholder="enter location" value="<?php echo $value['user_location'] ;?>">
  
    <label for="">Address</label>
    
    <input type="text" id="lname" name="address" placeholder="enter address" value="<?php echo $value['user_address'] ;?>">

    <label for="">Email</label>
    
    <input type="email" id="lname" name="email" placeholder="enter email" value="<?php echo $value['user_email'] ;?>">

    <label for="">Password</label>
    
    <input type="password" id="lname" name="password" placeholder="enter password" value="<?php echo $value['user_password'] ;?>">

    <input type="submit" name="submit" value="Save Profile">
  </form>
            </div>

<?php if(isset($_POST['submit'])):
$name = $_POST['name'];
$phone=$_POST['phone'];
$location=$_POST['location'];
$address=$_POST['address'];
$email=$_POST['email'];
$password=$_POST['password'];

$up="UPDATE `users`
 SET 
 `user_name`=?
,`user_email`=?
,`user_password`=?
,`user_mobile`=?
,`user_location`=?
,`user_address`=? WHERE user_id=36";

$statment=$db->prepare($up);
$statment->execute([$name,$email,$password,$phone,$location,$address]);

 
endif;endforeach;
 ?>
                    
                </section>
            </div>
<?php  $sqll = "SELECT * FROM orders WHERE order_user_id=$id";
       $staaa=$db->query($sqll);
       $showw = $staaa->fetchall(); ?>
            <div class="tab-content-3">
                <section class="resume">
                    <h3>Resume</h3>
                    <table id="customers">
  <tr>
    <th>Order details</th>
    <th>Order Location</th>
    <th>Order Date</th>
    
    
  </tr>
  <tr>
    <?php foreach($showw as $value): ?>
        <td><?php echo $value['order_details'] ?></td>
        <td><?php echo $value['order_location'] ?></td>
        <td><?php echo $value['order_date'] ?></td>

        
      </tr>
      <?php endforeach; ?>
  </tr>
  
</table>
</div>
                </section>
            </div>

            
        </main>
    </div>

    <script>
        
        function currentTab(e) {
            const el = document.querySelector('.active');
            if (el !== null) {
                el.classList.remove('active');
            }
            e.target.className = 'navbar__link active';
        }

    </script>

</body>
</html>
<!-- partial -->
  
</body>
</html>
