<?php
require_once '../backend/controllers/session.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Account Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/dashboard.css">

  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
      <a class="navbar-brand" href="#">CMS</a>
      <div id="navbar" class="collapse navbar-collapse">

      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Account Login</h1>
        </div>
      </div>
    </div>
  </header>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body">
              <ul class="nav nav-pills flex-column flex-sm-row" id="pills-tab" role="tablist">
                <li class="flex-sm-fill text-sm-center nav-item" role="presentation">
                  <a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <li class="flex-sm-fill text-sm-center nav-item" role="presentation">
                  <a class="nav-link" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                </li>
              </ul>
              <!-- <div class="form-group row">
                  <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="staticEmail" value="" placeholder="Enter Email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword">
                  </div>
                </div> -->
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                    <form action="../backend/controllers/login.php" class="card-body mb-1" method="POST">
                      <div class="form-group">
                        <label for="inputEmail1"><b>E-mailaddres</b></label>
                        <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="E-mailaddres" name="email" required> 
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                      </div>
                      <div class="form-group">
                        <label for="inputPassword1"><b>Wachtwoord</b></label>
                        <input type="password" class="form-control" id="iInputPassword1" placeholder="Wachtwoord" name="password" required>
                      </div>
                      <div class="dropdown-divider my-4"></div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                          <label class="custom-control-label text-muted" for="remember">Onthoud gegevens</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block">LOGIN</button>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
                    <form action="../backend/controllers/register.php" class="card-body mb-1" method="POST">
                      <div class="form-group">
                        <label for="inputEmail1"><b>E-mailaddres</b> <small class="text-muted">*</small></label>
                        <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="E-mailaddres" name="email" required>
                        <small id="emailHelp" class="form-text text-muted">We zullen uw e-mail nooit met andere delen.</small>
                      </div>
                      <div class="form-group">
                        <label for="InputBedrijf"><b>Bedrijf's naam</b></label><label for="InputBedrijf" class="col-md-9 text-right text-muted"><small>(optioneel)</small></label>
                        <input type="text" class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="Bedrijf's naam" name="companyName">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                      </div>
                      <div class="form-group">
                        <label for="inputPassword1"><b>Wachtwoord</b> <small class="text-muted">*</small></label>
                        <input type="password" class="form-control" id="inputPassword1" aria-describedby="passwordHelpInline" placeholder="Wachtwoord" name="password" required>
                        <small id="passwordHelpInline" class="text-muted">Vul alsjeblieft 8 of meer tekens in.</small>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail1"><b>Bevestig Wachtwoord</b> <small class="text-muted">*</small></label>
                        <input type="password" class="form-control" id="inputPassword2" placeholder="Wachtwoord" name="confirmPassword" required>
                      </div>
                      <div class="dropdown-divider my-4"></div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="akkoord" name="akkoord" required>
                          <label class="custom-control-label text-muted" for="akkoord">Ja, ik ga er akkoord mee dat de beheerd van deze website met mij in contact kan komen via de mail. <small class="text-muted">*</small></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block">REGISTER</button>
                      </div>
                    </form>
                  </div>
                </div>
              <!-- <button type="submit" class="btn btn-default btn-block">Login</button> -->
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