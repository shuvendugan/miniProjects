<?php
include_once('./teacher.php');
include_once('./student.php');

$teacher = new teacher\JoiningDetails;
$teacher->joiningDate();
echo '<br/>';
$student = new student\JoiningDetails;
$student->joiningDate();

?>