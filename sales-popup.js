document.addEventListener('DOMContentLoaded', function() {
    const salesPopup = document.getElementById('sales-popup');
    const closeSales = document.getElementsByClassName('close-sales')[0];

    // Show the popup after 5 seconds
    setTimeout(function() {
        salesPopup.style.display = 'block';
        setTimeout(function() {
            salesPopup.style.left = '0';
        }, 10);
    }, 5000);

    // Close the popup when clicking on the close button
    closeSales.onclick = function() {
        salesPopup.style.left = '-100%';
        setTimeout(function() {
            salesPopup.style.display = 'none';
        }, 500);
    }

    // Close the popup when clicking outside of it
    window.onclick = function(event) {
        if (event.target == salesPopup) {
            salesPopup.style.left = '-100%';
            setTimeout(function() {
                salesPopup.style.display = 'none';
            }, 500);
        }
    }
});