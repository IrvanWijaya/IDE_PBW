<?php
    //activities.topic, activities.title
    $query = "SELECT * 
                FROM activities JOIN courses 
                ON activities.ID_C = courses.ID_C 
                WHERE courses.code = '$_SESSION[courseID]'
                ORDER BY topic,title";
    $result = $conn->query($query);
    //echo $query;
    $temp;

    $row = $result->fetch_array();
    while($row)
    {
        echo 	"<div class = 'w3-display-container w3-panel w3-card-4 topicList'>
                    <i class = 'fa fa-newspaper-o'></i><span> Topic ". $row['topic'] . "</span></br> 
                    <a href='#'>" . $row['title']."</a>";
                
                $temp = $row['topic'];

                while($row = $result->fetch_array()){
                     if($row['topic'] != $temp){
                        break;
                     }
                     echo "<a href='#'>" . $row['title'] . "</a>";
                }

                if ($_SESSION['position'] == "lecturer") {
                    echo "<button class= 'w3-btn w3-gray w3-opacity-min btnAddActivity'>Add Activity</button>";
                }

        echo    "</div>";
    }
?>

<script>
    
</script>