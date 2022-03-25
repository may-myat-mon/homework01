<?php

include_once './init.php';

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(! $name) {
        $errors['name'] = 'The name is required.';
    }
    if(! $email) {
        $errors['email'] = 'The email is required.';
    }
    if(! $password) {
        $errors['password'] = 'The password is required.';
    }

    if(count($errors) == 0) {
        $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            redirect('login.php');
        }
    }
}

?>

<?php include './header.php' ?>

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-4">
                <div class="card">

                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form method="POST">
                            <div>
                                <input type="text" name="name" 
                                class="form-control  <?php if(isset($errors['name'])): ?> is-invalid <?php endif; ?>">
                                <?php if(isset($errors['name'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['name']; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="mt-3">
                                <input type="email" name="email" 
                                class="form-control  <?php if(isset($errors['email'])): ?> is-invalid <?php endif; ?>">
                                <?php if(isset($errors['email'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="mt-3">
                                <input type="password" name="password" 
                                class="form-control  <?php if(isset($errors['password'])): ?> is-invalid <?php endif; ?>">
                                <?php if(isset($errors['password'])): ?>
                                    <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include './footer.php' ?>