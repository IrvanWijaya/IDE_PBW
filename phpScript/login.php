<?php
    include 'connection.php';

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username != "" && $password != "") {
            $query = "SELECT * FROM users WHERE username LIKE '%$username%'";
            $result = $conn->query($query);
            $row = $result->fetch_array();

            if ($conn->query($query)->num_rows==0) {
                echo "WRONG USERNAME";
            } else {
                if ($row['pass'] == $password) {
                    $query = "SELECT * FROM usergroups JOIN users ON usergroups.ID_UG = users.ID_UG 
                                WHERE userID = 20160065";
                    $result = $conn->query($query);

                    while ($row = $result->fetch_array()) {
                        echo "$row['userID']";
                        echo "$row['name']";
                        echo "$row['role']";
                    }

                    /*if ($row['role'] == "lecturer") {
                        header('Location: ../pages/lecturer/lct.php');
                    } else {
                        header('Location: ../pages/student/std.php');
                    }*/
                } else {
                    echo "WRONG PASSWORD";
                }
            }
        }
    }
?>