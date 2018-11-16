<?php
    $token = $_GET["token"];

    require("jwt.php");

    $json = JWT::decode($token, "mysecret", true);
    echo json_encode($json);
?>