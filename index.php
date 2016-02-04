<!-- OPEN IN FIREFOX IF THE VIDEO DOES NOT LOAD RIGHT AWAY --- DO NOT OPEN IN SAFARI @ ALL --- IF YOU OPEN IN CHROME IT MIGHT TAKE SOME TIME FOR THE VIDEO TO LOAD -->
<?php
require_once('connect.php');
$error = false;
$success = false;

$sql = "select * from animals";

foreach ($dbh->query($sql) as $row) {
    //echo $row['name'];
}
//F1F2EB
//DD3737
//5C6B73
//2C4251
//253237
?>

<!DOCTYPE html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png"
          href="https://s-media-cache-ak0.pinimg.com/236x/38/f9/92/38f992906da14ea45c7b2282384fdd33.jpg">
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
    </style>
    <title>OzWatch</title>
</head>
<body>


<!-- Uses a header that contracts as the page scrolls down. -->
<style>
    .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type {
        padding-right: 0;
    }
</style>

<div class="demo-layout-waterfall mdl-layout mdl-js-layout">
    <header class="mdl-layout__header mdl-layout__header--waterfall">
        <!-- Top row, always visible -->
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">OzWatch</span>

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
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
                <a class="mdl-navigation__link" href="">Link</a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content"><!-- Your content goes here --></div>
    </main>
</div>

<div id="container">
    <div id="homepic1">
        <img id="picture1" src="Pictures/sideWatch.jpg">
    </div>

    <div id="cityBG">
        <img id="picGroupBG" src="Pictures/blurBG.jpg">
    </div>

    <div id="picgroup1">
        <img id="picture2" src="Pictures/sandRolex.jpg">
        <img id="picture3" src="Pictures/fossilPort.jpg">
        <img id="picture4" src="Pictures/perretCity.jpg">
    </div>

    <div id="textBox3">
        <h4>Qualities timepieces from all types of brands and styles.</h4>
    </div>

    <div id="footerpic">
        <img id="picture5" src="Pictures/smartwatch.jpg">
    </div>

<div id="footerContainer">

    <div class="footer">
        <table id="footerz">
            <div id="ericfix">
                <table id="footer">
                    <tr id="footerTop">

                        <th class="footer1"><a href="about.html">About OzWatch</a></th>
                        <th class="footer1"><a href="about.html">Email Us</a></th>
                    </tr>
                    <tr id="footerBottom">
                        <th class="footer1"><a href="aboutUs.html">About Us</a></th>
                        <th class="footer1"><a href="signin.html">Sign In</a></th>

                    </tr>
                </table>
            </div>
    </div>
</div>
</body>
</html>