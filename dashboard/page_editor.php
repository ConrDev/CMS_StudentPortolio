<?php
require_once '../backend/config/config.php';
session_start();

$id=$_GET['pageID'];

$stmt = $link->prepare("SELECT * FROM `pages` WHERE `page_ID` = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$page = mysqli_fetch_array($stmt->get_result());

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

  <script src="../JS/ckeditor/ckeditor.js"></script>
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
          <h1><span class="fas fa-cog" aria-hidden="true"></span> Pages <small>Manage Site pages</small></h1>
        </div>
        <div class="col-md-2">
          <div class="dropdown create">
            <button class="btn main-color-bg dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              Create Content
              <span class="caret"></span>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <a class="dropdown-item" href="project_creator.php">Add Project</a>
            </div>
          </div>
        </div>
      </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Pages</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
        <div class="list-group">
            <a href="index.php" class="list-group-item active main-color-bg">
              <span class="fas fa-cog" aria-hidden="true"></span> Dashboard
            </a>
            <a href="header.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <div>
                <span class="fas fa-heading mb-1" aria-hidden="true"></span> Header
              </div>
              <span class="badge badge-pill badge-dark align-items-end">2</span>
            </a>
            <a href="pages.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <div>
                <span class="fas fa-list-alt mb-1" aria-hidden="true"></span> Pages
              </div>
              <span class="badge badge-pill badge-dark align-items-end">4</span>
            </a>
            <a href="projecten.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <div>
                <span class="fas fa-pencil-alt mb-1" aria-hidden="true"></span> Projects
              </div>
              <span class="badge badge-pill badge-dark align-items-end"><?php $result = mysqli_query($link, "SELECT ID FROM projecten"); $num_rows = mysqli_num_rows($result); echo "$num_rows\n";?></span>
            </a>
            <a href="users.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <div>
                <span class="fas fa-user mb-1" aria-hidden="true"></span> Users
              </div>
              <span class="badge badge-pill badge-dark align-items-end"><?php $result = mysqli_query($link, "SELECT UUID FROM user"); $num_rows = mysqli_num_rows($result); echo "$num_rows\n";?></span>
            </a>
          </div>

          <!-- <div class="card-body">
            <h4>Disk Space Used</h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                60%
              </div>
            </div>
            <h4>Bandwidth Used </h4>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                40%
              </div>
            </div>
          </div> -->
        </div>
        <div class="col-md-9 mb-5">
          <!-- Website Overview -->
          <div class="card">
            <h3 class="card-header main-color-bg">Pages</h3>
            <div class="card-body">

              <form action="../backend/controllers/page_process.php?pageID=<?=$_GET['pageID']; ?>" method="POST">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pagina Naam</label>
                    <input name="title" type="text" name="title" class="form-control" value="<?=$page["title"];?>">
                  </div>
                  <div class="form-group">
                    <label>Inhoud</label>
                    <!-- <textarea name="editor2" class="form-control" placeholder="Page Body"></textarea> -->
                    <textarea id="editor" name="editor" class="form-control" placeholder="inhoud"></textarea>
                  </div>
                  <div class="dropdown-divider my-4"></div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="published" name="published" checked="<?=$page["published"];?>">
                      <label class="custom-control-label text-muted" for="published">Gepubliseerd</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-default btn-block" name="submit">Bewerken</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- <div class="table-users table-responsive-md table-wrapper-scroll-y table-scrollbar">
              <div class="modal-body">
                <div class="form-group">
                  <label>Page Body</label>
               
                  <textarea id="editor" name="editor2" class="form-control" placeholder="Page Body"></textarea>
                </div>
                <div class="form-group">

                  <input type="submit" value="submit ">
                </div>
              </div>
            </div> -->
            
          </div>

        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <div class="row justify-content-center mr-auto">
      <p class="copyright">CSM Dashboard</p>
      <p class="splitter px-2">|</p>
      <p class="credits">created with ❤️ by WeDevign</p>
    </div>
  </footer>

  <!-- Modals -->

  <!-- Add Page -->
  <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="../backend/controllers/projectcreator.php">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Add Page</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Page Title</label>
              <input name="title" type="text" class="form-control" placeholder="Page Title">
            </div>
            <div class="form-group">
              <label>Page Body</label>
              <textarea name="editor" class="form-control" placeholder="Page Body"></textarea>
            </div>
            <div class="checkbox">
              <label>
                <input name="published" type="checkbox" value="true"> Published
              </label>
            </div>
            <div class="form-group">
              <label>Meta Tags</label>
              <input name="metatags" type="text" class="form-control" placeholder="Add Some Tags...">
            </div>
            <div class="form-group">
              <label>Meta Description</label>
              <input name="metadesc" type="text" class="form-control" placeholder="Add Meta Description...">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    CKEDITOR.replace("editor", {
        skin: "n1theme"
    });
    CKEDITOR.config.contentsCss = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css";
    CKEDITOR.scriptLoader.load("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");

    CKEDITOR.instances.editor.setData('<?=preg_replace( "/\r|\n/", "", $page["content"]); ?>');
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>

