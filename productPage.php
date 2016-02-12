<?php
require_once('connect.php');
$error = false;
$success = false;

session_start();

$stmt = $dbh->prepare("select * from products where id = " . $_GET['id']);
$stmt->execute();
$product = $stmt->fetch();

if (@$_POST['addToCart']) {
    $errorMessage = false;

    $sql = $dbh->prepare("INSERT INTO cart (user_id, `name`, product_id, price) VALUES (:user_id, :name, :product_id, :price :quantity) on duplicate key update quantity = :quantity");

    $result = $sql->execute(
        array(
            'user_id' => $_SESSION['user']['id'],
            'name' => $product['name'],
            'product_id' => $product['id'],
            'price' => $product['price'],
            'quantity' => $_POST['quantity']
        )
    );

    if (!$result) {

    }
    {
        //echo("<p>There was an error adding the item to the cart!</p>");
        //echo("<ul>" . $errorMessage . "</ul>");
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
            <a class="mdl-navigation__link" href="search.php?product=Invicta">Invicta</a>
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

                    Description:<p><?php echo $product['description'] ?></p>
                </div>
                <div id="productBrand">

                    Brand:<p><?php echo $product['type'] ?></p>
                </div>
                <div id="productDiameter">

                    Product Diameter:<p><?php echo $product['diameter'] ?> mm.</p>
                </div>

                <div id="productThickness">

                    Product Thickness:<p><?php echo $product['thickness'] ?> mm.</p>
                </div>
                <div id="productWeight">

                    Weight:<p><?php echo $product['weight'] ?> Ounces</p>
                </div>
                <div id="productBatteries">

                    Battery:<p><?php echo $product['power'] ?></p>
                </div>
                <div id="productMaterial">

                    Material:<p><?php echo $product['material'] ?></p>
                </div>
                <div id="productBand">

                    Band:<p><?php echo $product['band'] ?></p>
                </div>
                <div id="productModelNumber">

                    Item Model Number:<p><?php echo $product['modelNumber'] ?></p>
                </div>
            </div>
            <div id="productOrder">
                <div id="productPrice">
                    <h5>$<?php echo $product['price'] ?></h5>
                </div>
                <form method="post">
                    Quantity:<input type="number" name="quantity" id="quantity" value="1">
                    <br>
                    <button type="submit" name="addToCart" value="<?php echo $product['id'] ?>">Add to Cart</button>
                </form>
                <?php
                if (@$_POST['addToCart']) {
                    echo("<p>Watch was added to your cart!</p>");
                }
                ?>
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