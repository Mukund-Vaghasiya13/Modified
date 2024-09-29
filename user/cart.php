<?php
include("../DatabaseConnectivity/DbConfig.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if it hasn't been started
}

if (!isset($_SESSION["User"]['loggedin']) || $_SESSION["User"]['loggedin'] !== true) {
    header("Location: ./login.php");
    exit();
}

$ordersql = "CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_price DECIMAL(10, 2),
    status VARCHAR(255) DEFAULT 'pending',
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);";
// Removed the trailing comma before the closing parenthesis

$result = $con->query($ordersql);
if (!$result) {
    die("<h6>Error creating 'orders' table: " . $con->error . "</h6>");
}

// SQL for 'order_items' table
$sql = "CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_name VARCHAR(255),
    price DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE
);";

$result = $con->query($sql);
if (!$result) {
    die("<h6>Error creating 'order_items' table: " . $con->error . "</h6>");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   
    $cartData = json_decode($_POST['cart_data'], true);
    $totalPrice = $_POST['total_price'];
    $user_id = $_SESSION["User"]['user_id']; // Assuming you store the user name in the session

    // Insert order into the 'orders' table
    $stmt = $con->prepare("INSERT INTO orders (user_id, total_price) VALUES (?, ?)");
    $stmt->bind_param("sd", $user_id, $totalPrice); // 's' for string and 'd' for double
    $stmt->execute();
    $orderId = $stmt->insert_id; // Get the order ID for the order items
    // Insert each cart item into the 'order_items' table
    foreach ($cartData as $item) {
        $stmt = $con->prepare("INSERT INTO order_items (order_id, product_name, price) VALUES (?, ?, ?)");
        $stmt->bind_param("isd", $orderId, $item['name'], $item['price']);
        $stmt->execute();
    }

    // Clear the cart in session storage (optional)
    echo '
    <script type="text/javascript">
        sessionStorage.removeItem("cart");
        alert("Order Placed");
    </script>
    ';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../styleSheetGroup/cart.css">
</head>

<body>
    <nav>
        <div class="logoDiv">
            <img src="../uploads/assets/Atlas.svg" class="logo" alt="logo">
            <h1 class="catlog_title">Cart</h1>
        </div>
    </nav>
    <div id="cart"></div> <!-- This is where cart items will be displayed -->
    <script src="../Scripts/cart.js"></script> <!-- Include your JavaScript file -->
</body>

</html>