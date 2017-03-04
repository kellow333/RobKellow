<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <meta name="description" content="Contact Robert Kellow">
    <meta name="author" content="Robert Kellow">
       <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body >

<?php include 'nav.html' ?>

<section id="header" class="header">
    <div class="header-center">
        <h1 class="header-title animated fadeInDownBig">ROB KELLOW</h1>
        <h3 class="header-caption producing animated zoomIn">Send A General Message</h3>        
    </div>
</section>

<section id="contact-form">
    <div class="container">
        <div class="row text-center">  
            <h2>CONTACT FORM</h2>
            <hr>
            
        </div>
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
                    mail("robertkellow77@gmail.com", "Subject: $subject",
                    $message, "From: $name $email" );
                    echo '<h2 class="success">Thank you for using our mail form! We will get in touch with you soon!</h2>';
                }
            } 
        ?>

        <div class="contact-container">        
            <form id="contactform" method="post" action="contact.php">                
                <input type="text" name= "name" placeholder="Name">
                <input type="text" name="email" placeholder="Email">                
                <input type="text" name="subject" placeholder="Subject">       
                <textarea name="message" placeholder="Message"></textarea>
                <input id="button-text" type="submit" name="submitform" value="SEND">
            </form>
        </div>

    </div>
</section>

<?php include 'footer.html' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
