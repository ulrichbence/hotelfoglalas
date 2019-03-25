<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
<!-- https://hu.wikipedia.org/wiki/Roxfort#A_roxforti_birtok_%C3%A9s_k%C3%B6rny%C3%A9ke
    https://hu.wikipedia.org/wiki/Helysz%C3%ADnek_a_Harry_Potter-univerzumban -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
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
                    <?php if (isset($_SESSION['ID'])){ ?>
                         <form action="inc\logout.inc.php" method="POST" class="form-inline my-2 my-lg-0">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <div class="form-inline">
                                                <label class=" my-2 my-sm-0" ><?php echo $_SESSION["userName"]; ?></label>
                                                <input type="submit" name="submit" value=" Log out " class="btn btn-light navbar-btn">
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                    <?php } else{ ?>
                        <form action="inc\login.inc.php" method="post" class="form-inline my-2 my-lg-0">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                            <button class="btn btn-success" name="submit" class="btn btn-light navbar-btn">Log In</button>
                                        </li>
                                    </ul>
                                </form>
                    <?php } ?>
                </div>
            </nav>
        <div class="container col-9 mt-10">
            <div class="jumbotron text-center">
                <h4 class="display-4">Üdvözöljük a Roxfortban <?php if(isset($_SESSION["userName"])){echo "".$_SESSION["userName"];} ?>!</h4>
            </div>
            <p class="text-dark">
                Roxfort Skócia egy félreeső, hegyekkel tagolt táján emelkedik a regénybeli Roxmorts település közelében. A hotel kiterjedt birtokán helyet kapnak ligetes területek, virágágyások, veteményesek, egy tó, egy nagy és sűrű erdő , egypár üvegház és más épületek, és egy kviddicspálya. Van egy bagolyház a baglyok számára. A kastélyt hegyek ölelik körül.
            </p>
            <div id="carouselExampleInterval" class="carousel slide bg-dark" data-ride="carousel" >
                <div class="carousel-inner">
                    <div class="carousel-item text-center active" data-interval="7000">
                        <img src="img/img2.jpg" style="height: 38rem; width: 70rem;" class="d-block mx-auto" alt="...">
                    </div>
                    <div class="carousel-item text-center" data-interval="7000">
                        <img src="img/img3.jpg" style="height: 38rem; width: 70rem; " class="d-block mx-auto" alt="...">
                    </div>
                    <div class="carousel-item text-center" data-interval="7000">
                        <img src="img/img4.jpg" style="height: 38rem; width: 70rem;" class="d-block mx-auto" alt="...">
                    </div>
                    <div class="carousel-item text-center" data-interval="7000">
                        <img src="img/img5.jpg" style="height: 38rem; width: 70rem;" class="d-block mx-auto" alt="...">
                    </div>
                    <div class="carousel-item text-center" data-interval="7000">
                        <img src="img/img6.jpg" style="height: 38rem; width: 70rem;" class="d-block mx-auto" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <br>
            <p class="text-dark">
                Roxmorts forgalmi csomópontként és – vendéglői révén – szállásként áll a hotel látogatóinak rendelkezésére. Itt található a legközelebbi vasútállomás. A falu híres Mézesfalás nevű édességboltjáról, Zonko Csodabazárjáról, a Három Seprű nevezetű kocsmájáról, s Madam Poodyfoot Turbékoló Párocskák nevű fogadójáról. Népszerű a roxforti látogatók körében, akik a kijelölt alkalmakkor kikapcsolódásként felkeresik a települést.
            </p>
            <br>
                <p class="text-dark">
                    A hotelhez a vendégek a Roxfort Expresszel jutnak el a roxmortsi vasútállomásra, a vonat a londoni King’s Cross pályaudvar 9 és 3/4. vágányáról indul.
                </p>
            <div class="jumbotron text-center">
                <h4 class="display-4">Kívánjuk érezze jól magát <?php if(isset($_SESSION["userName"])){echo ",".$_SESSION["userName"];} ?>!</h4>
            </div>
            <div class="container">
                <form method="post" class="form-group" action="addticket.php">
                    <div class="form-row">
                        <input type="text" name="title" class="form-control" placeholder="Subject">
                    </div>
                    <br>
                    <div class="form-row">
                         <textarea class="form-control" name="message" id="message" rows="5" placeholder="We are listening"></textarea>
                    </div>
                    <br>
                    <div class="form-row">
                        <button class="btn btn-primary" name="sendTicket">Send</button>
                    </div>
                </form>
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