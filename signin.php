<?php
require_once('connect.php');
$error = false;
$success = false;

session_start();

//$registered = $_SESSION["registered"];
//$username = $_SESSION["username"];

if(isset($_SESSION['username'])){
    header('location: index.php');
}

$error = false;
$success = false;

if(@$_POST['login']) {
    if (!$_POST['username']) {
    }
    if (!$_POST['password']) {
    }

    $query = $dbh->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $result = $query->execute(
        array(
            'username' => $_POST['username'],
            'password' => $_POST['password']
        )
    );
    $userinfo = $query->fetch();
    if ($userinfo) {

        $success = "User, " . $_POST['username'] . " was successfully logged in.";

        $_SESSION["firstname"] = $userinfo['firstname'];
        $_SESSION["username"] = $userinfo['username'];

        header("Location: index.php");
    } else {
        $success = "There was an error logging into the account.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
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
        html, body {
            height: 100%
        }
        .signupfoot {
            position: inherit;
            bottom: 0px;
        }
        #footer {
            position: fixed;
            bottom: 0%;
        }
        .mdl-layout__content {
            z-index: -1;
        }

    </style>
    <title>OzWatch</title>
</head>
<body>
<style>
    .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type {
        padding-right: 0;
    }

    .mdl-layout-title {
        font-size: 250%;
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
            <a class="mdl-navigation__link" href="search.php?product=Invictus">Invictus</a>
            <a class="mdl-navigation__link" href="search.php?product=Casio">Casio</a>
            <a class="mdl-navigation__link" href="search.php?product=Suunto">Suunto</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here --></div>
    </main>
</div>

<div id="container">

    <div id="form">
        <center>
            <form method="POST">
                <h2>Sign - In</h2>
                <label>Username :</label>
                <input type="text" name="username" id="name" required> <br><br>
                <label> Password :</label>
                <input type="text" name="password" id="passsword" required> <br><br>
                <button type="submit" name="login" value="1">Sign In</button>
                <?php
                if(isset($_SESSION['registered'])){
                    echo '<p id="registered">Successfully Registered</p>';
                    unset($_SESSION['registered']);
                }
                ?>
                <?php
                if($error){
                    echo $error;
                    echo '<br>';
                }
                if($success){
                    echo $success;
                    echo '<br>';
                }
                ?>
            </form>
            <div id="buttonsu">
                <a href="signup.php">
                    <button>Sign Up</button>
                </a>
            </div>
        </center>
    </div>

    <div id="footer">
        <table id="footerTable">
            <tr>

                <th class="footer1"><a href="about.html">About OzWatch</a></th>
                <th class="footer1"><a href="about.html">Email Us</a></th>
            </tr>
            <tr>
                <th class="footer1"><a href="aboutUs.html">About Us</a></th>
                <th class="footer1"><a href="signin.html">Sign In</a></th>

            </tr>
        </table>
    </div>

</div>

</body>

</html>
