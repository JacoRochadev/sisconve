<?php
    $host = "localhost";
    $username = "postgres";
    $password = "root";
    $database = "login";
    $message = "";
    try {
        $content = new PDO('pgsql:host='.$host.';port=5432;dbname='.$database.';user='.$username.';password='.$password.'');
    }
    catch (PDOException $error) {
        $message = $error->getMessage();
}   