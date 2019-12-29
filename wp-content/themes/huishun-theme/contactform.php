<?php
/*
Template Name: Contact Form
*/
?>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/Exception.php";
    require "PHPMailer/SMTP.php";

    if(isset($_POST['submit'])) {
        $name = $_POST['contactform-name'];
        $subject = $_POST['subject'];
        $mailFrom = $_POST['email'];
        $message = $_POST['message'];

        $mail = new PHPMailer();
        $mail->IsSMTP(); // send via SMTP
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='ssl';
        $mail->Username='huishunchua@gmail.com';
        $mail->Password='"april91998';

        $mail->setFrom($mailFrom, $name);
        $mail->addAddress('huishun98@gmail.com');
        $mail->CharSet = 'utf-8';

        $mail->isHTML(true);
        $mail->Subject=$subject;
        $mail->Body=$message;
        
        if($mail->send()) { 
            $result='Thank you for contacting us. We will get back to you shortly.';
        } else {
            $result='We are unable to send your message now. Please try again later.';
        }
    }
?>

<?php get_header() ?>
    <div class="background">
        <div class="page-thumbnail-wrapper">
                <div class="page-thumbnail">
                    <div class="thumbnail-content">
                        <span class="section-header">Let's get in touch</span>
                        <div class="thumbnail-description rich-text">
                            <p class="page-subheader">To enquire or explore potential collaborations, please fill in the form below.</p>
                            <div class="contactform-result"><?= $result; ?></div>
                            <form id="contactform" method="POST">
                                <input class="thumbnail-input" type="text" placeholder="Name*" name="contactform-name" required>
                                <input class="thumbnail-input" type="email" placeholder="Email*" name="email" required>
                                <input class="thumbnail-input" type="text" placeholder="Subject" name="subject">
                                <textarea class="thumbnail-textarea" placeholder="Message*" name="message" required></textarea>
                                <span class="remarks">*Required fields</span>
                                <input id="contactform-button" class="default-button" type="submit" name="submit" value="SEND">
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<?php get_footer() ?>
