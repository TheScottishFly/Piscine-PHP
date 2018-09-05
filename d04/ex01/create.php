<?php
    if ($_POST["login"] === "" || $_POST["passwd"] === "" || $_POST["submit"] !== 'OK')
        exit("ERROR\n");
    if (!file_exists("../private") || !file_exists("../private/passwd"))
       mkdir("../private");
    if (file_exists("../private/passwd"))
    {
        $a = unserialize(file_get_contents("../private/passwd"));
        foreach ($a as $user)
        {
            if ($user["login"] === $_POST["login"])
                exit("ERROR\n");
        }
    }

    $tab["login"] = $_POST["login"];
    $tab["passwd"] = hash("sha256", $_POST["passwd"]);
    $a[] = $tab;
    file_put_contents("../private/passwd", serialize($a));
    exit("OK\n");
