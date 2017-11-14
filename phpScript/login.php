<?php
	include 'connection.php','index.php';
    $query = "SELECT * FROM users";
    $query2 = "SELECT * FROM usergroups JOIN users ON usergorups.ID_UG = users.ID_UG";
    
    if (isset($_GET['username']) && isset($_GET['password'])) {
        $username = $_GET['username'];
        $password = $_GET['password'];
        if ($username != "" && $password != "" && $result = $conn->query($query) && $result2 = $conn->query($query2)) {
            while ($row = $result->fetch_array()) {
                if ($row['username'] == $username) {
                    if ($row['password'] == $password) {
                        $userID = $row['userID'];
                        while ($row = $result2->fetch_array()) {
                            if ($row['userID'] == $userID) {
                                if ($row['userID'] == "lecturer") {
                                    header ('Location: pages/lecturer/lct.php');
                                } else {
                                    header ('Location: pages/student/std.php');
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>