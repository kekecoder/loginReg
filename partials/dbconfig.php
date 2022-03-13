<?php

try {
    $pdo = new PDO('mysql:host=127.0.0.1; port=3306; dbname=loginreg; charset=utf8;', 'root', 'jerusalem1991');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //print "connected successfully";
} catch (Error $e) {
    print "An Exception has occured " . $e->getMessage();
    print "Something went wrong, please try again later.";
}
