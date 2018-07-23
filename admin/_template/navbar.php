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
                        <li><a href="#">List</a></li>
                        <li><a href="#">Add</a></li>
                    </ul>
                </li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <!-- Button trigger modal -->
                    <a type="button"  data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-cart-arrow-down"></i>
                        <span>Cart</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if(empty($_SESSION['user_id'])) { ?>
                            <li><a href="<?php echo ROOT_URL; ?>login.php">Login</a></li>
                            <li><a href="<?php echo ROOT_URL; ?>register.php">Register</a></li>

                        <?php } else { ?>
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