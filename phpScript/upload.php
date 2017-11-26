<?php 
    $target_dir = "../upload/";
    $path = $target_dir . $_POST['typeAct'] . "/" . $_POST['code'] . "/";
    if(!is_dir($path)){
        mkdir($path, 0777, true);
    }
    $target_file = $path . basename($_FILES["fileToUpload"]["name"]);
    echo "$target_file </br>";
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.</br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.</br>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            
            include 'connection.php';
            $query = "INSERT INTO activities (ID_AT,ID_C,title,topic,fileDir) VALUES ($_POST[typeAct],$_POST[id],'$_POST[title]',$_POST[topic],'$target_file')";
            $conn->query($query);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>