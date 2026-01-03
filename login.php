<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect("localhost", "root", "", "EcoTrek");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $user['name'];

         
            $redirect_url = $_POST['redirect'] ?? '/EcoTrek/index.php';

            
            $redirect_url = isset($_POST['redirect']) && !empty($_POST['redirect']) ? $_POST['redirect'] : "/EcoTrek/index.php";
header("Location: " . $redirect_url);
exit();

        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with that email.";
    }

    mysqli_close($con);
}

?>
