<?php
include 'db_connect.php';

// Function to add a product
function addProduct($name, $quantity, $price) {
    global $conn;

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO products (name, quantity, price) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sid", $name, $quantity, $price);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();
        return false;
    }
}

// Function to edit a product
function editProduct($id, $name, $quantity, $price) {
    global $conn;

    // Prepare the SQL statement
    $stmt = $conn->prepare("UPDATE products SET name=?, quantity=?, price=? WHERE id=?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sidi", $name, $quantity, $price, $id);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();
        return false;
    }
}

// Function to delete a product
function deleteProduct($id) {
    global $conn;

    // Prepare the SQL statement
    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        echo "Error: " . $stmt->error;
        $stmt->close();
        return false;
    }
}

// Function to get all products
function getAllProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    return $conn->query($sql);
}

// Function to get total number of products
function getTotalProducts() {
    global $conn;
    $result = $conn->query("SELECT COUNT(*) as count FROM products");
    $row = $result->fetch_assoc();
    return $row['count'];
}

// Function to get total quantity of all products
function getTotalQuantity() {
    global $conn;
    $result = $conn->query("SELECT SUM(quantity) as total FROM products");
    $row = $result->fetch_assoc();
    return $row['total'];
}

// Function to get total value of all products
function getTotalValue() {
    global $conn;
    $result = $conn->query("SELECT SUM(price * quantity) as total FROM products");
    $row = $result->fetch_assoc();
    return $row['total'];
}

// Handle Add/Edit/Delete actions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs
    function validateInput($data) {
        return htmlspecialchars(trim($data));
    }

    if (isset($_POST['edit'])) {
        $id = (int)$_POST['id'];
        $name = validateInput($_POST['name']);
        $quantity = (int)$_POST['quantity'];
        $price = (float)$_POST['price'];
        if (editProduct($id, $name, $quantity, $price)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating product: " . $conn->error;
        }
    } elseif (isset($_POST['delete'])) {
        $id = (int)$_POST['id'];
        if (deleteProduct($id)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error deleting product: " . $conn->error;
        }   
    } elseif (isset($_POST['add'])) {
        $name = validateInput($_POST['name']);
        $quantity = (int)$_POST['quantity'];
        $price = (float)$_POST['price'];
        if (addProduct($name, $quantity, $price)) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error adding product: " . $conn->error;
        }
    }
}

// Fetch products data for index
$result = getAllProducts();

// Fetch data for the dashboard
$totalProducts = getTotalProducts();
$totalQuantity = getTotalQuantity();
$totalValue = getTotalValue();
?>
