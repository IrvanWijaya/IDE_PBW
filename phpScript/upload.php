<?php 
    include('startSession.php');
    $target_dir = "../upload/";
    $path = $target_dir . $_POST['typeAct'] . "/" . $_POST['code'] . "/";
    //echo "$path";
    if(!is_dir($path)){
        mkdir($path, 0777, true);
    }
    $target_file = $path . basename($_FILES["fileToUpload"]["name"]);
    //echo "$target_file </br>";
    $uploadOk = 1;
    //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    //echo "'../pages/lecturer/addingActivity.php?typeAct=". $_POST['typeAct'] ."&id=". $_POST['id'] ."&topic=". $_POST['topic'] ."'";
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<script>
        alert('Sorry, file already exists.');
        window.location.href='../pages/lecturer/addingActivity.php?typeAct=". $_POST['typeAct'] ."&id=". $_POST['id'] ."&topic=". $_POST['topic'] ."';
        </script>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>
        alert('Sorry, your file was not uploaded.');
        window.location.href='../pages/lecturer/addingActivity.php?typeAct=". $_POST['typeAct'] ."&id=". $_POST['id'] ."&topic=". $_POST['topic'] ."';
        </script>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            include 'connection.php';
            if (empty($_POST['dateOpen']) && empty($_POST['dateClose'])){
                $query = "INSERT INTO activities (ID_AT,ID_C,title,topic,fileDir) 
                        VALUES ($_POST[typeAct],$_POST[id],'$_POST[title]',$_POST[topic],'$target_file')";
            } else {
                $query = "INSERT INTO activities (ID_AT,ID_C,dateOpen,dateClose,title,topic,fileDir) 
                        VALUES ($_POST[typeAct],$_POST[id],'$_POST[dateOpen]','$_POST[dateClose]','$_POST[title]',$_POST[topic],'$target_file')";
            }
            $conn->query($query);
            
            header("Location: ../pages/lecturer/course.php?id=". $_POST['id'] ."&courseTitle=". $_SESSION['courseTitle'] ."&code=". $_POST['code']);
        } else {
            echo "<script>
            alert('Sorry, there was an error uploading your file.');
            window.location.href='../pages/lecturer/addingActivity.php?typeAct=". $_POST['typeAct'] ."&id=". $_POST['id'] ."&topic=". $_POST['topic'] ."';
            </script>";
        }
    }
?>