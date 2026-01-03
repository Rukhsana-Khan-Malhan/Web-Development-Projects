<?php
session_start();

$selectedProject = isset($_GET['project']) ? $_GET['project'] : 'No project selected';
$selectedProjectName = isset($_GET['name']) ? $_GET['name'] : 'No project name';
$carbonOffset = isset($_GET['offset']) ? $_GET['offset'] : '0';
$creditAmount = isset($_GET['credit']) ? $_GET['credit'] : '0';
$dollarAmount = isset($_GET['dollar']) ? $_GET['dollar'] : '0';


$_SESSION['selectedProject'] = $selectedProject;
$_SESSION['selectedProjectName'] = $selectedProjectName;
$_SESSION['carbonOffset'] = $carbonOffset;
$_SESSION['creditAmount'] = $creditAmount;
$_SESSION['dollarAmount'] = $dollarAmount;
?>

<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTrek - Payment Form</title>
    <link rel="stylesheet" href="assests/main/main.css">
    <script>
        function showPaymentFields() {
            const method = document.getElementById('paymentMethod').value;

            document.getElementById('credit-card-fields').style.display = 'none';
            document.getElementById('paypal-fields').style.display = 'none';
            document.getElementById('bank-transfer-fields').style.display = 'none';

            if (method === 'credit_card') {
                document.getElementById('credit-card-fields').style.display = 'block';
            } else if (method === 'paypal') {
                document.getElementById('paypal-fields').style.display = 'block';
            } else if (method === 'bank_transfer') {
                document.getElementById('bank-transfer-fields').style.display = 'block';
            }
        }
    </script>
</head>
<body>
    <header>
        <?php include 'assests/header-footer/header.php'; ?>
    </header>
    <section class="carbon-offset-section">
        <img src="assests/media/pexels-karoldach-409696.jpg" alt="" class="background">
        <div class="overlay1"></div>
        <div class="payment-form">
            <h2>Payment Details</h2>
            <form action="processPayment.php" method="POST">

                <label>Company Name:</label>
                <input type="text" name="companyName" required>

                <label>Email:</label>
                <input type="email" name="email" required>

                <label>Selected Project Name:</label>
                <input type="text" name="selectedProjectName" value="<?php echo $selectedProjectName; ?>" readonly>

                <label>Selected Project ID:</label>
                <input type="text" name="selectedProject" value="<?php echo $selectedProject; ?>" readonly>

                <label>Carbon Offset (Tonnes):</label>
                <input type="text" name="carbonOffset" value="<?php echo $carbonOffset; ?>" readonly>

                <label>Credit Amount:</label>
                <input type="text" name="creditAmount" value="<?php echo $creditAmount; ?>" readonly>

                <label>Dollar Amount ($):</label>
                <input type="text" name="dollarAmount" value="<?php echo $dollarAmount; ?>" readonly>

                <label>Payment Method:</label>
                <select name="paymentMethod" id="paymentMethod" onchange="showPaymentFields()" required>
                    <option value="">Select a Payment Method</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>

               
                <div id="credit-card-fields" class="payment-details">
                    <label>Card Number:</label>
                    <input type="text" name="cardNumber" placeholder="1234 5678 9101 1121">

                    <label>Expiry Date:</label>
                    <input type="text" name="expiryDate" placeholder="MM/YY">

                    <label>CVV:</label>
                    <input type="text" name="cvv" placeholder="123">
                </div>

               
                <div id="paypal-fields" class="payment-details">
                    <label>PayPal Email:</label>
                    <input type="email" name="paypalEmail" placeholder="your-email@example.com">
                </div>

                
                <div id="bank-transfer-fields" class="payment-details">
                    <label>Bank Account Number:</label>
                    <input type="text" name="bankAccount" placeholder="0123456789">
                </div>

                <button type="submit" class="button">Proceed to Payment</button>
    </form>
        </div>
    </section>
    <?php include 'assests/header-footer/footer.php'; ?>
</body>
</html>
