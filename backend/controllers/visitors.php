<?php
require '../config/config.php';
$sql = "UPDATE Counter SET visits = visits+1 WHERE id = $id";
    $conn->query($sql);

    $sql = "SELECT visits FROM Counter WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
        }
    } else {
        echo "no results";
    }
    
    $conn->close();
?>