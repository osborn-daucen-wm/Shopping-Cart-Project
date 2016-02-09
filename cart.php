<h1>View cart</h1>
<a href="index.php">Go back to products page</a>
<form method="post" action="cart.php">

    <table>

        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Items Price</th>
        </tr>

        <?php

        $sql="SELECT * FROM products WHERE id IN (";

        foreach($_SESSION['cart'] as $id => $value) {
            $sql.=$id.",";
        }

        $sql=substr($sql, 0, -1).") ORDER BY name ASC";
        $query=mysql_query($sql);
        $totalprice=0;
        while($row=mysql_fetch_array($query)){
            $subtotal=$_SESSION['cart'][$row['id']]['quantity']*$row['price'];
            $totalprice+=$subtotal;
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><input type="text" name="quantity[<?php echo $row['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" /></td>
                <td><?php echo $row['price'] ?>$</td>
                <td><?php echo $_SESSION['cart'][$row['id']]['quantity']*$row['price'] ?>$</td>
            </tr>
            <?php

        }
        ?>
        <tr>
            <td colspan="4">Total Price: <?php echo $totalprice ?></td>
        </tr>

    </table>
    <br />
    <button type="submit" name="submit">Update Cart</button>
</form>
<br />
<p>To remove an item, set it's quantity to 0. </p>