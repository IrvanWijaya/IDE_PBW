<?php
    //echo $_SESSION['username'];
    $query = "SELECT Courses.code as code, Courses.course as course, Courses.ID_C as id
            FROM Courses JOIN Enrollments
            ON Courses.ID_C = Enrollments.ID_C
            WHERE $_SESSION[ID_U] = Enrollments.ID_U";
    $result = $conn->query($query);
?>