<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
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
  <title>Basic Login and Registration</title>
</head>
<body>
  <?php
require_once __DIR__ . '/partials/nav.php';
?>
<div class="container">
  <?php if (isset($_SESSION['id'])) {
    echo $_SESSION['firstname'] . $_SESSION['lastname'];
}?>
</div>
<?php require_once 'partials/js.php'; ?>
</body>
</html>
