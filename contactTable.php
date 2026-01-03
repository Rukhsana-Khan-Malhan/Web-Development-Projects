<?php
$con = mysqli_connect("localhost", "root", "", "Ecotrek");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "CREATE TABLE IF NOT EXISTS contact (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15), 
    company_name VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL,
    description VARCHAR(1000) NOT NULL
)";

if (mysqli_query($con, $query)) {
    echo "Table 'contact' created successfully";
} else {
    echo "Error creating table: " . mysqli_error($con);
}

mysqli_close($con);
?>
