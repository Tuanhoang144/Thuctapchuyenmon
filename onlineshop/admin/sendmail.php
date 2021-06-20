<?php
include("../db.php");

include "sidenav.php";
include "topheader.php";
?>
<div class="content" >
    <div class="container-fluid" >
        <div class="col-md-14"  >
            <div class="card " style="background-color:#fff; overflow:hidden;">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Send mail</h4>
                </div>
<form action="" method="post" style="background-color:#fff; overflow:hidden;">
        <table align="center">
            <tr><td>Tiêu đề : </td><td><input type="text" name="subject"></td></tr>
            <tr><td>Họ tên : </td><td><input type="text" name="name"></td></tr>
            <?php
            $order_id = $_GET['order_id'];
            $query = $con->query("SELECT * FROM orders_info WHERE order_id = '$order_id'") or die (mysqli_error());
            $fetch = $query->fetch_array();
            $email = $fetch['email'];
            ?>
            <tr><td>Email: </td><td><input type="text" name="email" value="<?php echo $email  ?>"></td></tr>
            <tr><td>Nội dung : </td><td><input type="text" name="body"></td></tr>
            <tr><td><button class="btn btn-mini btn-info" type="submit" name="send">Gửi</button></td></tr>
        </table>    
    </form>
<?php
if(isset($_POST['send'])){

    $sb = $_POST['subject'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $body = $_POST['body'];
date_default_timezone_set('Etc/UTC');

require 'sendmail/smtpmail/PHPMailerAutoload.php';

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
</div>
</div>
</div>
<?php
include "footer.php";
?>
