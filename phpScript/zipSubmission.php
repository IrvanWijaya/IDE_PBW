<?php
    $directory = '../upload/1/AIF315/';
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));

    $zip = new ZipArchive();
    $zip_name = time().".zip"; // Zip name
    $zip->open($zip_name,  ZipArchive::CREATE);
    foreach ($scanned_directory as $file) {
        $temp = $directory . $file;
        //echo $temp . "</br>";
        if(file_exists($temp)){
            $zip->addFromString(basename($temp),  file_get_contents($temp)); 
        }
        else{
            echo"file does not exist";
        }
    }
    $zip->close();
    
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename='.$zip_name);
    header('Content-Length: ' . filesize($zip_name));
    readfile($zip_name);

    unlink($zip_name);
?>