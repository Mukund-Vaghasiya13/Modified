<?php
include("../DatabaseConnectivity/DbConfig.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it hasn't been started
}
$sql = "CREATE TABLE IF NOT EXISTS category (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
)";

$result = $con->query($sql);
if (!$result) {
    die("<h6>Error to create table<h6>");
}

$tablename = "category";
$query = "SELECT * FROM $tablename";

$result = $con->query($query);


if(isset($_POST['logout'])){
  
    
    // Destroy the session
    unset($_SESSION['User']);
    header("Location: index.php");
    echo '
    <script type="text/javascript">
        // Clear cart data from sessionStorage
        sessionStorage.removeItem("cart");
    </script>
    ';
    exit();
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styleSheetGroup/homeStylesheet.css">
    <script type="text/javascript">
    // JavaScript function to clear cart from sessionStorage
    function clearCart() {
        // Clear cart data from sessionStorage
        sessionStorage.removeItem("cart");
        console.log("Cart cleared from sessionStorage");
        // You can also add any other actions here

        // The form will still be submitted since the return value is not false
    }
</script>
</head>
<body>
    <nav>
        <div class="main-nav">
            <div class="logoDiv">
                <img src="../uploads/assets/Atlas.svg" class="logo" alt="logo">
                <h1 class="catlog_title">Atlas</h1>
            </div>
            <div class="nav-logout">
            <?php
            if (isset($_SESSION["User"]['loggedin']) && $_SESSION["User"]['loggedin'] === true) {
                // If the user is logged in, show Logout and Cart
                echo '<form action="index.php" method="POST">
                        <button class="delete" type="submit" name="logout" onclick="clearCart();">Logout</button>
                      </form>';
            } else { ?>
                <a class="Font-Style" href="login.php">Login</a>
                <a class="Font-Style" href="signup.php">Signup</a>
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
                <a href="homePage.php?nameofcat=<?php echo $row['name']; ?>&id=<?php echo $row['id']; ?>">
                    <div class="product">
                        <img src="<?php echo $row['image']; ?>" alt="product">
                        <div class="productname"><?php echo $row['name']; ?></div>
                        <div class="price">
                            <a class="delete" href="homePage.php?nameofcat=<?php echo $row['name']; ?>&id=<?php echo $row['id']; ?>"><img class="trashbutton" src="../uploads/assets/eye-solid.svg" alt="trash"></a>
                        </div>
                    </div>
                </a>
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