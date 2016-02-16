<?php
require_once('connect.php');
$error = false;
$success = false;

if (@$_POST['formSubmit']) {
    $errorMessage = false;

    if (empty($_POST['firstname'])) {
        $errorMessage = "<li>Enter your first name!</li>";
    }
    if (empty($_POST['username'])) {
        $errorMessage = "<li>Enter a username!</li>";
    }
    if (empty($_POST['email'])) {
        $errorMessage = "<li>Enter your email!</li>";
    }

    if (empty($_POST['password'])) {
        $errorMessage = "<li>Enter your password!</li>";
    }


    $stmt = $dbh->prepare("INSERT INTO users (id, firstname, lastname, username, email, password) VALUES (:id, :firstname, :lastname, :username, :email, :password)");

    $result = $stmt->execute(
        array(
            'id' => NULL,
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        )
    );

    if (!$result) {

    }
    {
        //echo("<p>There was an error with your form:</p>\n");
        //echo("<ul>" . $errorMessage . "</ul>\n");
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

    <div id="formSubmit">
        <center>
            <form method="post">
                <h2>Register for OzWatch</h2>
                <label>First Name :</label>
                <input type="text" name="firstname" id="name" required> <br><br>
                <label>Last Name: </label>
                <input type="text" name="lastname" id="lname" required> <br><br>
                <label>Email :</label>
                <input type="text" name="email" id="email" required> <br><br>
                <label> Username : </label>
                <input type="text" name="username" id="username" required> <br><br>
                <label>Password :</label>
                <input type="password" name="password" id="password" required><br><br>
                <br>

                <button type="submit" name="formSubmit" value="1">Add New User</button>

            </form>
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
