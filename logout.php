<?php
include_once('core/main.php');
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['user_type']);
header('location: login.php');