<?php
    session_start();
    require 'fpdf/fpdf.php';  
    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    
    $con = mysqli_connect("localhost", "root", "", "EcoTrek");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $companyName = mysqli_real_escape_string($con, $_POST['companyName']);
    $user_email = mysqli_real_escape_string($con, $_POST['email']);
    $selectedProject = mysqli_real_escape_string($con, $_POST['selectedProject']); 
    $selectedProjectName = mysqli_real_escape_string($con, $_POST['selectedProjectName']);
    $carbonOffset = (float)$_POST['carbonOffset'];
    $creditAmount = (float)$_POST['creditAmount'];
    $dollarAmount = (float)$_POST['dollarAmount'];
    $paymentMethod = mysqli_real_escape_string($con, $_POST['paymentMethod']);
    $purchaseDate = date("Y-m-d");  
    
    $projectID = $selectedProject; 
    
    $pdf = new FPDF('L', 'mm', array(1847, 1080)); 
    $pdf->AddPage();
    
    $pdf->Image(__DIR__ . '/certificates/Carbon-Footprint-Certificate.png', 0, 0, 1847, 1080);  
    
    $pdf->SetFont('Arial', 'B', 160); 
    $pdf->SetTextColor(34, 139, 34);
    
    $pdf->SetXY(1030, 370);
    $pdf->Cell(0, 0, strtoupper($companyName), 0, 1, 'C');
    
    $pdf->SetFont('Arial', '', 100);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(990, 540); 
    $pdf->Cell(0, 0, number_format($carbonOffset * 1000, 0) . " kg of CO2 Emissions", 0, 1, 'C');
    
    $pdf->SetFont('Arial', 'I', 100);
    $pdf->SetTextColor(0, 102, 0);
    $pdf->SetXY(990, 583); 
    $pdf->Cell(0, 0, $selectedProjectName, 0, 1, 'C');
    
    $pdf->SetFont('Arial', '', 100);  
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(990, 728);
    $pdf->Cell(0, 0, $purchaseDate, 0, 1, 'C');
    
    $pdf->SetFont('Arial', 'B', 100); 
    $pdf->SetTextColor(0, 102, 0);
    $pdf->SetXY(990, 870); 
    $pdf->Cell(0, 0, $projectID, 0, 1, 'C');
    
    $certificatePath = "certificates/" . str_replace(" ", "_", $companyName) . "_certificate.pdf";
    $pdf->Output($certificatePath, 'F');
    
    $query = "INSERT INTO payments (company_name, email, project_id, project_name, carbon_offset, credit_amount, dollar_amount, payment_method, certificate_path, purchase_date) 
              VALUES ('$companyName', '$user_email', '$projectID', '$selectedProjectName', '$carbonOffset', '$creditAmount', '$dollarAmount', '$paymentMethod', '$certificatePath', '$purchaseDate')";
    mysqli_query($con, $query);
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rukhsanakhanmalan@gmail.com';  
        $mail->Password = 'qaznzjhuyvwknlhd';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
     
        $mail->setFrom('rukhsanakhanmalan@gmail.com', 'EcoTrek Carbon Offset');  
        $mail->addAddress($user_email, $companyName);
        $mail->addReplyTo('rukhsanakhanmalan@gmail.com', 'EcoTrek Support');
        
        $mail->addAttachment($certificatePath);
    
        $mail->isHTML(true);
        $mail->Subject = "Your Carbon Offset Certificate - EcoTrek";
        $mail->Body = "
            <h2>Congratulations, $companyName!</h2>
            <p>Thank you for offsetting <strong>$carbonOffset Tonnes</strong> of carbon emissions.</p>
            <p>Find your official Carbon Offset Certificate attached.</p>
            <br>
            <p>Best regards,<br>EcoTrek Team</p>
        ";
        $mail->send();
        echo "<script>
        alert('✅ Payment successful! Certificate sent to your email.');
        window.location.href = 'account.php'; // Redirect to user profile page
    </script>";
    
    } catch (Exception $e) {
        echo "❌ Email sending failed: " . $mail->ErrorInfo;
    }

    mysqli_close($con);
?>
