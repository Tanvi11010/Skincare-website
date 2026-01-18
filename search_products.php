<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "db_skincare");

if ($conn->connect_error) {
    echo json_encode([]);
    exit();
}

$search = $_GET['search'] ?? '';

if (strlen($search) >= 1) {  // Allow search from 1 character
    $search = strtolower($search);
    $stmt = $conn->prepare("SELECT id, product_name, price, image_path, description FROM products WHERE LOWER(product_name) LIKE CONCAT('%', ?, '%')");
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];

    while ($row = $result->fetch_assoc()) {
        $products[] = [
            'id' => $row['id'],
            'name' => $row['product_name'],
            'price' => $row['price'],
            'image' => $row['image_path'],
            'description' => $row['description']
        ];
    }

    echo json_encode($products);
} else {
    echo json_encode([]);
}

$conn->close();
