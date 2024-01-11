<?php
require "vendor/autoload.php";

use App\controller\BaseControl;
use App\model\BaseModel;
use App\core\Route;

$Control = new BaseControl();
$model = new BaseModel();
$core = new Route();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Home Page</h1>
</body>

</html>