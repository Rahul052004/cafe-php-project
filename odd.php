<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';

    if (!isset($_SESSION['email'])) {
        echo "<script>alert('You must be logged in to place an order.'); window.location.href = 'login.php';</script>";
        exit();
    }

    $loggedInEmail = $_SESSION['email']; 
    $fullName = $_POST['fullName'];
    $address = $_POST['address'];
    $orderItems = json_decode($_POST['orderItems'], true); // Convert JSON string to PHP array
    $orderTotal = $_POST['orderTotal'];

    $orderItemsJson = json_encode($orderItems);

    $stmt = $conn->prepare("INSERT INTO `orders` (`fullname`, `email`, `address`, `items`, `total_price`, `order_date`) VALUES (?, ?, ?, ?, ?, NOW())");

    $stmt->bind_param("ssssd", $fullName, $loggedInEmail, $address, $orderItemsJson, $orderTotal);

    if ($stmt->execute()) {
        echo "<script>alert('Order Placed Successfully!'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="odd.css">
</head>
<body>
    <div class="container">
        <h1>Your Order</h1>
        <form id="orderForm" action="/food/odd.php" method="POST">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <h2>Order Items</h2>
            <ul id="orderItems"></ul>

            <p>Total: Rs. <span id="orderTotal">0</span></p>

            <input type="hidden" name="orderItems" id="hiddenOrderItems">
            <input type="hidden" name="orderTotal" id="hiddenOrderTotal">

            <input type="submit" value="Confirm Order">
        </form>

        <div class="buttons">
            <a class="back-to-menu" href="menu.php">Back to Menu</a>
            <a class="back-to-cart" href="cart.php">Back to Cart</a>
        </div>
    </div>
    <script src="order.js"></script>

</body>
</html>

