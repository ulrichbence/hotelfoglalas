<?php
    session_start();
    require_once "inc/db.php";
    $db = db::get();
    $selectRoomsQuery = "SELECT id FROM rooms WHERE category_id = 3";
    $allRooms = $db->getArray($selectRoomsQuery);
    
    if (isset($_GET["success"])) {
        $success = $db->escape($_GET["success"]);
    }

    if (isset($_GET["error"])) {
        $error = $db->escape($_GET["error"]);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css\bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css\main.css" />
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src="js/sweetalert2.all.min.js"></script>
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
                    <h4 class="display-4">Hufflepuff room reserve</h4>
                </div>
                <div class="container col-5">
                    <form action="inc\reserve.php" method="post">
                        <div class="card">
                            <div class="card-body mx-3">
                                <div class="md-form mb-2">
                                    <label for="person">Person:</label>
                                    <input type="number" class="form-control" name="numberofpepole" id="numberofpepole" placeholder="Person" required="required">
                                </div>
                                <div class="md-form mb-2">
                                    <label for="person">Reserver's name:</label>
                                    <input type="text" class="form-control" name="forwho" id="forwho" placeholder="Enter your name here" required="required">
                                </div>
                                <div class="card-body mx-3">
                                    <select name="roomNumber" id="roomNumber" class="form-control">
                                        <?php foreach($allRooms as $room): ?>
                                            <option value="<?php echo $room['id']; ?>">Room number: <?php echo $room["id"]; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="md-form mb-2">
                                    <label for="dateFrom">From:</label>
                                    <input type="datetime-local" class="form-control" name="reserve_date" id="reserve_date" required>
                                </div>
                                <div class="md-form mb-2">
                                    <label for="dateTo">To:</label>
                                    <input type="datetime-local" class="form-control" name="reserve_date_end" id="reserve_date_end" required>
                                </div>
                                <br>
                                <div class="form-row">
                                    <textarea class="form-control" name="message" id="message" rows="3" placeholder="We are listening"></textarea>
                                </div>
                                <br>
                                <div class="form-row">
                                    <button class="btn btn-success" name="submit">Reserve</button>
                                </div>
                            </div>
                        </div>
                    </form>
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