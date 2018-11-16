<?php
    require("jwt.php");

    $token = array();
    $token["id"] = 8888;
    $token["name"] = "Bui Bo Thjen";
    $token["email"] = "thjenxxxno6@gmail.com";

    $jsonwebtoken = JWT::encode($token, "mysecret");
    echo JsonHelper::getJson("token", $jsonwebtoken);
?>