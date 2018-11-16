<?php
    $json = file_get_contents("php://input");
    $obj = json_decode($json, TRUE);
    
    $user = $obj["Username"];
    $pass = md5($obj["Password"]);

    require("jwt.php");
    require("connect.php");

    $query = "select * from user where username = '$user' and pass = '$pass'";

    $users = mysql_query($query);
    if (mysql_num_rows($users) == 1) {
        // success
        $userdb = mysql_fetch_array($users);

        /**TODO: create token when sign success **/
        $token = array();
        $token["id"] = $userdb["id"];
        $token["username"] = $userdb["username"];
        $token["email"] = $userdb["email"];
        $token["name"] = $userdb["name"];

        $jsonwebtoken = JWT::encode($token, "mysecret");
        echo JsonHelper::getJson("token", $jsonwebtoken);
    } else {
        // failed
        echo "{'token':'Error'}";
    }

?>