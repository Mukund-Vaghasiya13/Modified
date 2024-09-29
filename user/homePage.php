<?php

include("../DatabaseConnectivity/DbConfig.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it hasn't been started
}
$tableQuery  = "CREATE TABLE IF NOT EXISTS products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    productimage VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category_id INT(11),
    
    -- Define the foreign key constraint and give it a name 'fk_category'
    CONSTRAINT fk_category FOREIGN KEY (category_id) 
    REFERENCES category(id) ON DELETE CASCADE
)"; 

$result = $con->query($tableQuery);
if (!$result) {
    die("<h6>Error to create table<h6>");
}

$tablename = "products";
$catagoryname = $_GET['nameofcat'];
$catid = $_GET['id'];


$query = "SELECT * FROM $tablename WHERE category_id = '$catid'";

$result = $con->query($query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styleSheetGroup/homeStylesheet.css?v=1">
</head>

<body>
    <nav>
        <div class="main-nav">
            <div class="logoDiv">
                <img src="../uploads/assets/Atlas.svg" class="logo" alt="logo">
                <h1 class="catlog_title"><?php echo $catagoryname;?></h1>
            </div>
            <div class="nav-logout">
            <?php
            if (isset($_SESSION["User"]['loggedin']) && $_SESSION["User"]['loggedin'] === true) {
                // If the user is logged in, show Logout and Cart
                echo '<form action="index.php" method="POST">
                        <button class="delete" type="submit" name="logout" onclick="clearCart();"><img class="cart-logo" src="../uploads/assets/right-from-bracket-solid.svg" alt="logout"></button>
                      </form>';
            } else { ?>
                <a class="Font-Style" href="login.php">Login</a>
            <?php }?>
            <a class="Font-Style" href="cart.php">Cart</a>
            </div>
        </div>
    </nav>
    <div class="product-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="product">
                    <img src="<?php echo $row['productimage']; ?>" alt="product">
                    <div class="productname"><?php echo $row['name']; ?></div>
                    <div class="price">
                        <div class="priceSyle"><?php echo "$" . $row['price']; ?></div>
                        <button  class="delete add-to-cart" data-name="<?php echo htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8'); ?>" data-price="<?php echo $row['price']; ?>"><img class="trashbutton" src="../uploads/assets/cart-plus-solid.svg" alt="addtocart"></button>
                    </div>
                </div>
            <?php
            } // End while
        } else {
            ?>
            <h1>No Product Found!</h1>
        <?php
        } // End if
        ?>
    </div>
     <?php include "../SmallScript/footer.php"; ?>
    <script src="../Scripts/app.js"></script>
</body>
</html>