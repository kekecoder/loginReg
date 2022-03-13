<?php

$errors = [];
$errorMsg = [];
require_once 'input-func.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = inputs($_POST["email"]);
    $pass = inputs($_POST["password"]);

    // validate users inputs
    if (!$email) {
        $errors['email'] = 'Email cannot be left blank';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email address';
    }

    if (!$pass) {
        $errors['password'] = 'Password cannot be blank';
    }

    if (empty($errors)) {
        require_once 'dbconfig.php';

        $query = ("SELECT id, firstname, lastname, password FROM users WHERE email = :email");

        if ($stmt = $pdo->prepare($query)) {
            $stmt->bindValue(':email', $email);
            if ($stmt->execute()) {
                if ($stmt->rowCount() === 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $firstName = $row["firstname"];
                        $lastName = $row['lastname'];
                        $hashed_pass = $row['password'];
                        if (password_verify($pass, $hashed_pass)) {
                            session_regenerate_id();

                            $_SESSION['id'] = $id;
                            $_SESSION["firstname"] = $firstName;
                            $_SESSION['lastname'] = $lastName;

                            echo "<script>window.top.location='../index.php'</script>";
                        } else {
                            $errorMsg[] = "Your email/password does not match";
                        }
                    }
                } else {
                    $errorMsg[] = "You don't have an account,";
                    $errorMsg[] .= " please create an account to have full access";
                }
            } else {
                $errorMsg[] = "An error occured, please try again later";
            }
        }
    } else {
        $errorMsg[] = "An error occured, please try again later";
    }
}
