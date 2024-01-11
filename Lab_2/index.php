<?php
// bai 2
// require "database.php";

// bai 3
spl_autoload_register(function ($class) {
    var_dump($class);
    include "{$class}.php";
});

use core\database as DB;

$db = new DB();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>home page</h1>
</body>

</html>