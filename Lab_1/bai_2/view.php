<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2><?= $page_content ?></h2>
    <select name="courses">
        <?php foreach ($list_of_courses as $course_name) : ?>
            <option value=""><?= $course_name ?></option>
        <?php endforeach; ?>
    </select>
</body>