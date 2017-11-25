<?php
    //activities.topic, activities.title
    $query = "SELECT * 
                FROM activities JOIN courses 
                ON activities.ID_C = courses.ID_C 
                WHERE courses.ID_C = '$_SESSION[courseID]'
                ORDER BY topic,title";
    $result = $conn->query($query);
    //echo $query;
    $temp;

    $row = $result->fetch_array();
?>

<script>
    
</script>