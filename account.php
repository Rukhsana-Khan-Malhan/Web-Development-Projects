<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['email'])) {
    header("Location: signin.php");
    exit();
}
$con = mysqli_connect("localhost", "root", "", "EcoTrek");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$email = $_SESSION['email'];
$sql = "SELECT * FROM payments WHERE email = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="assests/main/main.css">
    <style>
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 120px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .profile-card {
            text-align: center;
            padding: 20px;
            border-bottom: 2px solid #ddd;
        }
        .profile-card h2 {
            color: #333;
            font-size:2rem;
            font-family: Raleway, Arial, sans-serif;
            padding-bottom:10px;
        }
        .profile-card p {
            color: #666;
            font-family:Inter,"Roboto",sans-serif;
        }
        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            background: red;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .logout-button:hover {
            background: darkred;
        }
        h3 {
            text-align: center;
            color: #444;
            font-size:1.5rem;
            font-family:Inter,"Roboto",sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background: #228b22;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
    </style>
</head>
<body>
    <?php include 'assests/header-footer/header.php'; ?>
    <section class="contact-section"> 
        <img src="assests/media/Employee.jpg" alt="" class="background">
        <div class="overlay1"></div>
        <div class="container">
            <div class="profile-card">
                <h2><?php echo htmlspecialchars($_SESSION['name']); ?></h2>
                <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                <a href="logout.php" class="logout-button">Logout</a>
            </div>
            <h3>Payment History</h3>
            <table>
                <tr>
                    <th>Project Name</th>
                    <th>Carbon Offset (tonnes)</th>
                    <th>Credit Amount (INR)</th>
                    <th>Dollar Amount ($)</th>
                    <th>Payment Method</th>
                    <th>Purchase Date</th>
                    <!-- <th>Certificate</th> -->
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['project_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['carbon_offset']); ?></td>
                    <td><?php echo htmlspecialchars($row['credit_amount']); ?></td>
                    <td><?php echo htmlspecialchars($row['dollar_amount']); ?></td>
                    <td><?php echo htmlspecialchars($row['payment_method']); ?></td>
                    <td><?php echo htmlspecialchars($row['purchase_date']); ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</body>
</html>
<?php 
mysqli_close($con);
?>
