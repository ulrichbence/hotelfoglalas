<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wellness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css\bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css\main.css" />
    <link rel="icon" href="img/img1.jpg"/>
</head>

<body class="bg-light">
    <div class="wrapper bg-light">
        <nav id="sidebar">
            <div id="dismiss">
                <i class="">X</i>
            </div>
            <div class="sidebar-header">
                <h3>Roxfort</h3>
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
                                            <input class="btn btn-success" name="submit" value="Log in" class="btn btn-light navbar-btn">
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
            <div class="row">
                <div class="col-6">
                    <h4>Az Abszol út</h4>
                    <br>
                        <p class="text-dark">
                            Nyaralása során ha szeretne valamit emlékbe venni vagy esetleg szeretné családtagjait meglepni szuvenírrel akkor feltétlenül látogasson el az Abszol útra.
                            Az Abszol út nem más mint egy hosszú utca melynek mindkét oldalán más-más boltok sorakoznak.<br>
                            Mint például:
                            <li>Florean Fortescue Fagylaltszalon </li>
                            <li>Madam Malkin Talárszabászata </li>
                            <li>Shanda & Shelymesh divatüzlet</li>
                            <li>Mágikus Menazséria állatbolt</li>
                            <li>Uklopsz Bagolyszalon</li>
                            <li>Hunczut & Zsupsz</li>
                            <br>
                            Javasoljuk, hogy mielőtt elmenne vásárolni menjen el egy valutaváltóba felváltani pénzét, az esetleges félreértések elkerülése végett!
                        </p>
                </div>
                <div class="col-6">
                    <img src="img/img7.jpg">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <h4>Zonkó Csodabazárja</h4>
                    <br>
                    <p class="text-dark">
                    A tréfás kütyüket árusító üzlet alighanem a legnépszerűbb boltok között van.
                    Zonko ugyanis trükkök és játékok egész garmadáját sorakoztatja fel, csupa olyasmit, melyek alkalmasak rá, hogy a gyerekek megannyi csínyt kövessenek el.
                    <br>
                    Az üzlet kívülről nézve pirosas-barna, ez a szín odabent is dominánsnak mondható, némi arany színnel feldobva. 
                    </p>
                    <p class="text-dark">
                    A régies, de jól karbantartott fa polcok és állványzatok tömve vannak portékával, ezek ára ugyan elég változó, de aki keres valamit, az alighanem meg is találja azt.
                    </p>
                </div>
                <br>
                <div class="col-6">
                    <img src="img/img8.jpg">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <h4>A Három Seprű</h4>
                    <br>
                    <p class="text-dark">
                        Ha esetleg megszomjazna vagy megéhezne tessék csak betérni a három sperűbe. Ahol a világ legfinomabb vajsörét és tökös derelyéjét fogyaszthatja. Miközben az ismerőseivel egy kellemes póker partit játszanak.<br>
                        Ételeink és italaink:
                            <li>Vajsör</li>
                            <li>Mézbor</li>
                            <li>Sütőtöklé</li>
                            <li>Meggyszörp</li>
                            <li>Tökös derelye</li>
                            <li>Kondéros Keksz</li>
                    </p>
                    <font color="red"> 
                        <b>Felhívjuk tisztelt vásárlóink figyelmét hogy 18 éven aluliakat szeszes itallal nem szolgálunk ki!</b>
                    </font>
                </div>
                <br>
                <div class="col-6">
                    <img src="img/img9.jpg">
                </div>
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