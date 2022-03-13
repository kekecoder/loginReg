<?php session_start();
if (isset($_SESSION['id'])) {
    header("Location: index.php");
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
  <title>Login Page</title>
</head>
<body>

</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once __DIR__ . "/partials/loginprocess.php";
}
?>
<?php
require_once __DIR__ . '/partials/nav.php';
?>
<div class="container-fluid">
<div class="forms">
    <?php if (isset($errorMsg)): ?>
      <?php foreach ($errorMsg as $msg): ?>
        <div class="alert alert-danger text-center mb-5">
          <?php echo $msg ?>
        </div>
      <?php endforeach;?>
    <?php endif?>
  <form method="post">
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?=$email ?? ''?>">
      <small>
        <?php echo $errors['email'] ?? ""; ?>
      </small>
      <div class="form-group">
      <label>Password</label>
        <input type="password" name="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>">
        <small>
          <?php echo $errors['password'] ?? ""; ?>
        </small>
      </div>
    </div>
    <input type="submit" value="Login" class="btn btn-primary">
  </form>
</div>
</div>

<?php require_once 'partials/js.php';?>