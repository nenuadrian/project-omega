<?php declare (strict_types = 1);
use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public static function send(array $receivers, string $subject, string $html): void
    {
        $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = Configs::get('smtp_host'); //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = Configs::get('smtp_username'); //SMTP username
        $mail->Password = Configs::get('smtp_password'); //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable implicit TLS encryption
        $mail->Port = 587; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(Configs::get('smtp_from'));
        foreach ($receivers as $receiver) {
            $mail->addAddress($receiver);
        }

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $html;
        $mail->send();
    }
}
