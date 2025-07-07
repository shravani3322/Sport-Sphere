// Example: Update cart count based on items in cart (you can fetch this number from your backend)
document.addEventListener('DOMContentLoaded', function() {
    let cartCount = 3; // Fetch actual count from backend or storage
    document.querySelector('.cart-count').textContent = cartCount;
});