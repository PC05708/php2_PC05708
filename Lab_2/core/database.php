<?php

namespace core;

use mysqli;

class database
{
    public function __construct()
    {
        $serverName = "localhost";
        $userName = "root";
        $passWord = "mysql";

        $conn = new mysqli($serverName, $userName, $passWord);
        if (!$conn) {
            die("connection failed: " . $conn->connect_error());
        }
        echo "connection successfully!";
    }
    public function helloWorld()
    {
        echo "Hello World";
    }
}
