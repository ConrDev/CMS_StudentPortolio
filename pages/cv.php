<?php
require_once '../backend/config/config.php';
session_start();

$homeSQL = "SELECT * FROM `pages` WHERE `page_ID` = 1";
$aboutSQL = "SELECT * FROM `pages` WHERE `page_ID` = 2";
$logoSQL = "SELECT * FROM `header` WHERE `name` = 'logo'";
$webnameSQL = "SELECT * FROM `header` WHERE `name` = 'website-name'";

$home = mysqli_query($link, $homeSQL);
$about = mysqli_query($link, $aboutSQL);
$logo = mysqli_query($link, $logoSQL);
$webnameQuery = mysqli_query($link, $webnameSQL);

$homepage = mysqli_fetch_array($home);
$aboutpage = mysqli_fetch_array($about);
$logoIMG = mysqli_fetch_array($logo);
$webname = mysqli_fetch_array($webnameQuery);

// $homeSQL = "SELECT * FROM `pages` WHERE `page_ID` = 1";
// $aboutSQL = "SELECT * FROM `pages` WHERE `page_ID` = 2";
// $logoSQL = "SELECT * FROM `header` WHERE `name` = 'logo'";

// $home = mysqli_query($link, $homeSQL);
// $about = mysqli_query($link, $aboutSQL);
// $logo = mysqli_query($link, $logoSQL);

// $homepage = mysqli_fetch_array($home);
// $aboutpage = mysqli_fetch_array($about);
// $logoIMG = mysqli_fetch_array($logo);
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
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<header id="title">
        <div class="container-fluid">
            <div class="row p-2">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="./index.php"><img src="../assets/images/<?=$logoIMG["content"]; ?>"></a>
                    </div>
                </div>
                <div class="col-md-8 py-5">
                    <h1 class="text-center"><?=$webname["content"]; ?></h1>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <div id="my-nav" class="collapse navbar-collapse container ">
                <ul class="navbar-nav row col text-center">
                    <li class="col-md-3 nav-item">
                        <a class="nav-link" href="">Home</a>
                    </li>
                    <li class="col-md-3 nav-item">
                        <a class="nav-link" href="./about.php">About Me</a>
                    </li>
                    <li class="col-md-3 nav-item active">
                        <a class="nav-link" href="./cv.php">C.V.</a>
                    </li>
                    <li class="col-md-3 nav-item">
                        <a class="nav-link" href="./projecten.php">Projecten</a>
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
                                    <a class="nav-link" href="../dashboard/index.php">Dashboard</a>
                                </li>
                        <?php
                            } else {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="loguit.php">Loguit</a>
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
            <div class="card text-center mb-3">
                <div class="card-body">
                <?php 
                $result = mysqli_query($link, "SELECT Name FROM cv WHERE ID = 1");
                $row = $result->fetch_assoc();
                ?>
                    <iframe style="width: 100%; height: 30vw;" src="../assets/cv/<?=$row['Name'];?>" frameborder="0"></iframe>
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