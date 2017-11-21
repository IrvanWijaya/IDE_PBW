<div class="w3-sidebar w3-bar-block w3-light-grey sidebar" style="width:25%;">

    <p>You are logged in as</p>

    <?php
        include("../../phpScript/startSession.php");

        echo "<p class='userInfo'>".$_SESSION['userID'] . "</p>";
        echo "<p class='userInfo'>".$_SESSION['name'] . "</p>";

        $link = $_SESSION['position'];
        if($link == 'lecturer'){
            $link = 'lct.php';
        }else{
            $link = 'std.php';
        }
    ?>

    <hr>
    <div class="tempImgProf">
        <img src = "../../img/profile.png">
    </div>
    
    <a href="<?php 
                echo $link;
            ?>" class="w3-bar-item w3-button"> <i class="fa fa-home" style="font-size:18px;width:40px"></i> HOME</a>
    <a href="#" class="w3-bar-item w3-button"> <i class="fa fa-list" style="font-size:18px;width:40px"></i> MY COURSES</a>
    <a href="#" class="w3-bar-item w3-button"> <i class="fa fa-user" style="font-size:18px;width:40px"></i> MY PROFILE</a>
    <a href="../../index.php" class="w3-bar-item w3-button"> <i class="fa fa-power-off" style="font-size:18px;width:40px"></i> LOGOUT</a>
</div>