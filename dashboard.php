<?php
include 'Function/Function.php';

// Fetch data for the dashboard
$totalProducts = getTotalProducts();
$totalQuantity = getTotalQuantity();
$totalValue = getTotalValue();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="Function/dashboard.js" defer></script>
    <script src="Function/index.js" defer></script>
    <script>
        const totalProducts = <?php echo json_encode($totalProducts); ?>;
        const totalQuantity = <?php echo json_encode($totalQuantity); ?>;
        const totalValue = <?php echo json_encode($totalValue); ?>;
    </script>
</head>
<body>
    <!-- Side Navigation -->
    <div class="sidenav">
        <a href="index.php" class="nav-link">
            <img src="src/home.png" alt="Home" class="nav-icon"/> Home
        </a>
        <a href="dashboard.php" class="nav-link">
            <img src="src/dashboard.png" alt="Dashboard" class="nav-icon"/> Dashboard
        </a>
        <a href="#" onclick="openAdditemPopup()" class="nav-link">
            <img src="src/Add.png" alt="Add Product" class="nav-icon"/> Add Product
        </a>
    </div>
    <h1 class="header-title">
        <img src="src/werehouse.png" alt="Warehouse" class="header-icon"/>
        Warehouse Dashboard
    </h1>
    <!-- Main Content -->
    <div class="main-content">
        

        <div class="dashboard-grid">
            <!-- Total Products Chart -->
            <div class="dashboard-item">
                <h3>Total Products</h3>
                <canvas id="totalProductsChart"></canvas>
            </div>
            <!-- Total Quantity Chart -->
            <div class="dashboard-item">
                <h3>Total Quantity</h3>
                <canvas id="totalQuantityChart"></canvas>
            </div>
            <!-- Total Value Chart -->
            <div class="dashboard-item">
                <h3>Total Value</h3>
                <canvas id="totalValueChart"></canvas>
            </div>
        </div>
        <!-- Add Product Popup -->
        <div id="AdditemPopup" class="popup" style="display:none;">
            <form method="post" class="popup-content">
                <input type="hidden" name="id" id="id">
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" required>
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" required>
                <label for="price">Price:</label>
                <input type="number" step="0.01" name="price" id="price" required>
                <button type="ADD" name="add">Add Product Item</button>
                <button type="button" onclick="closeAdditemPopup()">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>
