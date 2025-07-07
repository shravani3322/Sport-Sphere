<?php
// payment.php
echo "<h1>Payment Page</h1>";
echo "<p>Order Summary:</p>";
echo "<ul>";
echo "<li><strong>Product:</strong> Item Name</li>";
echo "<li><strong>Quantity:</strong> 1</li>";
echo "<li><strong>Total Price:</strong> Rs. 500.00</li>";
echo "</ul>";

echo "<p>Please proceed with the payment.</p>";

// Example of integrating PayPal button
echo '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="XXXXXXX">
        <input type="submit" value="Pay Now" name="submit" class="paypal-button">
      </form>';
?>
