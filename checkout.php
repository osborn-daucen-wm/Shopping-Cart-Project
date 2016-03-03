<?php
require_once('connect.php');
$error = false;
$success = false;

session_start();

if (@$_POST['locationForm']) {
    $errorMessage = false;

    $sql = $dbh->prepare("INSERT INTO users (address one, address two, city, state, ZIP, country, cardNumber, CVC, expirationMonth, expirationYear) VALUES (:Add1, :Add2, :City, :State, :ZIP, :Country, :cardNumber, :CVC, :expMonth, :expYear)");

    $result = $sql->execute(
        array(
            'Add1' => $_POST['Add1'],
            'Add2' => $_POST['Add2'],
            'City' => $_POST['City'],
            'State' => $_POST['State'],
            'ZIP' => $_POST['ZIP'],
            'Country' => $_POST['Country'],
            'cardNumber' => $_POST['cardNumber'],
            'CVC' => $_POST['CVC'],
            'expMonth' => $_POST['expMonth'],
            'expYear' => $_POST['expYear']
        )
    );

    if (!$result) {
        echo("<p>There was an error checking out!</p>");
        echo("<ul>" . $errorMessage . "</ul>");
    }

}
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
    <div id="locationForm">
        <center>
            <form method="post">
                <h2>Shipping Information</h2>
                <label>Address Line 1: </label>
                <input type="text" name="Add1" id="Addy1" required> <br><br>
                <label>Address Line 2: </label>
                <input type="text" name="Add2" id="Addy2"> <br><br>
                <label>City: </label>
                <input type="text" name="City" id="city" required> <br><br>
                <label>State/Province/Region: </label>
                <input type="text" name="State" id="state" required> <br><br>
                <label>ZIP/Postal Code: </label>
                <input type="number" name="ZIP" id="zip" required><br><br>
                <label>Country: </label>
                <input type="text" name="Country" id="country" required><br><br>
                <label>Credit Card Number: </label>
                <input type="text" name="cardNumber" size="20" data-stripe="number" required/>
                <label>CVC: </label>
                <input type="text" name="CVC" size="4" data-stripe="cvc" required/>
                <label>Expiration (MM/YYYY): </label>
                <input type="text" name="expMonth" size="2" data-stripe="exp-month" required/>
                <label> / </label>
                <input type="text" name="expYear" size="4" data-stripe="exp-year" required/>
                <br>
                <br>
                <button type="submit" name="formSubmit" value="1"><a href="index.php" style="color: #202020">Finish Order</a></button>

            </form>
        </center>
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
