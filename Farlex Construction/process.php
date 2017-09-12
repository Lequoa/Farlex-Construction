<?
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $message = $_REQUEST['message'];
    
    require("PHPMailer-master/PHPMailerAutoload.php");
    
    $mailer = new PHPMailer();
    
    $mailer->IsSMTP();
    $mailer->SMTPDebug = 2;
    $mailer->Host = "egwardo.aserv.co.za ";
    $mailer->Port = 465;
    $mailer->SMTPAuth = true;

    $mailer->Username="info@farlexconstruction.co.za";
    $mailer->Password="admin123+";
    
    $mailer->From = $email;
    $mailer->AddAddress("info@farlexconstruction.co.za", "MD Farlex");
    
    $mailer->WordWrap = 75;
    $mailer->IsHTML(true);
    
    $mailer->Subject = "You have received feedback from your website";
    
    $mailer->Body = $message;
    $mailer->AltBody = $message;

    if(!$mailer->Send())
    {
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " .$mailer->ErrorInfo;
        exit;
    }

    echo "Message has been sent";
?>