document.addEventListener('DOMContentLoaded', function () {
    // Ensure the data from PHP is available
    if (typeof totalProducts === 'undefined' || typeof totalQuantity === 'undefined' || typeof totalValue === 'undefined') {
        console.error('Data from PHP is not available.');
        return;
    }

    console.log('Chart Data:', {
        totalProducts: totalProducts,
        totalQuantity: totalQuantity,
        totalValue: totalValue
    });

    // Chart.js initialization
    const ctxProducts = document.getElementById('totalProductsChart').getContext('2d');
    const ctxQuantity = document.getElementById('totalQuantityChart').getContext('2d');
    const ctxValue = document.getElementById('totalValueChart').getContext('2d');

    // Create Total Products Chart
    new Chart(ctxProducts, {
        type: 'bar',
        data: {
            labels: ['Total Products'],
            datasets: [{
                label: 'Number of Products',
                data: [totalProducts],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Create Total Quantity Chart
    new Chart(ctxQuantity, {
        type: 'bar',
        data: {
            labels: ['Total Quantity'],
            datasets: [{
                label: 'Quantity',
                data: [totalQuantity],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Create Total Value Chart
    new Chart(ctxValue, {
        type: 'bar',
        data: {
            labels: ['Total Value'],
            datasets: [{
                label: 'Value ($)',
                data: [totalValue],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
