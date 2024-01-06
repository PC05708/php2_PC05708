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
