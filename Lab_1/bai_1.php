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
$list_of_courses = get_course();
$semester = (!empty($_GET['semester']) ? $_GET['semester'] : "");
print_r("ket qua semester: " . $semester);
$course_name = find_by_semester($semester);
$page_content = $course_name;
?>
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

</html>