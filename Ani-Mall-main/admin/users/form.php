<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <form action=""  method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">*Name</label>
    <input type="text" required value="<?php echo $user_name?>" name="title" class="form-control">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">*Mobile</label>
    <input class="form-control" name="description" value="<?php echo $user_mobile?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">*Email</label>
    <input type="email" value="<?php echo $user_email?>" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">*Password</label>
    <input type="password" value="<?php echo $user_password?>" class="form-control" name="price">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>