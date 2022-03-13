<?php

if (!$firstName) {
    $errors['firstName'] = 'Firstname cannot be left blank';
}

if (!$lastName) {
    $errors['lastName'] = 'Lastname cannot be left blank';
}

if (!$email) {
    $errors['email'] = 'Email cannot be left blank';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Enter your email correctly';
}

if (!$pass) {
    $errors['password'] = 'Password cannot be blank';
}

if (!$cpass) {
    $errors['cpassword'] = 'Confirm Password cannot be blank';
} elseif ($pass !== $cpass) {
    $errors['cpassword'] = "Your password does not match";
}
