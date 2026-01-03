<?php
$con = mysqli_connect("localhost", "root", "", "EcoTrek");  
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "DROP TABLE IF EXISTS payments";
if (mysqli_query($con, $query)) {
    echo "Table 'users' deleted successfully.";
} else {
    echo "Error deleting table: " . mysqli_error($con);
}

mysqli_close($con);
?>