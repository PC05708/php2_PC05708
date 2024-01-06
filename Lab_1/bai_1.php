<?php
$course = [
    "s1" => "course1",
    "s2" => "course2",
    "s3" => "course3"
];

//model
function get_course()
{
    global $course;
    return array_values($course);
}

function find_by_semester($semester)
{
    global $course;
    return (array_key_exists($semester, $course) ? $course[$semester] : "Invalid course!");
}

// controller
$course_name = "";
if (isset($_POST['ok'])) {
    $semester = (!empty($_POST['semester']) ? $_POST['semester'] : "");
    $course_name = find_by_semester($semester);
}
$page_content = $course_name;
?>

<!-- view -->
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

</html>