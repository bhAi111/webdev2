<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                  <img src="img/logo.png">
                  <span>GG SHOP</span>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="products.php">
                        <i class="fa fa-product-hunt"></i>
                        <span>Products</span>
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
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if(empty($_SESSION['user_id'])) { ?>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="register.php">Register</a></li>

                        <?php } else { ?>
                            <li><a href="logout.php">Lougout</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>