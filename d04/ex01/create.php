php<?php
    if (!isset($_POST["login"]) || !isset($_POST["passwd"]) || !isset($_POST["submit"]) || $_POST["login"] === "" || $_POST["passwd"] === "" || $_POST["submit"] !== 'OK') {
        echo "ERROR\n";
    } else {
        if (!file_exists("../private") || !file_exists("../private/passwd"))
            mkdir("../private");
        if (file_exists("../private/passwd")) {
            $a = unserialize(file_get_contents("../private/passwd"));
            $err = 0;
            foreach ($a as $user) {
                if ($user["login"] === $_POST["login"]) {
                    $err = 1;
                    echo "ERROR\n";
                }
            }
            if ($err == 0) {
                $tab["login"] = $_POST["login"];
                $tab["passwd"] = hash("sha512", $_POST["passwd"]);
                $a[] = $tab;
                file_put_contents("../private/passwd", serialize($a));
                echo "OK\n";
            }
        } else {
            $tab["login"] = $_POST["login"];
            $tab["passwd"] = hash("sha512", $_POST["passwd"]);
            $a[] = $tab;
            file_put_contents("../private/passwd", serialize($a));
            echo "OK\n";
        }
    }
