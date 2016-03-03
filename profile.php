<?php
require_once('connect.php');
$error = false;
$success = false;

session_start();

$stmt = $dbh->prepare("SELECT * FROM users u WHERE u.id = :user_id");
$stmt->execute(array(':user_id' => $_SESSION['user']['id']));
$info = $stmt->fetch();
?>

<!DOCTYPE html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png"
          href="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSnmTDYKCeLOIJbw2A3klLVfderw8VCr9gPdqAEv3NPZju2XrSovg">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="./material.min.css">
    <script src="./material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .mdl-layout__header-row {
            background-color: #2C4251;
        }
        #footer {
            margin-top: 3%;
        }
        .demo-layout-waterfall {
            position: fixed;
            top: 0px;
        }
    </style>
    <title>OzWatch</title>
</head>
<body>


<!-- Uses a header that contracts as the page scrolls down. -->
<style>
    .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type {
        padding-right: 0;
    }
    .mdl-layout-title {
        font-size: 250% ;
    }
</style>

<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title"><a href="index.php">OzWatch</a></span>

            <div class="mdl-layout-spacer"></div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon"
                       for="waterfall-exp">
                    <i class="material-icons">search</i>
                </label>

                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" name="sample"
                           id="waterfall-exp">
                </div>
            </div>
        </div>
        <!-- Bottom row, not visible on scroll -->
        <div class="mdl-layout__header-row">
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation -->
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="signin.php">Sign In</a>
                <a class="mdl-navigation__link" href="signup.php">Sign Up</a>
                <a class="mdl-navigation__link" href="profile.php">My Profile</a>
                <a class="mdl-navigation__link" href="cart.php">Cart</a>
                <a class="mdl-navigation__link" href="about.html">About</a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="search.php?product=Rolex">Rolex</a>
            <a class="mdl-navigation__link" href="search.php?product=Fossil">Fossil</a>
            <a class="mdl-navigation__link" href="search.php?product=Skagen">Skagen</a>
            <a class="mdl-navigation__link" href="search.php?product=Bulova">Bulova</a>
            <a class="mdl-navigation__link" href="search.php?product=Omega">Omega</a>
            <a class="mdl-navigation__link" href="search.php?product=Breitling">Breitling</a>
            <a class="mdl-navigation__link" href="search.php?product=Movado">Movado</a>
            <a class="mdl-navigation__link" href="search.php?product=Citizen">Citizen</a>
            <a class="mdl-navigation__link" href="search.php?product=Seiko">Seiko</a>
            <a class="mdl-navigation__link" href="search.php?product=Invicta">Invicta</a>
            <a class="mdl-navigation__link" href="search.php?product=Casio">Casio</a>
            <a class="mdl-navigation__link" href="search.php?product=Suunto">Suunto</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here --></div>
    </main>
</div>
<div id="container">
    <div id="userTable">
        <table>
            <tr>
                <td>First Name: <?php echo $info['firstname'] ?></td>
            </tr>
            <tr>
                <td>Last Name: <?php echo $info['lastname'] ?></td>
            </tr>
            <tr>
                <td>Username: <?php echo $info['username'] ?></td>
            </tr>
            <tr>
                <td>Email: <?php echo $info['email'] ?></td>
            </tr>
            <tr>
                <td>Address Line 1: <?php echo $info['address one'] ?></td>
            </tr>
            <tr>
                <td>Address Line 2: <?php echo $info['address two'] ?></td>
            </tr>
            <tr>
                <td>City: <?php echo $info['city'] ?></td>
            </tr>
            <tr>
                <td>State: <?php echo $info['state'] ?></td>
            </tr>
            <tr>
                <td>ZIP/Postal Code: <?php echo $info['ZIP'] ?></td>
            </tr>
            <tr>
                <td>Country: <?php echo $info['country'] ?></td>
            </tr>
        </table>
    </div>

    <div id="footer">
        <table id="footerTable">
            <tr>
                <th class="footer1">Copyright OzWatch 2016</th>
                <th class="footer1"><a href="about.html">About OzWatch</a></th>
                <th class="footer1"><a href="index.php">Home</a></th>
                <th class="footer1"><a href="FAQ.html">FAQ</a></th>
                <th class="footer1"><a href="signin.php">Sign In</a></th>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
