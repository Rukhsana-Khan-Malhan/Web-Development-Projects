<?php
    $con = mysqli_connect("localhost", "root", "", "EcoTrek");
    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "CREATE TABLE payments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        company_name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        project_id VARCHAR(25) NOT NULL,
        project_name VARCHAR(255) NOT NULL,
        carbon_offset DECIMAL(10,2) NOT NULL,
        credit_amount DECIMAL(10,2) NOT NULL,
        dollar_amount DECIMAL(10,2) NOT NULL,
        payment_method VARCHAR(50) NOT NULL,
        certificate_path VARCHAR(255) NOT NULL,
        purchase_date DATE NOT NULL
    )";
    
    
    if (mysqli_query($con, $sql)) {
        echo "Table 'payments' created successfully!";
    } else {
        echo "Error creating table: " . mysqli_error($con);
    }
    
    mysqli_close($con);
?>
