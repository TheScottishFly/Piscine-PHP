<?php
    if (!file_exists("../private") || !file_exists("../private/passwd") || $_POST["login"] === "" || $_POST["oldpw"] === "" || $_POST["newpw"] === "" || $_POST["submit"] !== "OK")
    	exit("ERROR\n");

    $a = unserialize(file_get_contents("../private/passwd"));
    $login = $_POST["login"];
    $oldpw = hash("sha256", $_POST["oldpw"]);
    $newpw = hash("sha256", $_POST["newpw"]);
    foreach ($a as $user)
    {
        if ($user["login"] === $login && $user["passwd"] === $oldpw && $oldpw !== $newpw)
        {
            $user["passwd"] = $newpw;
            file_put_contents("../private/passwd", serialize($a));
            exit("OK\n");
        }
    }
    exit("ERROR\n");
?>
