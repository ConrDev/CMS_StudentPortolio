<?php
require '../backend/config/config.php';
session_start();

$id_project = $_GET['ID'];
$query = "SELECT * FROM projecten WHERE ID='$id_project'";
$queryReacties = "SELECT * FROM reacties WHERE id_project='$id_project'";

$resultaat = mysqli_query($link, $query);
$resultaatReacties = mysqli_query($link, $queryReacties);

$id = $id_project;
require "../backend/controllers/visitors.php";
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
//     header('location: ./index.php');
// }

$project = mysqli_fetch_array($resultaat);
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
        <div id="my-nav" class="collapse navbar-collapse container">
            <ul class="navbar-nav row col text-center">
                <li class="col-md-3 nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="col-md-3 nav-item">
                    <a class="nav-link" href="about.php">About Me</a>
                </li>
                <li class="col-md-3 nav-item">
                    <a class="nav-link" href="cv.php">C.V.</a>
                </li>
                <li class="col-md-3 nav-item active">
                    <a class="nav-link" href="projecten.php">Projecten</a>
                </li>

            </ul>
            <ul class="navbar-nav navbar-right col-md-2">
                <?php
                if (!isset($_COOKIE['token']) && !isset($_SESSION['token'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php
                } else if (isset($_SESSION["level"]) && $_SESSION["level"] == 1) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../dashboard/index.php">Dashboard</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>

    </nav>

    <section id="main">
        <div class="container">
            <div class="card mb-3 p-5">
                    <div class="container">
                        <div class="titel">
                            <h1><?= $project['Name']; ?></h1>
                        </div>

                        <ul class="nav nav-pills justify-content-end text-center">
                            <?php
                            if (isset($_SESSION['level']) && $_SESSION['level'] == 1) {
                            ?>
                                <!-- <a href="./aanpassen.php?id=<?= $id_project; ?>" class="terug-btn">Aanpassen</a>
                            <a href="../verwijder.php?soort=recept&id=<?= $id_recept; ?>" class="terug-btn">Verwijder</a> -->

                                <li class="col-md-3 nav-item">
                                    <a href="./aanpassen.php?id=<?= $id_project; ?>" class="terug-btn">Aanpassen</a>
                                </li>
                                <li class="col-md-3 nav-item">
                                    <a href="../verwijder.php?soort=recept&id=<?= $id_recept; ?>" class="terug-btn">Verwijder</a>
                                </li>
                            <?php
                            }
                            ?>
                            <li class="col-md-3 nav-item">
                                <a href="./" class="terug-btn">Terug</a>
                            </li>
                            <?php
                            if (isset($_SESSION['email'])) {
                            ?>
                                <li class="col-md-3 nav-item">
                                    <a href="./reageer.php?project=<?= $project; ?>" class="reageer-btn">Reageer</a>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>



                    </div>
                </div>    

                    <div class="row">

                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <img class="project-foto" src="../<?= $project['foto']; ?>" alt=""> -->
                                    <p class="content"><?= $project['Content']; ?></p>
                                    <br>
                                    <div class="container">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>Attachements:</p>

                                                <!-- <ul class="ingredienten">

                                                <?php
                                                foreach (explode(',', $project['ingredienten']) as $ingredient) {
                                                ?>
                                                    <li><?= $ingredient; ?></li>
                                                <?php
                                                }
                                                ?>
                                            </ul> -->
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <?php
                            while ($reactie = mysqli_fetch_array($resultaatReacties)) {
                            ?>
                                <div class="container">
                                    <div class="card">
                                        <div class="uploader-info">
                                            <?php
                                            $uploader = $reactie["id_Gebruiker"];
                                            $userQuery = "SELECT * FROM gebruikers WHERE id='$uploader'";
                                            $userResultaat = mysqli_query($link, $userQuery);
                                            $gebruiker = mysqli_fetch_array($userResultaat);
                                            ?>
                                            <p class="gebruikersnaam"><?= $gebruiker['gebruikersnaam']; ?></p>
                                            <p class="datum"><?= $gebruiker['join_datum']; ?></p>
                                            <?php
                                            if (isset($_SESSION['level']) && $_SESSION['level'] == 1) {
                                            ?>
                                                <br>
                                                <a href="../verwijder.php?soort=reactie&id=<?= $reactie['id']; ?>&categorie=<?= $recept['id_Categorie']; ?>&recept=<?= $id_recept; ?>" class="terug-btn">Verwijder</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="card-body">
                                            <p class="content"><?= $reactie['content']; ?></p>

                                            <p class="datum"><?= $reactie['datum']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
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