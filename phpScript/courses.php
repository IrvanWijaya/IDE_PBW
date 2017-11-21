<?php
    include 'connection.php';
    include 'startSession.php';

    $id = $_SESSION['userID'];

    $query = "SELECT Courses.code + ' / ' + Courses.course as course, Courses.ID_C as id
    FROM Courses join Enrollments
    ON Courses.ID_C = Enrollments.ID_C
    WHERE $id = Enrollments.ID_U";
    
    $result = $conn->query($query);
    $row = $result->fetch_array();
    
?>