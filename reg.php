<?php
session_start();

 ini_set('display_errors', 1);
if (isset($_SESSION['id'])) {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/logreg.css">
    <title>Registration Page</title>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    require_once __DIR__ . '/partials/regprocess.php';
}
?>

<body>
    <?php
require_once __DIR__ . '/partials/nav.php';
?>
    <div class="container">
        <div class="forms">
            <?php if (isset($errorMsg)): ?>
            <?php foreach ($errorMsg as $msg): ?>
            <div class="alert alert-danger text-center mb-5">
                <?php echo $msg ?>
            </div>
            <?php endforeach;?>
            <?php endif?>
            <form action="" method="post">
                <div class="form-group">
                    <label>firstname</label>
                    <input type="text" name="firstName"
                        class="form-control <?php echo isset($errors['firstName']) ? 'is-invalid' : '' ?>"
                        value="<?=$firstName ?? ''?>">
                    <small class="invalid-feedback">
                        <?php
echo $errors['firstName'] ?? '';
?>
                    </small>
                </div>
                <div class="form-group">
                    <label>lastname</label>
                    <input type="text" name="lastName"
                        class="form-control <?php echo isset($errors['lastName']) ? 'is-invalid' : '' ?>"
                        value="<?=$lastName ?? ''?>">
                    <small class="invalid-feedback">
                        <?php
echo $errors['lastName'] ?? '';
?>
                    </small>
                </div>
                <div class="form-group">
                    <label>email</label>
                    <input type="email" name="email"
                        class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>"
                        value="<?=$email ?? ''?>">
                    <small class="invalid-feedback">
                        <?php
echo $errors['email'] ?? '';
?>
                    </small>
                </div>
                <div class="form-group">
                    <label>password</label>
                    <input type="password" name="password"
                        class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>">
                    <small class="invalid-feedback">
                        <?php
echo $errors['password'] ?? '';
?>
                    </small>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="cpassword"
                        class="form-control <?php echo isset($errors['cpassword']) ? 'is-invalid' : '' ?>">
                    <small class="invalid-feedback">
                        <?php
echo $errors['cpassword'] ?? '';
?>
                    </small>
                </div>
                <input type="submit" value="Register" class="btn btn-primary">
            </form>
        </div>
    </div>
    <?php require_once 'partials/js.php'; ?>
</body>

</html>