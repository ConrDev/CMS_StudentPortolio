<?php

require_once '../config/config.php';

$id = 1;
$content = isset($_POST['content']) ? $_POST['content'] : null;
$style = isset($_POST['style']) ? $_POST['style'] : null;

if(isset($content, $style)){
    $stmt = $link->prepare("UPDATE `cv` SET `Content` = ?, `Style` = ? WHERE `ID` = ? ");
    $stmt->bind_param("ssi", $content, $style, $id);
    $stmt->execute();
    // $link->query("INSERT INTO pages (title, about) VALUES (NULL, '$title', '$editor2')");
}

?>