<?php

function _load()
{
    $handler = fopen(".env", "r");

    while (!feof($handler)) {
        $line = fgets($handler);
        if (strlen(trim($line)) > 0 && substr($line, 0, 1) != "#") {
            $kvs = explode("=", $line);
            $_ENV[$kvs[0]] = $kvs[1];
        }
    }
}

function getE($key)
{
    return isset($_ENV[$key]) ? $_ENV[$key] : "";
}

_load();