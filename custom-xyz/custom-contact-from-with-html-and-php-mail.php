
<form action="" method="post" id="contact-form" class="form-horizontal">
    <div class="form-group">
        <input type="text" id="visitor_name" name="visitor_name" placeholder="Type Your Name" required>
    </div>
    <div class="form-group">
        <input type="email" id="visitor_email" name="visitor_email" placeholder="Your Email Address" required>
    </div>
    <div class="form-group">
        <input type="tell" id="visitor_phone" name="visitor_phone" placeholder="Your Phone Number" required>
    </div>
    <div class="form-group">
        <input type="number" id="visitor_offer_usd" name="visitor_offer_usd" placeholder="Offer in USD" required>
    </div>
    <div class="form-group">
        <textarea id="visitor_message" name="visitor_message" placeholder="Your Message" required></textarea>
    </div>
    <div class="form-group">
        <button type="submit">Send Message</button>
    </div>
</form>


<?php
    if($_POST) {
        $visitor_name = "";
        $visitor_email = "";
        $visitor_phone = "";
        $visitor_offer_usd = "";
        $visitor_message = "";
        $email_body = "<div>";
        
        if(isset($_POST['visitor_name'])) {
            $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
            $email_body .= "<div>
                            <label><b>Visitor Name:</b></label>&nbsp;<span>".$visitor_name."</span>
                            </div>";
        }
    
        if(isset($_POST['visitor_email'])) {
            $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
            $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
            $email_body .= "<div>
                            <label><b>Visitor Email:</b></label>&nbsp;<span>".$visitor_email."</span>
                            </div>";
        }
        
        if(isset($_POST['visitor_phone'])) {
            $visitor_phone = filter_var($_POST['visitor_phone'], FILTER_SANITIZE_STRING);
            $email_body .= "<div>
                            <label><b>Visitor Phone: </b></label>&nbsp;<span>".$visitor_phone."</span>
                            </div>";
        }

        if(isset($_POST['visitor_offer_usd'])) {
            $visitor_offer_usd = filter_var($_POST['visitor_offer_usd'], FILTER_SANITIZE_STRING);
            $email_body .= "<div>
                            <label><b>Offer in USD: </b></label>&nbsp;<span>".$visitor_offer_usd."</span>
                            </div>";
        }
        
        
        
        if(isset($_POST['visitor_message'])) {
            $visitor_message = htmlspecialchars($_POST['visitor_message']);
            $email_body .= "<div>
                            <label><b>Visitor Message:</b></label>
                            <div>".$visitor_message."</div>
                            </div>";
        }
        
        $recipient = "shuvombm02@gmail.com";
        
        $email_body .= "</div>";
    
        $headers  = 'MIME-Version: 1.0' . "\r\n"
        .'Content-type: text/html; charset=utf-8' . "\r\n"
        .'From: ' . $visitor_email . "\r\n";
        
        if(mail($recipient, $visitor_phone, $email_body, $headers)) {
            echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
        } else {
            echo '<p>We are sorry but the email did not go through.</p>';
        }
        
    } 
?>
