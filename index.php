<?php
include_once './init.php';

if(!isset($_SESSION['auth'])) {
    redirect('login.php');
}

?>

<?php include './header.php' ?>
<?php include './navbar.php' ?>

Welcome <?php echo $_SESSION['auth']['name']; ?>

<?php include './footer.php' ?>