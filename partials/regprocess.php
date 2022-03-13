<?php
date_default_timezone_set('Africa/Lagos');
require_once "input-func.php";
$errors = [];
$errorMsg = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstName = inputs($_POST['firstName']);
    $lastName = inputs($_POST['lastName']);
    $email = inputs($_POST['email']);
    $pass = inputs($_POST['password']);
    $cpass = inputs($_POST['cpassword']);

    // validating users input
    require "validate.php";

    if (empty($errors)) {
        // if no error is found
        require_once "dbconfig.php";
        // check if email already exist
        $query = ("SELECT id FROM users WHERE email = :email");
        if ($stmt = $pdo->prepare($query)) {
            $stmt->bindValue(':email', $email);
            if ($stmt->execute()) {
                if ($stmt->rowCount() === 1) {
                    $errorMsg[] = "The email account is already taken, try another";
                } else {
                    // insert into database
                    // hash the password before inserting it into the database
                    $hashPass = password_hash($pass, PASSWORD_DEFAULT);

                    $query = $pdo->prepare("INSERT INTO users(firstname, lastname, email, password, created_date)VALUES(:firstname, :lastname, :email, :password, :created_date)");
                    $query->bindValue(':firstname', $firstName);
                    $query->bindValue(":lastname", $lastName);
                    $query->bindValue(":email", $email);
                    $query->bindValue(":password", $hashPass);
                    $query->bindValue(":created_date", date("Y-m-d H:i:s"));

                    $query->execute();


                    $_SESSION['id'] = $id;

                    header("Location: ../index.php");
                }
            } else {
                $errorMsg[] = "An error has occured, please try again later";
            }
        } else {
            $errorMsg[] = "An error has occured, please try again later";
        }
    }
} else {
    echo "Bad Gateway";
}

function isLoggedIn()
{
    if (isset($_SESSION['id'])) {
        return true;
    }
    return false;
}