<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <form action=""  method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">*Mobile</label>
    <input class="form-control" name="mobile" value="<?php echo $order_mobile?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">*Total</label>
    <input type="text" required value="<?php echo $order_total?>" name="total" class="form-control">
  </div>
  <div class="mb-3">
  <label for="status">*Status</label>
      <select value="<?php $order_status ?>" name="status" id="status">
        <option value="Refused">Refused</option>
        <option value="Checking">Checking</option>
        <option value="Dispatched">Dispatched</option>
        <option value="Delivered">Delivered</option>
      </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>