<?php

$detailCourse = getRow("SELECT * FROM course WHERE id='$id'");

$allChapter = getCountRows("SELECT id FROM chapter_course WHERE course_id='$id'");


?>
