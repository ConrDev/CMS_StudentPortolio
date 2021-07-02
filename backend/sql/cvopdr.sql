-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 02 jul 2021 om 15:27
-- Serverversie: 10.4.17-MariaDB
-- PHP-versie: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvopdr`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cv`
--

CREATE TABLE `cv` (
  `ID` int(255) NOT NULL,
  `Content` text NOT NULL,
  `Style` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `cv`
--

INSERT INTO `cv` (`ID`, `Content`, `Style`) VALUES
(1, '<div id=\"rb-layout\"><div id=\"rb-content-top\"><div class=\"rb-block\"><div><h1><span id=\"izkl\">Conner van Tilburg</span></h1><h1 class=\"job_position\"><span>Job\'s position</span></h1></div></div></div><div id=\"rb-main\"><div id=\"rb-left\"><div class=\"block rb-block\"><p class=\"h3\"><span class=\"box-title rb_data\">information</span></p></div><div class=\"box-contact\"><p class=\"icoweb\"><i class=\"fa fa-calendar\"></i><span>22/12/1995</span></p><p class=\"icoweb\"><i class=\"fa fa-user\"></i><span>Men</span></p><p class=\"icoweb\"><i class=\"fa fa-phone\"></i><span>0123456789</span></p><p class=\"icoweb\"><i class=\"fa fa-envelope-square\"></i><span>example@example.com</span></p><p class=\"icoweb\"><i class=\"fa fa-map-marker\"></i><span>New York</span></p><p class=\"icoweb\"><i class=\"fa fa-info\"></i><span>fb.com/me</span></p></div><p class=\"h3\"><span class=\"box-title rb_data\">Skill</span></p><div class=\"exp content-edit skill\"><div class=\"rb-box-content-skill\"><div><p class=\"skill-name\">Skill\'s name</p><span class=\"fa fa-star checked\"></span><span class=\"fa fa-star checked\"></span><span class=\"fa fa-star checked\"></span><span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span></div><div><p class=\"skill-name\">Skill\'s name</p><span class=\"fa fa-star checked\"></span><span class=\"fa fa-star checked\"></span><span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span><span class=\"fa fa-star\"></span></div><div><p class=\"skill-name\">Skill\'s name</p><span class=\"fa fa-star checked\"></span><span class=\"fa fa-star checked\"></span><span class=\"fa fa-star checked\"></span><span class=\"fa fa-star checked\"></span><span class=\"fa fa-star\"></span></div></div></div></div><div id=\"rb-content\"><div id=\"rb-content-main\"><div class=\"rb-block\"><p class=\"head\"><i aria-hidden=\"true\" class=\"fa fa-dot-circle\"></i><span>Target</span></p><div><div class=\"rb-box-content\"><div class=\"exp-content\">                Lorem ipsum dolor sit amet, consectetur adipisicing elit.                Reprehenderit maiores explicabo nam similique quaerat, porro                perferendis adipisci molestias eius dolore eaque, consequatur                placeat voluptates consequuntur              </div></div></div></div><div class=\"rb-block\"><p class=\"head\"><i aria-hidden=\"true\" class=\"fa fa-graduation-cap\"></i><span>Education</span></p><div><div class=\"rb-box-content\"><h3><span>School\'s name</span><span class=\"exp-date\"><em>08/2019</em> - <em>03/2020</em></span></h3><p class=\"h3\"><span>Major</span></p><div class=\"exp-content\">                Lorem ipsum dolor sit amet, consectetur adipisicing elit.                Reprehenderit maiores explicabo nam similique quaerat, porro                perferendis adipisci molestias eius dolore eaque, consequatur                placeat voluptates consequuntur              </div></div></div></div><div class=\"rb-block\"><p class=\"head\"><i aria-hidden=\"true\" class=\"fa fa-briefcase\"></i><span>Expericence</span></p><div><div class=\"rb-box-content\"><h3><span>Company\'s name</span><span class=\"exp-date\"><em>04/2020</em> - <em>Now</em></span></h3><p class=\"h3\"><span>Position</span></p><div class=\"exp-content\">                Lorem ipsum dolor sit amet, consectetur adipisicing elit.                Reprehenderit maiores explicabo nam similique quaerat, porro                perferendis adipisci molestias eius dolore eaque, consequatur                placeat voluptates consequuntur              </div></div></div></div><div class=\"rb-block\"><p class=\"head\"><i aria-hidden=\"true\" class=\"fa fa-user\"></i><span>Activities</span></p><div><div class=\"rb-box-content\"><h3><span>Organization\'s name</span><span class=\"exp-date\"><em>01/2019</em> - <em>03/2020</em></span></h3><p class=\"h3\"><span>Position</span></p><div class=\"exp-content\">                Lorem ipsum dolor sit amet, consectetur adipisicing elit.                Reprehenderit maiores explicabo nam similique quaerat, porro                perferendis adipisci molestias eius dolore eaque, consequatur                placeat voluptates consequuntur              </div></div></div></div><div class=\"rb-block\"><p class=\"head\"><i aria-hidden=\"true\" class=\"fa fa-trophy\"></i><span>AWARD</span></p><div><div class=\"rb-box-content\"><h3><span>Award\'s name</span><span class=\"exp-date\"><em>01/2019</em></span></h3></div></div></div><div class=\"rb-block\"><p class=\"head\"><i aria-hidden=\"true\" class=\"fa fa-cogs\"></i><span>SKILL</span></p><div><div class=\"rb-box-content\"><h3><span>Skill\'s name</span></h3><div class=\"exp-content\">                Lorem ipsum dolor sit amet, consectetur adipisicing              </div></div></div></div><div class=\"rb-block\"><p class=\"head\"><i aria-hidden=\"true\" class=\"fa fa-caret-square-down\"></i><span>More information</span></p><div><div class=\"rb-box-content\"><div class=\"exp-content\">                Lorem ipsum dolor sit amet, consectetur adipisicing elit.                Reprehenderit maiores explicabo nam similique quaerat, porro                perferendis adipisci molestias eius dolore eaque, consequatur                placeat voluptates consequuntur              </div></div></div></div><div class=\"rb-block\"><p class=\"head\"><i aria-hidden=\"true\" class=\"fa fa-link\"></i><span>References</span></p><div><div class=\"rb-box-content\"><div class=\"exp-content\">Name, company, phone, email,...</div></div></div></div></div></div></div></div>', 'body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}body{font-family:\"Roboto\", sans-serif !important;max-width:210mm;min-height:290mm;height:auto;margin-top:20px;margin-right:auto;margin-bottom:20px;margin-left:auto;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}#rb-layout{width:100%;max-width:210mm;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;box-shadow:rgba(0, 0, 0, 0.2) 0px 3px 1px -2px, rgba(0, 0, 0, 0.14) 0px 2px 2px 0px, rgba(0, 0, 0, 0.12) 0px 1px 5px 0px;}.rb-box-content-skill .checked{color:orange;}.rb-box-content-skill span{margin-left:5px;}#rb-main{font-family:\"Open Sans\", sans-serif;font-size:14px;line-height:24px;display:flex;flex-wrap:nowrap;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;background-color:rgb(255, 255, 255);}#rb-left .rb-block{margin-bottom:30px;}#rb-left{width:28%;padding-bottom:10px;padding-left:5px;padding-right:20px;padding-top:20px;border-top-color:rgb(212, 216, 221);border-top-style:solid;border-right-color:rgb(212, 216, 221);border-right-style:solid;border-bottom-color:rgb(212, 216, 221);border-bottom-style:solid;border-left-color:rgb(212, 216, 221);border-left-style:solid;border-image-outset:0;border-image-repeat:stretch;border-image-slice:100%;border-image-source:none;border-image-width:1;border-top-width:2px;border-right-width:2px;border-bottom-width:0px;border-left-width:0px;}#rb-content{width:72%;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;padding-left:20px;padding-top:20px;border-top-color:rgb(212, 216, 221);border-top-style:solid;border-right-color:rgb(212, 216, 221);border-right-style:solid;border-bottom-color:rgb(212, 216, 221);border-bottom-style:solid;border-left-color:rgb(212, 216, 221);border-left-style:solid;border-image-outset:0;border-image-repeat:stretch;border-image-slice:100%;border-image-source:none;border-image-width:1;border-top-width:2px;border-right-width:0px;border-bottom-width:0px;border-left-width:0px;}#rb-content-top{color:rgb(0, 0, 0);background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;padding-right:15px;padding-bottom:15px;padding-left:15px;padding-top:30px;}#rb-content-top .rb-block{position:relative;display:flex;}#rb-content-top .rb-block img{width:80px;border-top-left-radius:5%;border-top-right-radius:5%;border-bottom-right-radius:5%;border-bottom-left-radius:5%;}#rb-content .rb-block{position:relative;padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px;}#rb-left .rb-box-content{padding-bottom:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;}.skill{margin-top:15px;}#rb-content-top h1{font-size:45px;margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;color:rgb(17, 130, 178);padding-top:0px;padding-left:10px;line-height:normal;text-transform:capitalize;font-weight:800;}#rb-content-top .job_position{font-size:22px;color:rgb(51, 51, 51);font-weight:500;margin-top:15px;}#rb-content-top h1 span{display:block;}.box-name p{overflow-x:hidden;overflow-y:hidden;}#rb-content p{margin-bottom:5px;}#rb-left .h3{font-size:18px;font-weight:bold;margin-top:0px;text-transform:uppercase;}#rb-content .head{font-size:18px;color:rgb(47, 58, 64);padding-bottom:5px;font-weight:bold;margin-top:0px;text-transform:uppercase;}#rb-content h3{font-weight:bold;font-size:14px;line-height:30px;margin-bottom:10px;color:rgb(51, 51, 51);}#rb-content span[contenteditable]{display:inline-block;padding-right:15px;padding-left:15px;}#rb-left .h3:first-child{margin-top:0px;}.rb-box-content{margin-bottom:25px;padding-left:15px;position:relative;}#rb-box-ava img{padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;border-top-color:currentcolor;border-top-style:none;border-top-width:0px;border-right-color:currentcolor;border-right-style:none;border-right-width:0px;border-bottom-color:currentcolor;border-bottom-style:none;border-bottom-width:0px;border-left-color:currentcolor;border-left-style:none;border-left-width:0px;border-image-outset:0;border-image-repeat:stretch;border-image-slice:100%;border-image-source:none;border-image-width:1;width:150px;height:150px;}.bar-exp span{display:block;height:8px;background-color:rgb(217, 217, 217);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;}.icoweb label{display:block;color:rgb(98, 126, 136);}.icoweb span{display:block;}.box-contact{font-size:13px;padding-top:0px;}.icoweb i.fa{width:20px;height:20px;background-color:rgb(255, 255, 255);border-top-left-radius:50%;border-top-right-radius:50%;border-bottom-right-radius:50%;border-bottom-left-radius:50%;display:inline-block;text-align:center;font-size:13px;line-height:20px;color:rgb(47, 58, 64) !important;margin-right:10px;margin-top:3px;float:left;}.head i{font-size:25px;margin-right:10px;}#rb-content span.exp-date{float:right;}.icon_fa i.fa{font-size:20px;border-top-color:rgb(255, 255, 255);border-top-style:solid;border-top-width:1px;border-right-color:rgb(255, 255, 255);border-right-style:solid;border-right-width:1px;border-bottom-color:rgb(255, 255, 255);border-bottom-style:solid;border-bottom-width:1px;border-left-color:rgb(255, 255, 255);border-left-style:solid;border-left-width:1px;border-image-outset:0;border-image-repeat:stretch;border-image-slice:100%;border-image-source:none;border-image-width:1;border-top-left-radius:50%;border-top-right-radius:50%;border-bottom-right-radius:50%;border-bottom-left-radius:50%;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;width:20px;color:white;background-color:rgb(255, 255, 255);background-position-x:0%;background-position-y:0%;background-repeat:repeat;background-attachment:scroll;background-image:none;background-size:auto;background-origin:padding-box;background-clip:border-box;margin-bottom:5px;}p.head i.fa{float:left;}.rb-skillrate-value[value=\"1\"]{width:20%;}.rb-skillrate-value[value=\"2\"]{width:40%;}.rb-skillrate-value[value=\"3\"]{width:60%;}.rb-skillrate-value[value=\"4\"]{width:80%;}.rb-skillrate-value[value=\"5\"]{width:100%;}');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `header`
--

INSERT INTO `header` (`id`, `name`, `content`) VALUES
(1, 'logo', 'logo.png'),
(2, 'website-name', 'Bob de bouwer\'s Portfolio');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `invites`
--

CREATE TABLE `invites` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `link` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `invites`
--

INSERT INTO `invites` (`ID`, `email`, `link`) VALUES
(1, 'calvinhofman3@gmail.com', '6GiDrAzLpdtlYBT0Xw89'),
(2, 'calvinhofman3@gmail.com', 'edz2rsot0i58OhcDQRJS'),
(3, 'calvinhofman3@gmail.com', 'hQ5MW0iKTHguvxaqzkJ3'),
(4, 'calvinhofman3@gmail.com', 'GgWwUMLXNjZEDFpbu7K4'),
(5, 'calvinhofman3@gmail.com', 'Dd9XYut8SxM1yzNCWZ4k'),
(6, 'calvinhofman3@gmail.com', 'zCJb9qOah3vLs05ifBNd'),
(7, 'connerisgay@gmail.com', 'WV5r3zDCEfh7a6Msn9Ig'),
(8, 'connerisgay@gmail.com', 'PKnd89NASEcftleqFvj1'),
(9, 'connerisgay@gmail.com', 'y7nhL4BjwrCbXS0ZmMdl'),
(10, 'connerisgay@gmail.com', 'OmfyQPcW2inGBF8pAzwb'),
(11, 'thimoisgay@gmail.com', 'hYl4JKoxtFv8gqMaTUQC');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pages`
--

CREATE TABLE `pages` (
  `page_ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`page_ID`, `title`, `content`, `published`) VALUES
