<?php
require_once('connect.php');
$error = false;
$success = false;

$stmt = $dbh->prepare("SELECT * FROM products p WHERE p.type = :product");
$stmt->execute(array(':product' => $_GET['product']));
$results = $stmt->fetchAll();

?>
<!DOCTYPE html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="icon" type="image/png"
          href="http://cdn.mysitemyway.com/etc-mysitemyway/icons/legacy-previews/icons/black-paint-splatter-icons-alphanumeric/069096-black-paint-splatter-icon-alphanumeric-letter-rr.png">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <script src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="./material.min.css">
    <script src="./material.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>RentAPet</title>
</head>

<body>
<style>
    .mdl-layout__header-row {
        background-color: #2C4251;
    }
    .demo-layout-waterfall .mdl-layout__header-row .mdl-navigation__link:last-of-type {
        padding-right: 0;
    }
    .mdl-layout-title {
        font-size: 250% ;
    }
    #footer {
        position: fixed;
        bottom: 0;
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
        <div class="page-content">
            <div id="container">

                <div id="searchinfo">
                    <h1><?php echo $_GET['product']; ?></h1>

                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($results) > 0) {
                            foreach ($results as $product) {

                                $productname = $product['name'];

                                echo '<tr>';
                                echo "<td><a href='productPage.php?id=" . $product['id'] . "' style='color: #253237'>{$productname}</a></td>";
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr>';
                            echo '<td>0 Results Found.</td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php

                    ?>
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
        </div>
    </main>
</div>
</body>
</html>
