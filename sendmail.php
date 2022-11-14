b<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';



if(isset($_POST['submit']))
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $nama = $_POST['name'];
    $email = $_POST['email'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];
    // $no_invoice         = $_POST['no_invoice'];
    // $nama_pengirim      = $_POST['nama_pengirim'];
    // $email              = $_POST['email'];

    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'fikaralghifari0504.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'Dzulfikar Muhammad';                     // SMTP username
    $mail->Password   = 'pw_dzulfikar0504';                               // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom("$email", "$nama");
    $mail->addAddress('fikaralghifari0504@gmail.com', 'Message From Portfolio');     // Add a recipient
    
    $mail->addReplyTo('fikaralghifari0504@gmail.com', 'Percobaan');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "$subjek";
    $mail->Body    = '<h1>Halo, Admin.</h1> <p>Ada pesanan baru dari '.$nama.'</p> </br>'
                    .$pesan;    

    if($mail->send())
    {
        echo 'Konfirmasi pembayaran telah berhasil';
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    echo "Tekan dulu tombolnya bos";
}