(1, 'Home', '<div class=\"card-body\">\r\n<h5 class=\"card-title\">Welkom op mijn portfolio!</h5>\r\n\r\n<p class=\"card-text\">(welkoms bericht kaas)</p>\r\n<a class=\"btn btn-alarm\" href=\"/pages/about.php\">over mij</a>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n', 1),
(2, 'About Me', '<div class=\"card-body\">\r\n<h5 class=\"card-title\">Op deze pagine vertel ik wat over mijzelf</h5>\r\n\r\n<p class=\"card-text\">dit is een voorbeeld</p>\r\n\r\n<p class=\"card-text\">&nbsp;</p>\r\n</div>\r\n', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projecten`
--

CREATE TABLE `projecten` (
  `ID` int(255) NOT NULL,
  `DateCreated` date NOT NULL,
  `DateEdited` date NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Metatags` varchar(255) NOT NULL,
  `Published` tinyint(1) NOT NULL,
  `Content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projecten`
--

INSERT INTO `projecten` (`ID`, `DateCreated`, `DateEdited`, `Name`, `Metatags`, `Published`, `Content`) VALUES
(5, '0000-00-00', '0000-00-00', '$title', '$metatags', 0, '<p>Welkom op mijn protfolio!</p>  <p>(welkoms bericht)</p>  <p><a href=\"./pages/about.php\">About Me</a></p>'),
(13, '2021-04-21', '2021-04-21', 'test', 'sdsd', 0, '<p>&lt;p&gt;aksaksaks&lt;/p&gt;</p>\r\n'),
(24, '2021-04-20', '2021-04-21', 'Developer', 'sdfdsf', 1, '<p>sdfsdfsdfsdfsdf</p>\r\n'),
(31, '2021-04-21', '2021-04-21', 'kaasasasas', 'dasdasd', 1, '<p>asdasdsad</p>\r\n'),
(32, '2021-04-21', '2021-04-21', 'wawawa', 'dasdasd', 1, '<p>kaaasasas</p>\r\n'),
(34, '2021-04-28', '2021-04-28', 'test', 'test', 1, '<p>test</p>\r\n'),
(36, '2021-05-28', '2021-05-28', 'henk6', 'banana', 1, '<p>testing bananan</p>\r\n');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reacties`
--

CREATE TABLE `reacties` (
  `id` int(11) NOT NULL,
  `gebruiker_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `UUID` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CompanyName` varchar(100) DEFAULT 'NA',
  `Level` int(11) DEFAULT 0,
  `Created` date DEFAULT current_timestamp(),
  `invite_link` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`UUID`, `FirstName`, `LastName`, `Email`, `Password`, `CompanyName`, `Level`, `Created`, `invite_link`) VALUES
('6e7f1fe9-14ff-49be-ae66-cca34e2ae4ff', 'Admin', '', 'Admin', '$2y$12$SwlrtEXXJ2yzBsADFw3FHuuYEOxRf3c0sy5UQq/3j0WtVH59X4hV6', 'NA', 1, '2021-04-11', 'Dhk2N9TsXjG5FZvHLcni'),
('ee506c6f-028a-4203-8df2-2c1c2bbfe070', 'Conner', 'van Tilburg', '84671@glr.nl', '$2y$12$e4qLUC21b9OPAglAfYKG..ZefG0T4ai4QtlfODdo/XVz4eluz9tOK', 'WeDevign', 0, '2021-04-08', 'V7bKjrq2o8hzx0ntxZIZ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `visitors`
--

CREATE TABLE `visitors` (
  `ID` int(255) NOT NULL,
  `visits` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `visitors`
--

INSERT INTO `visitors` (`ID`, `visits`) VALUES
(1, 0),
(24, 23),
(33, 1),
(34, 3),
(35, 1),
(36, 1);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_ID`);

--
-- Indexen voor tabel `projecten`
--
ALTER TABLE `projecten`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UUID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexen voor tabel `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cv`
--
ALTER TABLE `cv`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `invites`
--
ALTER TABLE `invites`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `page_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `projecten`
--
ALTER TABLE `projecten`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
