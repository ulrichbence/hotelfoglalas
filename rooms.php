<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rooms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css\bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css\main.css" />
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src="js/sweetalert2.all.min.js"></script>
    <link rel="icon" href="img/img1.jpg"/>
    <script>
        function errormsg(errortext)
        {
          Swal.fire({
            type: 'error',
            title: 'Oops...',
            text: errortext + "!",
            footer: "If you need help, contact us <a href='../index.php' style='color:black;text-decoration:none;'> <i class='fas fa-arrow-right'></i></a>."
        })
      }
      function okmsg(oktext)
      {
          Swal.fire(
            'Ok!',
            oktext + '!',
            'success'
            )
      }
  </script>
</head>

<body class="bg-light">
    <?php 

    switch ($error) {
        case 'empty':
        echo "<script>oktext = 'All gaps must be filled.'; errormsg(oktext);</script>";
        break;

        case 'big':
        echo "<script>oktext = 'Our biggest table can hosts 20 people. If you need more space, contact us and ask for event booking.'; errormsg(oktext);</script>";
        break;

        case 'wrongDate':
        echo "<script>oktext = 'Invalid date entered.'; errormsg(oktext);</script>";
        break;

        case 'reserved':
        echo "<script>oktext = 'Sorry,but this table has already been reserved to this interval.'; errormsg(oktext);</script>";
        break;

        case 'closed':
        echo "<script>oktext = 'Sorry,but we are not opened on that interval.'; errormsg(oktext);</script>";
        break;

        case 'error':
        echo "<script>oktext = 'WoW! Something unexpected happened.'; errormsg(oktext);</script>";
        break;

        default:
                    # code...
        break;
    }
    if ($success == "thankyou") {
        echo "<script>oktext = 'Thank you for choosing us'; okmsg(oktext);</script>";
    }

    ?>
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
                    <h4 class="display-4">Rooms</h4>
                </div>
                <div class="container-fluid">
                 <div class="card-group">
                   <div class="card">
                    <div class="card-block">
                      <h4 class="card-title">Griffendél</h4>
                      <p class="card-text">A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak.
                          A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította
                      a betûkészletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta.</p>
                  </div>
              </div>
              <div class="card">
                <div class="card-block">
                    <img src="img/img10.jpg">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="text-center">
        <a href="gryffindor_room.php" class="btn btn-success">Griffendél</a>
    </div>
    <br>
    <div class="container-fluid">
     <div class="card-group">
       <div class="card">
        <div class="card-block">
          <h4 class="card-title">Mardekár</h4>
          <p class="card-text">A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak.
              A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította
          a betûkészletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta.</p>
      </div>
  </div>
  <div class="card">
    <div class="card-block">
        <img src="img/img10.jpg">
    </div>
</div>
</div>
</div>
<br>
<div class="text-center">
    <a href="slytherin_room.php" class="btn btn-success">Mardekár</a>
</div>
<br>
<div class="container-fluid">
 <div class="card-group">
   <div class="card">
    <div class="card-block">
      <h4 class="card-title">Hugrabug</h4>
      <p class="card-text">A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak.
          A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította
      a betûkészletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta.</p>
  </div>
</div>
<div class="card">
    <div class="card-block">
        <img src="img/img10.jpg">
    </div>
</div>
</div>
</div>
<br>
<div class="text-center">
    <a href="hufflepuff_room.php" class="btn btn-success">Hugrabug</a>
</div>
<br>
<div class="container-fluid">
 <div class="card-group">
   <div class="card">
    <div class="card-block">
      <h4 class="card-title">Hollóhát</h4>
      <p class="card-text">A Lorem Ipsum egy egyszerû szövegrészlete, szövegutánzata a betûszedõ és nyomdaiparnak.
          A Lorem Ipsum az 1500-as évek óta standard szövegrészletként szolgált az iparban; mikor egy ismeretlen nyomdász összeállította
      a betûkészletét és egy példa-könyvet vagy szöveget nyomott papírra, ezt használta.</p>
  </div>
</div>
<div class="card">
    <div class="card-block">
        <img src="img/img10.jpg">
    </div>
</div>
</div>
</div>
<br>
<div class="text-center">
    <a href="ravenclaw_room.php" class="btn btn-success">Hollóhát</a>
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