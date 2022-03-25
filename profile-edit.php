<?php
include_once './init.php';

if(!isset($_SESSION['auth'])) {
    redirect('login.php');
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // validate name
    // update set name="$name", password="$pasword" where id="$id"
    $name = $_POST['name'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    if(! $name) {
        $errors['name'] = 'The name is required.';
    }
  
    if(! $password) {
        $errors['password'] = 'The password is required.';
    }

    if(count($errors) == 0) {
        $sql ="UPDATE users SET  `name`='$name', `password`='$password' WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            redirect('login.php');
        }
    }
    
}

?>
<?php include './header.php' ?>
<?php include './navbar.php' ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card mt-5">
                <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['auth']['id']; ?>">

                            <div>
                                <input type="text" name="name" value="<?php echo $_SESSION['auth']['name']; ?>"
                                 class="form-control <?php if (isset($errors['name'])): ?> is-invalid <?php endif;?>" 
                                 placeholder="Enter name">
                                 <?php if (isset($errors['name'])): ?>
                                     <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
                                 <?php endif;?>
                            </div>
 
                            <div class="mt-3">
                             <input type="password" name="password" class="form-control <?php if (isset($errors['password'])): ?> is-invalid <?php endif;?>" placeholder="Enter password">
                                 <?php if (isset($errors['password'])): ?>
                                     <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
                                 <?php endif;?>
                            </div>
 
                             <div class="d-flex justify-content-between mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="/MMM/profile.php" class="btn btn-outline-secondary">Cancel</a>
                             </div>
                         </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './footer.php' ?>