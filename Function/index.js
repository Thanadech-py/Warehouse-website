// index.js

document.addEventListener('DOMContentLoaded', () => {
    // Function to open Edit Product Popup
    window.openEditPopup = function(id, name, quantity, price) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-name').value = name;
        document.getElementById('edit-quantity').value = quantity;
        document.getElementById('edit-price').value = price;
        document.getElementById('editPopup').style.display = 'flex'; // Use flex for centering
    }

    // Function to close Edit Product Popup
    window.closeEditPopup = function() {
        document.getElementById('editPopup').style.display = 'none';
    }

    // Function to open Add Product Popup
    window.openAdditemPopup = function() {
        document.getElementById('id').value = ''; // Clear fields
        document.getElementById('name').value = '';
        document.getElementById('quantity').value = '';
        document.getElementById('price').value = '';
        document.getElementById('AdditemPopup').style.display = 'flex'; // Use flex for centering
    }

    // Function to close Add Product Popup
    window.closeAdditemPopup = function() {
        document.getElementById('AdditemPopup').style.display = 'none';
    }

    // Function to confirm Delete Popup
    window.confirmDelete = function(id) {
        document.getElementById('delete-id').value = id;
        document.getElementById('deletePopup').style.display = 'flex'; // Use flex for centering
    }

    // Function to close Delete Confirmation Popup
    window.closeDeletePopup = function() {
        document.getElementById('deletePopup').style.display = 'none';
    }
    
});

