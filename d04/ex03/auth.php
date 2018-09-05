<?php
    function auth($login, $passwd)
    {
        $a = unserialize(file_get_contents("../private/passwd"));
        $password = hash("sha256", $passwd);
        foreach ($a as $user)
        {
            if ($user["login"] == $login && $user["passwd"] == $password)
                return true;
        }
        return false;
    }
