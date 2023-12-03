<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class SendMailController extends Controller
{
    public function index(){
        return view('mail.index');
    }

    public function sendmail(Request $request){
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tungng14@gmail.com';                     //SMTP username
            $mail->Password   = 'sdaijnztjivizuin';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('tungng14@gmail.com', 'NekoStore Administrator');
            $mail->addAddress($request->mail);     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Feedback from customer';
            $mail->Body    = "$request->content";
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo '<script> window.alert("Đã gửi mail thành công cho cửa hàng"); </script>';
            return Redirect::to('/trang-chu');
        } catch (Exception $e) {
            echo "<script> window.alert('Failed to send your mail'); </script>";
            return Redirect::to('/trang-chu');
        }
    }
}
