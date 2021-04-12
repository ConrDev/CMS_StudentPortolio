<?php
$sql = "UPDATE visitors SET visits = visits+1 WHERE id = $id";
    $link->query($sql);

    $sql = "SELECT visits FROM visitors WHERE id = $id";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
        }
    } else {
        echo "no results";
    }
    
    $link->close();
?>