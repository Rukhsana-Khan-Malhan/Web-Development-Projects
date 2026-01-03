<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTrek - Sign In</title>
    <link rel="shortcut icon" href="\EcoTrek\assests\media\icon.png" type="image/x-icon">
    <link rel="stylesheet" href="assests/main/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header>
        <?php include 'assests/header-footer/header.php'; ?>
    </header>
    <main>
        <section class="signin">
            <img src="assests/media/gettyimages.jpg" alt="" class="about-background">
             <div class="overlay1"></div>
             <div class="form-section">
                <div class="form-container">
                    <div id="signin-form">
                        <h1>Sign In</h1>
                        <form action="signin.php" method="POST">
                            <div class="form-group">
                                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                                <i class="fa-solid fa-eye-slash eye-icon" onclick="togglePassword('password', this)"></i>
                            </div>
                            <button type="submit" class="form-button" name="login">Log In</button>
                        </form>
                        <div class="toggle-link">
                            <a href="#" onclick="showCreateAccount()">Don't have an account? Sign Up</a>
                        </div>
                    </div>
                    <div id="create-account-form" class="hidden">
                        <h1>Create Account</h1>
                        <form action="signin.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Enter your full name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" id="signup-password" name="password" placeholder="Create a password" required>
                                <i class="fa-solid fa-eye-slash eye-icon" onclick="togglePassword('signup-password', this)"></i>
                            </div>
                            <button type="submit" name="signup" class="form-button">Sign Up</button>
                        </form>
                        <div class="toggle-link">
                            <a href="#" onclick="showSignIn()">Already have an account? Log In</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
       function showCreateAccount() {
            document.getElementById('signin-form').classList.add('hidden');
            document.getElementById('create-account-form').classList.remove('hidden');
        }
        function showSignIn() {
            document.getElementById('create-account-form').classList.add('hidden');
            document.getElementById('signin-form').classList.remove('hidden');
        }

        function togglePassword(fieldId, icon) {
            var passwordField = document.getElementById(fieldId);
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye"); 
            } else {
                passwordField.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }


    </script>
    <?php
        ob_start();
        $con = mysqli_connect("localhost", "root", "", "EcoTrek");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['signup'])) {  
            
                $name = mysqli_real_escape_string($con, $_POST['name']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
                $query = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($con, $query);
            
                if (mysqli_num_rows($result) > 0) {
                    echo "<script>alert('Email is already registered!'); window.location.href='signin.php';</script>";
                    exit();
                } else {
                    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";
                    if (mysqli_query($con, $query)) {
                        echo "<script>alert('Account created successfully! Please log in.'); window.location.href='signin.php';</script>";
                        exit();
                    } else {
                        echo "<script>alert('Error signing up: " . mysqli_error($con) . "');</script>";
                        exit();
                    }
                }
            } 
            elseif (isset($_POST['login'])) {  
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $query = "SELECT * FROM users WHERE email = '$email'";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    if (password_verify($password, $row['password'])) { 
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['name'] = $row['name'];  
                        echo "<script>window.location.href='index.php';</script>";
                        exit();
                    } else {
                        echo "<script>alert('Incorrect password!'); window.location.href='signin.php';</script>";
                        exit();
                    }
                } else {
                    echo "<script>alert('User not found!'); window.location.href='signin.php';</script>";
                    exit();
                }
            }
        }
        mysqli_close($con);
        ob_end_flush();
    ?>
    <?php include 'assests/header-footer/footer.php'; ?>
</body>
</html>