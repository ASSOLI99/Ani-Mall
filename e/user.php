<?php require "navbar.php"; ?>
<?php require "config.php";  
$id=36;
?>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          <?php  $sql = "SELECT * FROM users WHERE user_id=$id";
     $staa=$db->query($sql);
     $show = $staa->fetchall(); ?>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                 
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="./assets/img/profile.jpg" alt="User" class="rounded-circle" width="150">
                   <?php foreach($show as $value): ?> 
                    <div class="mt-3">

                      <h4><?php echo $value['user_name'] ?></h4>
                      <p class="text-secondary mb-1">Email : <?php echo $value['user_email'] ?></p>
                      <form action="">
                        
                        <input type="submit" class="btn btn-primary" name="order" value="My Orders">
                        <input type="submit" class="btn btn-outline-primary" name="edit" value="Edit Profile">
                       
                    </form>
                      
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $value['user_name'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $value['user_email'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $value['user_mobile'] ?>
                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Location</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $value['user_location'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $value['user_address'] ?>
                    </div>
                  </div>
                  <?php  endforeach; ?>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      
                    </div>
                  </div>
                </div>
              </div>

              



            </div>
          </div>

        </div>
    </div>
    <div class="container">
		<div class="main-body">
			<div class="row"> 
				<div class="col-lg-4">
                   
                <div class="col-sm-12">
                <?php  $sqll = "SELECT * FROM orders WHERE order_user_id=$id";
      ?>
							<div class="card"><?php if(isset($_GET['order'])): ?>
								<div class="card-body">
                                
                                <table class="table">
        <?php                         $staaa=$db->query($sqll);
       $showw = $staaa->fetchall(); ?>
    <thead>
      <tr>
      <th>Order details</th>
    <th>Order Location</th>
    <th>Order Date</th>
      </tr>
    </thead>
    <tbody>
    <tr>
    <?php foreach($showw as $value): ?>
        <td><?php echo $value['order_details'] ?></td>
        <td><?php echo $value['order_location'] ?></td>
        <td><?php echo $value['order_date'] ?></td>

        
      </tr>
      <?php endforeach;  ?>
    </tbody>
  </table>
							</div><?php endif; ?>	
							</div>
						</div>
				</div>
                <?php if(isset($_GET['edit'])): ?>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body"><?php foreach($show as $value): ?>
                            <form  method="post" >
							<div class="row mb-3">
                            
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="name"  value="<?php echo $value['user_name'] ?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="email" placeholder="enter email" value="<?php echo $value['user_email'] ;?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="number" class="form-control" name="phone" placeholder="enter phone number" value="<?php echo $value['user_mobile'] ;?>">
								</div>
							</div>
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Location</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="location" placeholder="enter location" value="<?php echo $value['user_location'] ;?>">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="address" placeholder="enter location" value="<?php echo $value['user_address'] ;?>">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Password</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="password" class="form-control" name="password"  placeholder="enter location" value="<?php echo $value['user_password'] ;?>">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" name="submit" value="Save Changes">
								</div>
							</div>
                            </form>
                            <?php 
                         if(isset($_POST['submit'])):
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
                            
                             
                            endif;
                        endforeach; endif;?>
						</div>
					</div>
					
						
					</div>
				</div>
			</div>
		</div>
	</div>

    
<?php require "footer.php"; ?>>