<?php
    //echo $_SESSION['username'];
    $query = "SELECT Courses.code, Courses.course as course, Courses.ID_C as id
            FROM Courses JOIN Enrollments
            ON Courses.ID_C = Enrollments.ID_C
            WHERE $_SESSION[ID_U] = Enrollments.ID_U";
    $result = $conn->query($query);

    while($row = $result->fetch_array())
    {
        echo 	"<div class = 'w3-display-container w3-panel w3-card-4 coursesList'>
                    <a href = 'course.php?id=" . $row['code'] . "&courseTitle=" . $row['course']. "' class= 'w3-display-left noTextDecoration'>" . $row['code']. "/" . $row['course']."</a>
                </div>";
    }
?>