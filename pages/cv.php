<?php
require_once '../backend/config/config.php';
session_start();
// if($_SESSION['level'] != 1 && isset($_SESSION    )) {
//     $_SESSION['level'] = 0;
// }
if (isset($_POST['code'])) {
    $data = $_POST['code'];
    $result = mysqli_query($link, "SELECT * FROM invites WHERE link = '$data'");
    $row = $result->fetch_array();
    if (isset($row['link'])) {
        if (isset($data)) {
            $_SESSION['unique_code'] = $data;
        } else {
            echo "verkeerde code";
        }
    }
}

$id = 1;

$stmt = $link->prepare("SELECT * FROM `cv` WHERE `ID` = ?");
$stmt->bind_param("s", $id);
$stmt->execute();

$cv = mysqli_fetch_array($stmt->get_result());

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>



<body>
    <header id="title">
        <div class="container-fluid">
            <div class="row p-2">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="./index.php"><img src="../assets/images/<?= $logoIMG["content"]; ?>"></a>
                    </div>
                </div>
                <div class="col-md-8 py-5">
                    <h1 class="text-center"><?= $webname["content"]; ?></h1>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <div id="my-nav" class="collapse navbar-collapse container ">
            <ul class="navbar-nav row col text-center">
                <li class="col-md-3 nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
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
                if (!isset($_COOKIE['token']) && !isset($_SESSION['token'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php">Login</a>
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
                        <a class="nav-link" href="loguit.php">Loguit</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <!-- <ul class="navbar-nav navbar-right col-md-2">
                        <?php
                        if (!isset($_COOKIE['token']) && !isset($_SESSION['token'])) {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="pages/login.php">Login</a>
                                </li>
                        <?php
                        } else if (isset($_SESSION["level"]) && $_SESSION["level"] == 1) {
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
                <div class="card-body mx-auto">
                    <?php
                    // $result = mysqli_query($link, "SELECT Name FROM cv WHERE ID = 1");
                    // $row = $result->fetch_assoc();
                    // if (isset($_SESSION['unique_link']) || isset($_GET['link']) || $_SESSION['level'] == 1) {
                    // if (isset($_GET['link'])) {
                    //     $_SESSION["unique_link"] = $_GET['link'];
                    // }
                    // $link = $_SESSION["unique_link"];
                    // $query = "SELECT link FROM invites WHERE link = '$link'";
                    // if (mysqli_query($mysqli, $query)) {
                    //     //Pagina
                    // } else {
                    //     echo "verkeerde code";
                    //     // header("Location: index.php");
                    // }
                    // } else
                    // echo $_SESSION['level'];
                    if (!isset($_SESSION['unique_code']) && !isset($_SESSION["level"]) || !isset($_SESSION['unique_code']) && isset($_SESSION['level']) && $_SESSION["level"] == 0) {
                    ?>
                        <form action="" method="POST" class="card-body mb-1">
                            <div class="form-group">
                                <label for="inputCode"><b>Voer uw toegangs code in</b></label>
                                <input type="text" class="form-control" id="group" aria-describedby="codeHelp" placeholder="Toegangs code" name="code" required>
                                <small name="codeEroor" id="codeEroor" class="form-text text-muted">
                                    <?php if (!empty($errors['code'])) : ?>
                                        <div class="alert alert-danger pb-0" role="alert">
                                            <p class="fas fa-exclamation-triangle"></p>
                                            <?= $errors['code']; ?>
                                        </div>
                                    <?php endif; ?>
                                </small>
                                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                            </div>
                            <div class="form-group">
                                <button type="submit" name="codeSubmit" class="btn btn-default btn-block">VERSTUUR</button>
                            </div>
                        </form>
                    <?php
                    } else {
                    ?>
                        <button class="btn " type="application/pdf" id="dl" type="button">Download</button>
                        <!-- <iframe id="pdf" name="pdf" style="width: 750px; height: 900px;" frameborder="0"></iframe> -->
                        <div id="pdf">
                            <!-- <iframe id=></iframe> -->
                        </div>


                    <?php } ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script src="http://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="../JS/html2pdf.bundle.min.js"></script>
    <script>
        // var doc = document.getElementById('pdf').contentWindow.document;
        // var cssLink = document.createElement("link");
        // cssLink.href = "https://use.fontawesome.com/releases/v5.7.0/css/all.css"; 
        // cssLink.rel = "stylesheet"; 
        // cssLink.type = "text/css"; 
        // frames['pdf'].document.head.appendChild(cssLink);
        // const jsPDF = require('jspdf');

        // window.html2pdf = window.html2pdf.html2pdf;
        "use strict";

        var html = `<html><head><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"><style><?= preg_replace("/\r|\n/", "", $cv["Style"]); ?></style></head><body><?= preg_replace("/\r|\n/", "", $cv["Content"]); ?></body></html>`;

        var iframe = document.createElement('iframe');
        var iframedoc;
        iframe.setAttribute('id', 'pdfframe');
        iframe.frameBorder = 0;
        iframe.width = 750;
        iframe.height = 900;
        $('#pdf').append($(iframe));
        setTimeout(function() {
            iframedoc = iframe.contentDocument || iframe.contentWindow.document;
            $('body', $(iframedoc)).html(html);
            html2canvas(iframedoc.body, {
                onrendered: function(canvas) {
                    $('body', $('#pdf')).append(canvas);
                    $('body', $(document)).remove(iframe);
                    // $('#pdfframe').append($('#pdf'));
                }
            });
        }, 10);
        // doc.open();
        // doc.write(`<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"><style><?= preg_replace("/\r|\n/", "", $cv["Style"]); ?></style> <?= preg_replace("/\r|\n/", "", $cv["Content"]); ?>`);
        // doc.close();

        function toPDF() {

            var htmlpdf = new html2pdf();
            
            const element = document.getElementsByClassName('html2pdf__overlay');

            // var source = htmlpdf.from(html).save();

            var pdf = new jsPDF('p', 'pt', 'letter', 'a4');
            pdf.addFont('../fonts/fontawesome-webfont.ttf', 'FontAwesome', 'normal', 'StandardEncoding');
            pdf.setFont('FontAwesome');

            pdf.fromHTML(html, 0.5,0.5, {'width': 1080});
            pdf.save();
        //     var pdf = new jsPDF('p', 'pt', 'letter', 'a4');

        //     // // source can be HTML-formatted string, or a reference
        //     // // to an actual DOM element from which the text will be scraped.
        //     // source = $("#pdfframe")[0];
        //     // // all coords and widths are in jsPDF instance's declared units
        //     // // 'inches' in this case
        //     // pdf.fromHTML(
        //     //     source // HTML string or DOM elem ref.
        //     //     , 0.5 // x coord
        //     //     , 0.5 // y coord
        //     //     , {
        //     //         'width': 1080 // max width of content on PDF
        //     //     }
        //     // )

        //     // pdf.save('Test.pdf');
        //     var frame = $('pdfframe');
        //     var framedoc = iframe.contentDocument || iframe.contentWindow.document;
        //     pdf.fromHTML(framedoc, 15, 15);
        //     pdf.save("sample.pdf");
        }

        $('#dl').click(() => {
            toPDF();
        })

    </script>
</body>

</html>