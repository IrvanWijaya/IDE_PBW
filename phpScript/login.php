<?php
    include 'connection.php';
    include 'startSession.php';

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username != "" && $password != "") {
            $query = "SELECT * FROM users WHERE username = $username";
            $result = $conn->query($query);
            $row = $result->fetch_array();

            if ($conn->query($query)->num_rows==0) {
                echo "WRONG USERNAME";
            } else {
                if ($row['pass'] == $password) {

                    /*$query = "SELECT userID, users.name, usergroups.name as role FROM usergroups JOIN users ON usergroups.ID_UG = users.ID_UG
                                WHERE username = $username";*/

                    $query = "SELECT users.ID_U as id, users.username as username,
                            users.pass as pass, users.userID as userid,
                            users.name as name, usergroups.name as position
                            FROM users join usergroups
                            ON users.ID_UG = usergroups.ID_UG
                            WHERE users.username = $username";

                    $result = $conn->query($query);
                    $row = $result->fetch_array();

                    $_SESSION['username'] = $row['username'];
                    
                    if ($row['position'] == "lecturer") {
                        header('Location: ../pages/lecturer/lct.php');
                    } else {
                        header('Location: ../pages/student/std.php');
                    }
                } else {
                    echo "WRONG PASSWORD";
                }
            }
        }
    }
?>