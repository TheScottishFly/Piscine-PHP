<?php
    if (!file_exists("../private/passwd") || !isset($_POST["login"]) || !isset($_POST["passwd"]) || !isset($_POST["submit"]) || $_POST["login"] === "" || $_POST["oldpw"] === "" || $_POST["newpw"] === "" || $_POST["submit"] !== "OK")
    	exit("ERROR\n");

    $a = unserialize(file_get_contents("../private/passwd"));
    $login = $_POST["login"];
    $oldpw = hash("sha512", $_POST["oldpw"]);
    $newpw = hash("sha512", $_POST["newpw"]);
    foreach ($a as $key => $user)
    {
        if ($user["login"] === $login && $user["passwd"] === $oldpw)
        {
            $a[$key]["passwd"] = $newpw;
            file_put_contents("../private/passwd", serialize($a));
            exit("OK\n");
        }
    }
    exit("ERROR\n");
?>