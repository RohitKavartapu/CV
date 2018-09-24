<div class="contact-section" id="contact">
    <div class="container">
        <div class="contact-form">
            <h4 class="title-top-w3">Get in touch<span>|</span></h4>
            <h5 class="title-main-w3ls">Contact Me</h5>
            <form action="#" method="post">
                <div class="col-md-6 styled-input-w3-agile">
                    <input type="text" name="Full Name" placeholder="Enter your name" required="">
                </div>
                <div class="col-md-6 styled-input-w3-agile">
                    <input type="email" name="Email" placeholder="Enter your email" required="">
                </div>
                <div class="clearfix"> </div>
                <div class="styled-input-w3-agile">
                    <input type="text" name="Subject" placeholder="Enter the discussion title" required="">
                </div>
                <div class="styled-input-w3-agile textarea-grid">
                    <textarea name="Message" placeholder="Write your message" required=""></textarea>
                </div>
                <input type="submit" name="send" value="Send Message">
            </form>
        </div>
    </div>
    <div class="map-section-agile">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2971.3259053654037!2d12.600401050701338!3d41.864334079121335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f62a31682ec89%3A0xfb8011245eaa1437!2sVia+Varvariana%2C+18%2C+00133+Roma+RM!5e0!3m2!1sen!2sit!4v1537755022125" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>

</div>

<?php

$name= $_POST["Full Name"];
$email =$_POST["Email"];
$subject =$_POST["Subject"];
$msg =$_POST["Message"];

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    if (isset($_POST["send"])){
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'rockstarrocky113.rr@gmail.com';                 // SMTP username
    $mail->Password = '17071993';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('rockstarrocky113.rr@gmail.com', $name);
    $mail->addAddress('kavartapu.rohit@gmail.com', 'Rohit');     // Add a recipient
    #$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    /* $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
     $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    }
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
