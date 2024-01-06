<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2><?= $page_content ?></h2>
    <form action="" method="post">
        <select name="semester">
            <?php foreach ($course as $key => $course_name) : ?>
                <option value="<?= $key ?>"><?= $course_name ?></option>
            <?php endforeach; ?>
        </select>
        <button name="ok" type="submit">ok</button>
    </form>
</body>