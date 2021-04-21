<?php
require_once 'backend/config/config.php';
session_start();

$id=1;

$stmt = $link->prepare("SELECT * FROM `pages` WHERE page_ID=?");
$stmt->bind_param("i", $id);
$stmt->execute();

$content = $stmt->get_result();
print_r($content);

?>

<!doctype html>
<html lang="en">

<head>
    <title>Student Portfolio</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header id="title">
        <div class="container-fluid">
            <div class="row p-2">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="./index.php">LOGO</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <h1 class="text-center">(Naam)'s Portfolio</h1>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <div id="my-nav" class="collapse navbar-collapse container ">
                <ul class="navbar-nav row col text-center">
                    <li class="col-md-3 nav-item active">
                        <a class="nav-link" href="">Home</a>
                    </li>
                    <li class="col-md-3 nav-item">
                        <a class="nav-link" href="pages/about.php">About Me</a>
                    </li>
                    <li class="col-md-3 nav-item">
                        <a class="nav-link" href="pages/cv.php">C.V.</a>
                    </li>
                    <li class="col-md-3 nav-item">
                        <a class="nav-link" href="pages/projecten.php">Projecten</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right col-md-2">
                        <?php
                            if(!isset($_COOKIE['token']) && !isset($_SESSION['token'])) {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/login.php">Login</a>
                                </li>
                        <?php
                            } else if(isset($_SESSION["level"]) && $_SESSION["level"] == 1) {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard/index.php">Dashboard</a>
                                </li>
                        <?php
                            } else {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/logout.php">Logout</a>
                                </li>
                        <?php
                            }
                        ?>
                </ul>
            </div>
                <!-- <ul class="navbar-nav navbar-right col-md-2">
                        <?php
                            if(!isset($_COOKIE['token']) && !isset($_SESSION['token'])) {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/login.php">Login</a>
                                </li>
                        <?php
                            } else if(isset($_SESSION["level"]) && $_SESSION["level"] == 1) {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard/index.php">Dashboard</a>
                                </li>
                        <?php
                            } else {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/logout.php">Logout</a>
                                </li>
                        <?php
                            }
                        ?>
                </ul> -->
    </nav>

    <section id="main">
        <div class="container">
            <div class="card text-center p-5 mb-3">
                <div class="card-body">
                    <h5 class="card-title">Welkom op mijn protfolio!</h5>
                    <p class="card-text">(welkoms bericht)</p>
                    <a href="./pages/about.php" class="btn btn-primary">About Me</a>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="row justify-content-center mr-auto">
            <h3 class="copyright">&copy; website name</h3>
            <h3 class="splitter px-2">|</h3>
            <p class="credits py-2">created with ❤️ by WeDevign</p>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>