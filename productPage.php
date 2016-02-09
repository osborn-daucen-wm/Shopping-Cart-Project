<?php
require_once('connect.php');
$error = false;
$success = false;


$stmt = $dbh->prepare("select * from products where id = " . $_GET['id']);
$stmt->execute();
$product = $stmt->fetch();

if (@$_POST['addToCart']) {
    $errorMessage = false;

    $sql = $dbh->prepare("INSERT INTO cart (id, name, price) VALUES (:id, :name, :price)");

    $result = $sql->execute(
        array(
            'id' => NULL,
            'name' => $_POST['name'],
            'price' => $_POST['price'],
        )
    );

    if (!$result) {

    }
    {
        echo("<p>There was an error with your form:</p>\n");
        echo("<ul>" . $errorMessage . "</ul>\n");
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
            position: fixed;
            margin-top: 3%;
        }

        img {
            width: 100%;
            height: 100%;
            border: #DD3737 5px solid;
            padding: 0;
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
            <a class="mdl-navigation__link" href="search.php?product=Invictus">Invictus</a>
            <a class="mdl-navigation__link" href="search.php?product=Casio">Casio</a>
            <a class="mdl-navigation__link" href="search.php?product=Suunto">Suunto</a>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content">

            <div id="productPic">
                <img src="Pictures/ProductPics/productPic-<?php echo $product['id'] ?>.jpg" alt="Whoops! No product picture found!">
            </div>
            <div id="productInfo">
                <div id="productName">
                    <h4><?php echo $product['name'] ?></h4>
                </div>
                <div id="productDesc">
                    <h5>Description:</h5>

                    <p><?php echo $product['description'] ?></p>
                </div>
                <div id="productBrand">
                    <h5>Brand:</h5>

                    <p><?php echo $product['type'] ?></p>
                </div>
                <div id="productDiameter">
                    <h5>Product Diameter:</h5>

                    <p><?php echo $product['diameter'] ?></p>
                </div>

                <div id="productThickness">
                    <h5>Product Thickness:</h5>

                    <p><?php echo $product['thickness'] ?></p>
                </div>
                <div id="productWeight">
                    <h5>Weight:</h5>

                    <p><?php echo $product['weight'] ?> Ounces</p>
                </div>
                <div id="productBatteries">
                    <h5>Battery:</h5>

                    <p><?php echo $product['power'] ?></p>
                </div>
                <div id="productMaterial">
                    <h5>Material:</h5>

                    <p><?php echo $product['material'] ?></p>
                </div>
                <div id="productBand">
                    <h5>Band:</h5>

                    <p><?php echo $product['band'] ?></p>
                </div>
                <div id="productModelNumber">
                    <h5>Item Model Number:</h5>

                    <p><?php echo $product['modelNumber'] ?></p>
                </div>
            </div>
            <div id="productOrder">
                <div id="productPrice">
                    <h5>$<?php echo $product['price'] ?></h5>
                </div>
                <br>
                <form method="post">
                    <button type="submit" name="addToCart" value="1">Add to Cart</button>
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