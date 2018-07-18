<?php
include_once('core/main.php');
unset($_SESSION['user_id']);
header('location: login.php');