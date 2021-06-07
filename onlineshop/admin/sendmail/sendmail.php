<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PHPMailer - GMail SMTP test</title>
</head>
<body>
<form action="" method="post">
        <table align="center">
            <tr><td>Tiêu đề : </td><td><input type="text" name="subject"></td></tr>
            <tr><td>Họ tên : </td><td><input type="text" name="name"></td></tr>
            <tr><td>Email: </td><td><input type="text" name="email"></td></tr>
            <tr><td>Nội dung : </td><td><input type="text" name="body"></td></tr>
            <tr><td><button type="submit" name="send">Gửi</button></td></tr>
        </table>    
    </form>
<?php
if(isset($_POST['send'])){

    $sb = $_POST['subject'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $body = $_POST['body'];
date_default_timezone_set('Etc/UTC');

require 'smtpmail/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();


$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = "htuan8288@gmail.com";

$mail->Password = "tuanmai0205";

$mail->setFrom('htuan8288@gmail.com', 'First Last');

$mail->addReplyTo('htuan8288@gmail.com', 'First Last');

$mail->addAddress($email, $name);

$mail->Subject = $sb;

$mail->msgHTML($body);

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}}
?>
</body>
</html>
