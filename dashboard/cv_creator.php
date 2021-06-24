<?php
require_once '../backend/config/config.php';
session_start();

$id = 1;

$stmt = $link->prepare("SELECT * FROM `cv` WHERE `ID` = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$cv = mysqli_fetch_array($stmt->get_result());

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css">

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
          <li class="nav-item"><a class="nav-link" href="#">Welcome, <?php if (isset($_SESSION['email'])) {
                                                                        echo $_SESSION['email'];
                                                                      } else {
                                                                        header('location: ../index.php');
                                                                      } ?></a></li>
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
              <a class="dropdown-item" role="button" data-toggle="modal" href="project_creator.php">Add Project</a>
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
              <span class="badge badge-pill badge-dark align-items-end"><?php $result = mysqli_query($link, "SELECT ID FROM projecten");
                                                                        $num_rows = mysqli_num_rows($result);
                                                                        echo "$num_rows\n"; ?></span>
            </a>
            <a href="users.php" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
              <div>
                <span class="fas fa-user mb-1" aria-hidden="true"></span> Users
              </div>
              <span class="badge badge-pill badge-dark align-items-end"><?php $result = mysqli_query($link, "SELECT UUID FROM user");
                                                                        $num_rows = mysqli_num_rows($result);
                                                                        echo "$num_rows\n"; ?></span>
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
            <div id="editor_container">
              <div id="gjs">

                <!-- <div id="rb-layout">

                  <div id="rb-content-top">
                    <div class="rb-block">
                      <div>
                        <h1><span>Steve Jobs</span></h1>
                        <h1 class="job_position"><span>Job's position</span></h1>
                      </div>
                    </div>
                  </div>
                  <div id="rb-main">
                    <div id="rb-left">
                      <div class="block rb-block">
                        <p class="h3"><span class="box-title rb_data">information</span></p>
                      </div>
                      <div class="box-contact">
                        <p class="icoweb"><i class="fa fa-calendar"></i><span>22/12/1995</span>
                        </p>
                        <p class="icoweb"><i class="fa fa-user"></i><span>Men</span>
                        </p>
                        <p class="icoweb"><i class="fa fa-phone"></i><span>0123456789</span></p>
                        <p class="icoweb"><i class="fa fa-envelope-square"></i><span>example@example.com</span>
                        </p>
                        <p class="icoweb"><i class="fa fa-map-marker"></i><span>New York</span>
                        </p>
                        <p class="icoweb"><i class="fa fa-info"></i><span>fb.com/me</span>
                        </p>
                      </div>
                      <p class="h3"><span class="box-title rb_data">Skill</span></p>
                      <div class="exp content-edit skill">
                        <div class="rb-box-content-skill">
                          <div>
                            <p class="skill-name">Skill's name</p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>

                          <div>
                            <p class="skill-name">Skill's name</p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>

                          <div>
                            <p class="skill-name">Skill's name</p>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                          </div>


                        </div>
                      </div>
                    </div>
                    <div id="rb-content">

                      <div id="rb-content-main">

                        <div class="rb-block">
                          <p class="head">
                            <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                            <span>Target</span>
                          </p>
                          <div>
                            <div class="rb-box-content">
                              <div class="exp-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores explicabo nam similique quaerat, porro perferendis adipisci molestias eius dolore eaque, consequatur placeat voluptates consequuntur
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="rb-block">

                          <p class="head">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <span>Education</span>
                          </p>
                          <div>

                            <div class="rb-box-content">

                              <h3>
                                <span>School's name</span>
                                <span class="exp-date"><em>08/2019</em> - <em>03/2020</em></span>
                              </h3>
                              <p class="h3">
                                <span>Major</span>
                              </p>
                              <div class="exp-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores explicabo nam similique quaerat, porro perferendis adipisci molestias eius dolore eaque, consequatur placeat voluptates consequuntur

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="rb-block">

                          <p class="head">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span>Expericence</span>
                          </p>
                          <div>

                            <div class="rb-box-content">

                              <h3>
                                <span>Company's name</span>
                                <span class="exp-date"><em>04/2020</em> - <em>Now</em></span>
                              </h3>
                              <p class="h3">
                                <span>Position</span>
                              </p>
                              <div class="exp-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores explicabo nam similique quaerat, porro perferendis adipisci molestias eius dolore eaque, consequatur placeat voluptates consequuntur
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="rb-block">

                          <p class="head">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Activities</span>
                          </p>
                          <div>

                            <div class="rb-box-content">
                              <h3>
                                <span>Organization's name</span>
                                <span class="exp-date"><em>01/2019</em> - <em>03/2020</em></span>
                              </h3>
                              <p class="h3">
                                <span>Position</span>
                              </p>
                              <div class="exp-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores explicabo nam similique quaerat, porro perferendis adipisci molestias eius dolore eaque, consequatur placeat voluptates consequuntur
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="rb-block">
                          <p class="head">
                            <i class="fa fa-trophy" aria-hidden="true"></i>
                            <span>AWARD</span>
                          </p>
                          <div>
                            <div class="rb-box-content">
                              <h3>
                                <span>Award's name</span>
                                <span class="exp-date"><em>01/2019</em></span>
                              </h3>
                            </div>
                          </div>
                        </div>
                        <div class="rb-block">
                          <p class="head">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            <span>SKILL</span>
                          </p>
                          <div>
                            <div class="rb-box-content">
                              <h3>
                                <span>Skill's name</span>
                              </h3>
                              <div class="exp-content">Lorem ipsum dolor sit amet, consectetur adipisicing
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="rb-block">

                          <p class="head">
                            <i class="fa fa-caret-square-o-down" aria-hidden="true"></i>
                            <span>More information</span>
                          </p>
                          <div>
                            <div class="rb-box-content">
                              <div class="exp-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores explicabo nam similique quaerat, porro perferendis adipisci molestias eius dolore eaque, consequatur placeat voluptates consequuntur

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="rb-block">

                          <p class="head">
                            <i class="fa fa-link" aria-hidden="true"></i>
                            <span>References</span>
                          </p>
                          <div>

                            <div class="rb-box-content">
                              <div class="exp-content">Name, company, phone, email,...
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
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


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script src="../JS/grapes.min.js"></script>
  <script>
    "use strict";


    const LandingPage = {
      html: `<?= preg_replace("/\r|\n/", "", $cv["Content"]); ?>`,
      css: `<?= include_once('cv/template1.css'); ?>`,
    };


    grapesjs.plugins.add('example-plugin', function(editor, options) {
      // remove the devices switcher
      editor.getConfig().showDevices = false;
      editor.getConfig().allowScripts = 0;


      // console.log(editor.getConfig());
      // remove the view code 
      editor.Panels.removeButton("views", "open-layers");
      editor.Panels.removeButton('options', 'export-template');
      editor.Panels.removeButton('views', 'open-blocks');
      editor.Panels.removeButton('views', 'open-tm');
      editor.Panels.removeButton('views', 'sw-visibility');


      editor.Panels.addButton('options', [{
        id: 'undo',
        className: 'fa fa-undo',
        command: function(e) {
          e.runCommand('core:undo')
        }
      }]);


      editor.Panels.addButton('options', [{
        id: 'redo',
        className: 'fa fa-repeat',
        command: function(e) {
          e.runCommand('core:redo')
        }
      }]);


      editor.Panels.addPanel({
        id: 'myNewPanel',
        visible: true,
        // <input type="text" name="name" value = "@if(isset($name)) {!! $name !!} @endif" class="form-control" placeholder="@lang('Enter name')" autocomplete="off">
        content: `
        <div class="input-group">
          <span class="input-group-btn">

            <button id="save_resume"class="btn btn-success">
                <i class="far fa-save"></i> Save
                </button>
            </span>
            <span class="input-group-btn"></span>
        </div>`
      });


    });

    $(document).ready(function() {
      "use strict";
      $("#save_resume").on("click", function(e) {
        e.preventDefault();
        var content = editor.getHtml();
        var style = editor.getCss();
        var name = $("input[name='name']").val();
        var id = $("input[name='id']").val();
        var _token = $("input[name='_token']").val();
        var action = $("input[name='action']").val();

        var url_post = '';
        var data = '';
        if (action == "create") {
          url_post = "{{ route('resume.save') }}";
          data = {
            _token: _token,
            name: name,
            content: content,
            style: style
          };
        }
        if (action == "update") {

          url_post = "{{ route('resume.update') }}";
          data = {
            _token: _token,
            id: id,
            name: name,
            content: content,
            style: style
          };
        }
        if (url_post) {
          $.ajax({
            url: url_post,
            type: 'POST',
            data: data,
            success: function(data) {
              if ($.isEmptyObject(data.error)) {
                var url = "{{ url('resume/exportpdf') }}" + "/" + data.id;
                Swal.fire({
                  title: "Success?",
                  html: data.success,
                  showCloseButton: true,
                  icon: "success",
                  confirmButtonText: "Export PDF",
                }).then((res) => {
                  if (res.value) {
                    window.open(url, '_blank');
                  }
                });

              } else {

                var error = printErrorMsg(data.error);
                Swal.fire({
                  title: 'Error!',
                  html: error,
                  icon: 'error',
                  confirmButtonText: 'OK'
                });

              }
            }
          });
        }
      });

      function printErrorMsg(msg) {
        var mess = "";
        $.each(msg, function(key, value) {
          mess += '<li>' + value + '</li>';
        });
        return mess;
      }
    });


    // CKEDITOR.replace("editor", {
    //   skin: "n1theme"
    // });
    // CKEDITOR.config.contentsCss = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css";
    // CKEDITOR.scriptLoader.load("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");


    var editor = grapesjs.init({
      container: '#gjs',
      protectedCss: ` body {font-family: 'Roboto', sans-serif !important;max-width: 210mm;min-height: 290mm;height:auto;margin: 20px auto;background: #fff;box-shadow: 0 3px 1px -2px rgba(0,0,0,.2), 0 2px 2px 0 rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12);}`,
      components: LandingPage.html,
      canvas: {
        styles: ['https://fonts.googleapis.com/css?family=Archivo+Narrow:400,400i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Raleway:300,300i,400,400i,500,500i,700,700i|Lato:300,300i,400,400i,500,500i,700,700i|Montserrat:300,300i,400,400i,500,500i,700,700i|Spartan:300,300i,400,400i,500,500i,700,700i&subset=latin,latin-ext', "https://use.fontawesome.com/releases/v5.7.0/css/all.css", "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"],
        scripts: ['https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'],
      },
      style: LandingPage.css,
      storageManager: {
        autoload: false,
      },
      plugins: ["example-plugin"]
    });
  </script>
</body>

</html>