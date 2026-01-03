<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_email = $_POST['email']; 
        $phone = $_POST['phone'];
        $company = $_POST['company'];
        $country = $_POST['country'];
        $message = $_POST['message'];
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'rukhsanakhanmalan@gmail.com';  
            $mail->Password = 'qaznzjhuyvwknlhd';   
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->SMTPDebug = 0;
            $mail->Timeout = 10;
            $mail->setFrom($user_email, $first_name . ' ' . $last_name);
            $mail->addAddress('ecotrek01@gmail.com');
            $mail->addReplyTo($user_email, $first_name . ' ' . $last_name);
            $mail->isHTML(true);
            $mail->Subject = $first_name . ' ' . $last_name;
            $mail->Body = "
                <h2>New Contact Form Submission</h2>
                <p><strong>Name:</strong> $first_name $last_name</p>
                <p><strong>Email:</strong> $user_email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Company:</strong> $company</p>
                <p><strong>Country:</strong> $country</p>
                <p><strong>Message:</strong> $message</p>
            ";
            $mail->send();
            $con = mysqli_connect("localhost", "root", "", "EcoTrek");
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $firstName = mysqli_real_escape_string($con, $first_name);
            $last_name = mysqli_real_escape_string($con, $last_name);
            $user_email = mysqli_real_escape_string($con, $user_email);
            $user_phone = mysqli_real_escape_string($con, $phone);
            $company_name = mysqli_real_escape_string($con, $company);
            $user_country = mysqli_real_escape_string($con, $country);
            $user_message = mysqli_real_escape_string($con, $message);
            $query = "INSERT INTO contact (first_name, last_name, email, phone, company_name, country, description) 
                      VALUES ('$firstName', '$last_name', '$user_email', '$user_phone', '$company_name', '$user_country', '$user_message')";
    
            if (mysqli_query($con, $query)) {
                echo "Record inserted successfully";
            } else {
                echo "Error: " . mysqli_error($con);
            }
            mysqli_close($con);
            header("Location: contact-us.php?status=success");
            exit();
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Invalid request!";
    }
?>
