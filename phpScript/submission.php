<!DOCTYPE html>
<html>
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <?php
                include 'connection.php';

                $query = "SELECT * FROM activities WHERE ID_A = '$_GET[id]'";

                $result = $conn->query($query);
                $row = $result->fetch_array();

                echo "<h2>$row[title]</h2><br><br>
                        <h3>Submission status</h3><br>
                        <table>
                            <tr>
                                <td>Due date</td>
                                <td>$row[dateClose]</td>
                            </tr>
                        </table>";
            ?>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Add Submission" name="submit">
        </form>
    </body>
</html>