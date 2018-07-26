<?php function admin_nav(){ ?>
<li class="dropdown">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
         Products <span class="caret"></span></a>
     <ul class="dropdown-menu">
         <li><a href="<?php echo ADMIN_URL; ?>product-list.php">List</a></li>
         <li><a href="<?php echo ADMIN_URL; ?>product-add.php">Add</a></li>
     </ul>
 </li>
 <li class="dropdown">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
         Customer <span class="caret"></span></a>
     <ul class="dropdown-menu">
         <li><a href="customer-list.php">List</a></li>
     </ul>
 </li>
<?php } ?>
<?php function default_nav(){ ?>
<li>
    <a href="products.php">
        <i class="fa fa-product-hunt"></i>
        <span>Shop</span>
    </a>
</li>
<li>
    <a href="about-us.php">
        <i class="fa fa-question-circle"></i>
        <span>About Us</span>
    </a>
</li>
<li>
    <a href="contact-us.php">
        <i class="fa fa-phone"></i>
        <span>Contact Us</span>
    </a>
</li>
<?php } ?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                  <img src="<?php echo ROOT_URL; ?>img/logo.png">
                  <span>GG SHOP</span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php 
                if(empty($_SESSION['user_id'])) {
                    default_nav();
                } else {
                    switch ($_SESSION['user_type']) {
                        case 1:
                            admin_nav();
                            break;
                        default:
                            default_nav();
                    }
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php if(!empty($_SESSION['user_id']) && $_SESSION['user_type'] == 2) { ?>
                    <!-- Button trigger modal -->
                    <a type="button" href="<?php echo ROOT_URL; ?>cart.php">
                        <i class="fa fa-cart-arrow-down"></i>
                        <span>Cart</span>
                    </a>
                    <?php } ?>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo (!empty($_SESSION['username']))? $_SESSION['username'] : ''; ?> 
                        <i class="fa fa-user"></i> 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <?php if(empty($_SESSION['user_id'])) { ?>
                            <li><a href="<?php echo ROOT_URL; ?>login.php">Login</a></li>
                            <li><a href="<?php echo ROOT_URL; ?>register.php">Register</a></li>

                        <?php } else { ?>
                            <?php
                            switch ($_SESSION['user_type']) {
                                case 1:
                                    echo "<li><a href='". ROOT_URL . "admin/index.php'>Admin Panel</a></li>";
                                    break;
                                default:
                                    echo "<li><a href='".ROOT_URL."profile.php'>Profile</a></li>";
                            }
                            ?> 
                            <li><a href="<?php echo ROOT_URL; ?>logout.php">Lougout</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>