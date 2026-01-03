<?php
$con = mysqli_connect("localhost", "root", "", "EcoTrek"); 
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
)";

if (mysqli_query($con, $query)) {
    echo "Table 'users' created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($con);
}

mysqli_close($con);
?>
