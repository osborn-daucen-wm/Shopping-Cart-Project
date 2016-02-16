<?php
require_once('connect.php');
$error = false;
$success = false;

session_start();

$stmt = $dbh->prepare("SELECT * FROM cart c WHERE c.user_id = :carts");
$stmt->execute(array(':carts' => $_SESSION['user']['id']));
$results = $stmt->fetchAll();

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
            position: fixed;
            margin-top: 3%;
        }

        img {
            width: 100%;
            height: 100%;
            border: #DD3737 5px solid;
            padding: 0;
        }
        body {
            background: #5C6B73;
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
        <div class="page-content">

            <div id="cartItems">
                <table id="cartTable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (count($results) > 0) {
                        foreach ($results as $carts) {

                            $itemname = $carts['name'];
                            $itemquantity = $carts['quantity'];
                            $itemprice = $carts['price'];

                            echo '<tr>';
                            echo "<td>{$itemname}</td>";
                            echo "<td>{$itemquantity} x</td>";
                            echo "<td class='cartPrice'>{$itemprice}</td>";
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr>';
                        echo '<td>There is nothing in your cart!</td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
                <?php

                ?>
            </div>

            <div id="cartCheckout">
                <div id="cartPrices">
                    <h5>Total:</h5>
                </div>
                <br>
                <form method="post">
                    <button type="submit" name="checkout" value="<?php echo $product['id'] ?>">Checkout</button>
                </form>
            </div>


            <div id="container">

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
