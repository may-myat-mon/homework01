<?php
include_once './init.php';

if(isset($_SESSION['auth'])) {
    unset($_SESSION['auth']);
}

redirect('login.php');