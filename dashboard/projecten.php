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
          <li class="nav-item"><a class="nav-link" href="posts.php">Projects</a></li>
          <li class="nav-item"><a class="nav-link" href="users.php">Users</a></li>
        </ul>
        <ul class="navbar-nav navbar-right">
          <li class="nav-item"><a class="nav-link" href="#">Welcome, <?=$_SESSION['email']?></a></li>
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
              <a class="dropdown-item" href="" role="button" data-toggle="modal" data-target="#addPage">Add Page</a>
              <a class="dropdown-item" href="" role="button" data-toggle="modal" data-target="#addPost">Add Post</a>
              <a class="dropdown-item" href="" role="button" data-toggle="modal" data-target="#addUser">Add User</a>
            </ul>
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
            <a href="index.html" class="list-group-item active main-color-bg">
              <span class="fas fa-cog" aria-hidden="true"></span> Dashboard
            </a>
            <a href="pages.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <div>
                <span class="fas fa-list-alt mb-1" aria-hidden="true"></span> Pages
              </div>
              <span class="badge badge-pill badge-dark align-items-end">0</span>
            </a>
            <a href="posts.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <div>
                <span class="fas fa-pencil-alt mb-1" aria-hidden="true"></span> Posts
              </div>
              <span class="badge badge-pill badge-dark align-items-end">0</span>
            </a>
            <a href="users.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <div>
                <span class="fas fa-user mb-1" aria-hidden="true"></span> Users
              </div>
              <span class="badge badge-pill badge-dark align-items-end">0</span>
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
        <div class="col-md-9">
          <!-- Website Overview -->
          <div class="card">
            <h3 class="card-header main-color-bg">Pages</h3>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <input class="form-control" type="text" placeholder="Filter Pages...">
                </div>
              </div>
              <br>
              <div class="table-users table-responsive-md table-wrapper-scroll-y table-scrollbar">
                <table class="table table-striped table-hover">
                <thead>
                  <th>Title</th>
                  <th>Openbaar</th>
                  <th>Gewijzigd</th>
                  <th></th>
                  <th></th>
                </thead>
                <tr>
                  <td>Project 1</td>
                  <td><span class="fas fa-check" aria-hidden="true"></span></td>
                  <td>Dec 12, 2016</td>
                  <td><a class="btn btn-outline-dark" href="project_editor.php">Bewerk</a></td>
                  <td><a class="btn btn-danger" href="project_editor.php">Verwijder</a></td>
                </tr>
                <tr>
                  <td>Project 2</td>
                  <td><span class="fas fa-check" aria-hidden="true"></span></td>
                  <td>Dec 12, 2016</td>
                  <td><a class="btn btn-outline-dark" href="project_editor.php">Bewerk</a></td>
                  <td><a class="btn btn-danger" href="project_editor.php">Verwijder</a></td>
                </tr>
                <tr>
                  <td>Project 3</td>
                  <td><span class="fas fa-check" aria-hidden="true"></span></td>
                  <td>Dec 12, 2016</td>
                  <td><a class="btn btn-outline-dark" href="project_editor.php">Bewerk</a></td>
                  <td><a class="btn btn-danger" href="project_editor.php">Verwijder</a></td>
                </tr>
              </table>
            </div>
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
        <form action="../backend/controllers/projectcreator.php" method="POST">
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
              <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
            </div>
            <div class="checkbox">
              <label>
                <input name="published" type="checkbox"> Published
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
    CKEDITOR.replace('editor1');
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>