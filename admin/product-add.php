<?php
include_once('../core/main.php');

if(!empty($_SESSION['user_id'])){
  // if naay session do nothing kay naa ta sa administration page, dapat naa session diri dapita
}else{
  // outsider ni siya redirect nato
  header('location: ' . ROOT_URL .'login.php');
}
$alert_class = false;
$message = "";
if(!empty($_POST))
{
  $new_product = [
    'tblname' => 'product',
    'columns' => [
      'product_name',
      'product_description',
      'price',
      'quantity'
    ],
    'value' => [
      $_POST['product_name'],
      $_POST['product_description'],
      $_POST['price'],
      $_POST['quantity']
    ]
  ];

  if ($edb->insertData($new_product)) {
    // product create success
    $alert_class = 'success';
    $message = "Product created successfully";

  }else{
    $alert_class = 'danger';
    $message = "Failed to create product";
  }
}
include_once(ROOT_PATH.'header.php');
include_once(ROOT_PATH.'navbar.php');
?>
<div class="container">
  <form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <?php if(!empty($_POST)){ ?>
      <div class="alert alert-<?php echo $alert_class; ?>" role="alert">
        <?php echo $message ?>
    </div>
    <?php } ?>
  <div class="form-group">
    <label for="product_name" class="col-sm-2 control-label">Product Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="product_name" placeholder="Product Name">
    </div>
  </div>
  <div class="form-group">
    <label for="product_description" class="col-sm-2 control-label">Product Description</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="product_description" placeholder="Description Here"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">Product Price</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="price" placeholder="Product Price">
    </div>
  </div>
  <div class="form-group">
    <label for="quantity" class="col-sm-2 control-label">Product Quantity</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" name="quantity" placeholder="Product Quantity">
    </div>
  </div>

  <div class="form-group">
    <label for="image" class="col-sm-2 control-label">Product Image</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="image" placeholder="Product Image">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>

  
</form>
</div>
<?php
include_once(ROOT_PATH.'footer.php');