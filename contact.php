<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <meta name="description" content="Contact Robert Kellow">
    <meta name="author" content="Robert Kellow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body id="contact">

<?php include 'nav.html' ?>

<section class="header-content">
    <div class="bgimg">
        <div class="page-header">
            <h1>CONTACT ROB</h1>            
        </div>
    </div>
</section>

<section class="pagewrap">
    <div class="text-block">
        <h1 id="portfolio">SEND A GENERAL MESSAGE</h1>
        <hr class="title-line">    

        <?php
            function spamcheck($field) { 
                if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }

            if (isset($_REQUEST['email'])) {
                $mailcheck = spamcheck($_REQUEST['email']);
                if ($mailcheck==FALSE) {
                    echo '<h2 class="error">You have inserted incorrect email address or have left some of the fields empty</h2>';
                } else {//send email
                    $name = $_REQUEST['name'];
                    $email = $_REQUEST['email'];
                    $subject = $_REQUEST['subject'];
                    $message = $_REQUEST['message'];
                    mail("#", "Subject: $subject",
                    $message, "From: $name $email" );
                    echo '<h2 class="success">Thank you for using our mail form! We will get in touch with you soon!</h2>';
                }
            } 
        ?>

        <div class="contact-container">        
            <form id="contactform" method="post" action="contact.php">
                <b>About You</b>
                <input type="text" name= "name" placeholder="Name">
                <input type="text" name="email" placeholder="Email">
                <b>Message</b>
                <input type="text" name="subject" placeholder="Subject">       
                <textarea name="message" placeholder="Message"></textarea>
                <input id="button-text" type="submit" name="submitform" value="Send">
            </form>
        </div>
    </div>
</section>

<?php include 'footer.html' ?>

<script src="assets/js/navFunction.js" type="text/javascript"></script>

</body>
</html>
