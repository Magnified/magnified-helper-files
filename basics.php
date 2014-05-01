<?php
// pdo 
fetchAll(PDO::FETCH_ASSOC); // get all records
fetch(PDO::FETCH_ASSOC); // get single record

// basic select - no prepared statements
try {
    $results = $db->query("SELECT * FROM products ORDER BY sku ASC");
} catch (Exception $e) {
    echo "Data could not be retrieved from the database.";
    exit;
}

$products = $results->fetchAll(PDO::FETCH_ASSOC); 
$totalproducts = count($products);


// basic select - prepared statements
try {
    $results = $db->prepare("SELECT * FROM products WHERE sku = ?");
    $results->bindParam(1,$sku);
    $results->execute();
} catch (Exception $e) {
    echo "Data could not be retrieved from the database.";
    exit;
}

$product = $results->fetch(PDO::FETCH_ASSOC); 
$totalproducts = count($products);  