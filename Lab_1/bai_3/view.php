<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2><?= $user['name'] ?? "" ?></h2>
    <form method="post">
        <input type="email" name="email">
        <button type="submit">Tim</button>
    </form>
</body>

</html>