<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lotus Therme Hotel & Spa Hévíz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css\bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css\main.css" />
    <link rel="icon" href="https://cdn2.f-cdn.com/contestentries/306387/16237864/565112c0bf29a_thumb900.jpg" />
</head>

<body class="bg-light">
    <div class="wrapper bg-light">
        <nav id="sidebar">
            <div id="dismiss">
                <i class="">X</i>
            </div>
            <div class="sidebar-header">
                <h3>Lotus Therme Hotel & Spa Hévíz</h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a class="btn btn-light navbar-btn" href="home.php">Home</a>
                    <?php 
                    if(!isset($_SESSION['ID']))
                    {
                        echo '
                        <a class="btn btn-light navbar-btn" href="signup.php">Sign up</a>
                        ';
                    }
                    else
                    {
                        echo '
                        <a class="btn btn-light navbar-btn" href="wellness.php">Wellness</a>
                        <a class="btn btn-light navbar-btn" href="rooms.php">Rooms</a>
                        <a class="btn btn-light navbar-btn" href="wellness.php">Wellness</a>
                        <a class="btn btn-light navbar-btn" href="rooms.php">Rooms</a>
                        ';
                    }
                    ?>
                </li>
                <li>
                    <a class="btn btn-light navbar-btn" href="wellness.php">Wellness</a>
                    <a class="btn btn-light navbar-btn" href="rooms.php">Rooms</a>
                </li>
            </ul>
        </nav>
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-light navbar-btn">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <?php
                            if (isset($_SESSION['ID']))
                            {
                                echo '
                                <form action="inc\logout.inc.php" method="POST" class="form-inline my-2 my-lg-0">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <div class="form-inline">
                                                <label class=" my-2 my-sm-0" >' . $_SESSION['userName'] . '  |</label>
                                                <input type="submit" name="submit" value=" Log out " class="btn btn-light navbar-btn">
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                                ';
                            }
                            else
                            {
                                echo '
                                <form action="inc\login.inc.php" method="post" class="form-inline my-2 my-lg-0">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                            <input type="submit" name="submit" value="Log in" class="btn btn-light navbar-btn">
                                        </li>
                                    </ul>
                                </form>
                                ';
                            }
                        ?>
                </div>
            </nav>
        <div class="container col-9 mt-10">
            <div class="jumbotron text-center">
                <h4 class="display-4">Wellness</h4>
            </div>
            <div class="col-sm-6">
                <h4>Testi - lelki egyensúly</h4>
                <p>Kerüljön újra egyensúlyba Önmagával: kényeztesse a testét különleges masszázsainkkal, merüljön el medencéinkben, fedezze fel a szaunázás különleges élményét szertartásos felöntéseinkkel, vagy lazuljon el a Hévízen egyedülálló Holt-tengeri sóbarlangunkban. Gyógyuljon, pihenjen hagyományos gyógykezeléseink bármelyikével: a tradicionális thai masszázs, shiatsu, yumeiho vagy a különleges Ayurveda masszázsok során lelkileg is feltöltődhet. A szépségszalonunkban L'oreál fodrászat, Germaine de Capuccini arc-és testkezelések sora várja pihenni és megszépülni vágyó hölgyeket és urakat.</p>
            </div>
            <div class="col-sm-6">
                <img src="img/img4.jpg">
            </div>
            <br>
            <div class="col-sm-6">
                <h4>Vízvilág - elmerülés</h4>
                <p>A wellness szolgáltatások legfőbb pillére a gyógyvizes medencével, jacuzzi-val, külső- és belső melegvizes medencékkel rendelkező vízivilág! Élvezze a víz símogatását a 6 különböző medencénk bármelyikében. Külső és belső medence, gyógyvizes medence, Relax és meditációs medence, jacuzzi, vállzuhany és egyéb élményfürdő elemek kényeztetik Önt.</p>
                <h6>Nyitva tartás:</h6>
                <h6>Külső medence (30-33 Celsius fok): 7.00 – 21.00<br>
                    Belső medence (31-33 Celsius fok): 7.00 – 22.00<br>
                    Gyógyvizes medence (36-39 Celsius fok): 7.00 – 20.00
                </h6>
            </div>
            <br>
            <div class="col-sm-6">
                <img src="img/img5.jpg">
            </div>
            <br>
            <div class="col-sm-6">
                <h4>Szaunavilág - ellazulás</h4>
                <p>A szaunavilág finn- és kerti szaunával, laconiummal, gőzfürdővel, aroma-fényszaunával, infrakabinnal és Kneipp-medencével várja Önt. Élvezze a felfrissülést változatos szauna szeánszainkon.</p>
                <h6>Nyitva tartás: 9:00 – 22:00 (minden nap)</h6>
                <br>
                <h5>Szaunafelöntéseink</h5>
                <h6>10:00 Hajnali harmat a gőzben (max. 10 fő)<br>
                    12:30 Titkok kertje<br>
                    15:00 Kávéházi hangulat<br>
                    17:00 Bíbor napnyugta
                </h6>
            </div>
            <div class="col-sm-6">
                <img src="img/img6.jpg">
            </div>
        </div>
    </div>
    <script src="js\jquery-3.3.1.slim.min.js"></script>
    <script src="js\popper.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
    <script src="js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#sidebar").mCustomScrollbar(
            {
                theme: "minimal"
            });
            $('#dismiss, .overlay').on('click', function()
            {
                $('#sidebar').removeClass('active');
                $('.overlay').fadeOut();
            });
            $('#sidebarCollapse').on('click', function()
            {
                $('#sidebar').addClass('active');
                $('.overlay').fadeIn();
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>