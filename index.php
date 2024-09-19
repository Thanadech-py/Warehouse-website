<?php
include 'Function/Function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Management</title>
    <link rel="stylesheet" href="style.css">
    <script src="Function/index.js"></script>
</head>
<body>
<h1 class="header-title">
            <img src="src/werehouse.png" alt="Warehouse" class="header-icon"/> 
            Warehouse Management
        </h1>
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

    <!-- Main Content -->
    <div class="main-content">
        <h2>Product List</h2>
        <!-- Product Table -->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- This is just placeholder content -->
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                        <button onclick="openEditPopup(<?php echo $row['id']; ?>, '<?php echo $row['name']; ?>', <?php echo $row['quantity']; ?>, <?php echo $row['price']; ?>)">Edit</button>
                        <button type="delete" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Product Popup -->
    <div id="editPopup" class="popup" style="display:none;">
        <form method="post" class="popup-content">
            <input type="hidden" name="id" id="edit-id">
            <label for="edit-name">Product Name:</label>
            <input type="text" name="name" id="edit-name" required>
            <label for="edit-quantity">Quantity:</label>
            <input type="number" name="quantity" id="edit-quantity" required>
            <label for="edit-price">Price:</label>
            <input type="number" step="0.01" name="price" id="edit-price" required>
            <button type="Edit" name="edit">Update Product</button>
            <button type="button" onclick="closeEditPopup()">Cancel</button>
        </form> 
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

    <!-- Delete Confirmation Popup -->
    <div id="deletePopup" class="popup" style="display:none;">
        <div class="popup-content">
            <p>Are you sure you want to delete this product?</p>
            <form method="post" style="display:inline;">
                <input type="hidden" name="id" id="delete-id">
                <button type="deleteC" name="delete">Yes, Delete</button>
                <button type="cancel" onclick="closeDeletePopup()">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>
