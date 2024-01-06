<?php
include "./model.php";

//controller   
$course_name = "";
if (isset($_POST['ok'])) {
    $semester = (!empty($_POST['semester']) ? $_POST['semester'] : "");
    $course_name = find_by_semester($semester);
}
$page_content = $course_name;

include "view.php";
