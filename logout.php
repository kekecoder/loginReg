<?php
session_start();
if (isset($_SESSION['id'])) {
    session_destroy();
    session_unset();

    header('Location: login.php');
}
