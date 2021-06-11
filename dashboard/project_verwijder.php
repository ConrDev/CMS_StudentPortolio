<?php 
session_start();

require_once '../backend/config/config.php';

// $stmt = $link->prepare("SELECT * FROM `projecten` ORDER BY `DateEdited`");
// $stmt->bind_param("ssss", $uuid, $email, $hashPassword, $companyName);
// $link->query("INSERT INTO pages (title, about) VALUES (NULL, '$title', '$editor2')");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Dashboard</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/dashboard.css">
  <script src="../JS/loader.js"></script>

  <script src="http://cdn.ckeditor.com/5/standard/ckeditor.js"></script>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
      <a class="navbar-brand" href="#">CMS</a>
      <!-- <button type="button" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>
          <li class="nav-item active"><a class="nav-link" href="pages.php">Pages</a></li>
          <li class="nav-item"><a class="nav-link" href="projecten.php">Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <li class="nav-item"><a class="nav-link" href="#">Welcome, <?php if (isset($_SESSION['email'])) { echo $_SESSION['email']; } else { header('location: ../index.php'); } ?></a></li>
          <li class="nav-item"><a class="nav-link" href="../index.php">Back</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><span class="fas fa-cog" aria-hidden="true"></span> Verwijder <small>Manage page</small></h1>
        </div>
        <div class="col-md-2">
          <div class="dropdown create">
        </div>
      </div>
    </div>
  </header>
  <?php

   function delete($ID) {
       echo $ID;
        require_once '../backend/config/config.php';
        mysqli_query($link, "DELETE * FROM projecten WHERE ID = '$ID'");
    }

    $ID = $_GET['id'];
    $result = mysqli_query($link, "SELECT `Name` FROM projecten WHERE ID = '$ID'");
    while($row = mysqli_fetch_array($result)) {
  ?>

    <div class="container">
    <p>weet u zeker dat u <?=$row['Name']?> wilt verwijderen?</p>
        <button onclick="<?php echo 'verwijder(' . $ID . ')'; ?>" class="btn btn-danger">Verwijder</button>
    </div>
<?php } ?>

  <footer id="footer">
    <div class="row justify-content-center mr-auto">
      <p class="copyright">CSM Dashboard</p>
      <p class="splitter px-2">|</p>
      <p class="credits">created with ❤️ by WeDevign</p>
    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>