<?php
require "../config/config.php";
$ID = $_GET["ID"];
$query = "SELECT * FROM projecten WHERE ID = $ID";
$result = mysqli_query($link, $query);
foreach($result as $kaas) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title><?php echo $kaas['Name']; ?></title>
</head>
<body>
<?php echo $kaas['Content']; ?>
</body>
</html>
<?php
}
?>