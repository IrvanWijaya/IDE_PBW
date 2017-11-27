<?php
    include 'connection.php';
    
    $query = "SELECT * FROM activities WHERE title = '$_GET[title]'";
    $resultDir = $conn->query($query);
    $rowDir = $resultDir->fetch_array();
    echo "$rowDir[fileDir]";
?>