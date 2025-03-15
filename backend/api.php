<?php
header("Content-Type: application/json");
include "db.php"; // Gọi file kết nối database

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $customer_name = $data['customer_name'];
    $product = $data['product'];
    $quantity = $data['quantity'];

    $stmt = $conn->prepare("INSERT INTO orders (customer_name, product, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $customer_name, $product, $quantity);
    $stmt->execute();

    echo json_encode(["message" => "Order placed successfully"]);
}

if ($method == 'GET') {
    $result = $conn->query("SELECT * FROM orders");
    $orders = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($orders);
}
?>
