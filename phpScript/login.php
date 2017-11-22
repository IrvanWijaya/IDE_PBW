<?php
    include 'connection.php';
    include 'startSession.php';

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username != "" && $password != "") {
            $query = "SELECT users.ID_U as id, users.username as username,
                            users.pass as pass, users.userID as userid,
                            users.name as name, usergroups.name as position
                            FROM users join usergroups
                            ON users.ID_UG = usergroups.ID_UG
                            WHERE users.username = $username";
            $result = $conn->query($query);

            if ($conn->query($query)->num_rows == 0) {
                echo "<script>
                alert('WRONG USERNAME !');
                window.location.href='../index.php';
                </script>";
            } else {
                $row = $result->fetch_array();
                if ($row['pass'] == $password) {

                    //buat cookie
                    $_SESSION['username'] = $row['username'];
                    //buat sidebar
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['userID'] = $row['userid'];
                    //buat enrolment
                    $_SESSION['ID_U'] = $row['id'];

                    //bwt redirect ke halaman yang tepat (dosen atau mahasiswa)
                    $_SESSION['position'] = $row['position'];

                    $cookie_username = $_SESSION['username'];
                    setcookie('username', $cookie_username, time() + (86400 * 30), "/");
                    
                    if ($row['position'] == "lecturer") {
                        header('Location: ../pages/lecturer/lct.php');
                    } else {
                        header('Location: ../pages/student/std.php');
                    }
                } else {
                    echo "<script>
                    alert('WRONG PASSWORD !');
                    window.location.href='../index.php';
                    </script>";
                }
            }
        }
    }
?>