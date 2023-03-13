<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/src/SMTP.php';
// require_once(__DIR__ . '/../model/productclass.php');

// require_once(__DIR__ . '/../model/productService.php');
// require_once(__DIR__.'/../../phpconnectmongodb.php');
require_once('../model/userclass.php');
require_once('../model/userService.php');


class userController
{
    public $userService;
    public function __construct()
    {
        $this->userService = new UserService();
    }
    public function SetUser()
    {
        $newu = new Users();
        $newu->SetEmail($_POST['email']);
        $newu->SetPassword($_POST['password']);
        $newu->SetRoles('customer');
        $newu->SetPhonenum($_POST['phonenum']);
        $newu->SetAddress($_POST['address']);
        $newu->SetUserID(1);
        $newu->SetFirstName($_POST['firstname']);
        $newu->SetLastName($_POST['lastname']);
        return $newu;
    }
    // LOGOUT GET
    public function LogOut()
    {
        unset($_SESSION['accountuser']);
        $url = "/MVC/controller/productController.php";
        header("Location: " . $url);
    }
    //Controller LOGIN GET - POST
    public function loginUserGET()
    {
        include '../views/login_user.php';
    }
    public function loginUserPOST()
    {
        $result_loginUserPOST = $this->userService->findUserWithEmailandPassword($_POST['email'], $_POST['password']);
        if ($result_loginUserPOST == false) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            $_SESSION['error_message'] = "Sai mật khẩu hoặc tài khoản không tồn tại trong hệ thống.";
        } else {
           
            $_SESSION['accountuser'] = $result_loginUserPOST;
            $url = "/MVC/controller/productController.php";
            header("Location: " . $url);
        }
    }
    //Controller REGISTER GET - POST
    public function registerUserGET()
    {
        include '../views/register_user.php';
    }
    public function registerUserPOST()
    {
        $result_registeruser = $this->userService->addUser($this->SetUser());
        if ($result_registeruser) {
            $url = "/MVC/controller/userController.php?controller=loginUserGET";
            header("Location: " . $url);
        } else {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            $_SESSION['error_message'] = "Kiểm tra lại thông tin đăng ký hoặc Email đã tồn tại trong hệ thống.";
        }
    }
    //Random Password
    function generateRandomPassword($length = 10)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';

        // Create a randomly generated password
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $password;
    }
    // SMTP 
    public function sendmail($ps, $email)
    {

        $mail  = new PHPMailer();

        try {
            //Set the SMTP server parameters
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->Username = 'tiennguyen558.tn@gmail.com';
            $mail->Password = 'jqwnvarqphujghxc';
            $mail->SMTPSecure = 'ssl'; //Enable SSL encryption

            //Set recipient(s)
            $mail->setFrom('tiennguyen558.tn@gmail.com', 'FigureFunnyStore');
            $mail->addAddress($email, 'Hi');

            //Set email body
            $mail->Subject = '[FigureFunny] Khôi phục mật khẩu của bạn'; // tieu de
            //
         
            $mail->CharSet = 'UTF-8';
            //
            $mail->Body = "<div id=':33' class='ii gt' jslog='20277; u014N:xr6bB; 4:W251bGwsbnVsbCxbXV0.'>"
            . "<div id=':32' class='a3s aiL '>"
            . "<u>" . "</u>" . "<div>"
            . "<div style='width:800px;text-align:center;margin:0 auto'>"
            . "<table align='center' width='800' height='1000' cellpadding='0' cellspacing='0' border='0' style='background:#A77979'>"
            . "<tbody>"
            . "<tr>"
            . "<td align='center' valign='top' style='background:url(https://wallpapercave.com/uwp/uwp2052576.jpeg)'>"
            . "<table width='576' cellpadding='0' cellspacing='0' border='0'>"
            . "<tbody>"
            . "<tr>"
            . "<td height='250'>"
            . "</td>"
            . "</tr>"
            . "<tr>"
            . "<td align='left' valign='top' style='color:#fff'>"
            . "<font color='#e35b5b' style='font-size:26px'>"
            . "<strong>"
            . "Gửi khách hàng:"
            . "<br>"
            . "Đây đây là mật khẩu của bạn, vui lòng nhập vào:"
            . "</strong>"
            . "</font>"
            . "</td>"
            . "</tr>"
            . "<tr>"
            . "<td height='40' valign='top'>"
            . "</td>"
            . "</tr>"
            . "<tr>"
            . "<td align='center' height='54' style='background:#202121;letter-spacing:15px;color:#ffffff'>"
            . "<font size='6' color='#FFFFFF'>"
            // code here
            . $ps
            . "</font>"
            . "</td>"
            . "</tr>"
            . "<tr>"
            . "<td height='40' valign='top'>"
            . "</td>"
            . "</tr>"
            . "<tr>"
            . "<td valign='top' style='color:#e35b5b'>"
            . "<font size='4' color='#e35b5b'>"
            . "Mọi thắc mắc vui lòng gửi email "
            . "<a href='mailto:longan04111@gmail.com ' target='_blank'>"
            . "longan04111@gmail.com"
            . "</a>"
            . "để biết thêm thông tin."
            . "Nếu bạn không có thắc mắc nào, vui lòng đừng gửi thư rác!"
            . "</font>"
            . "</td>"
            . "</tr>"
            . "<tr>"
            . "<td height='40' valign='top'>"
            . "</td>"
            . "</tr>"
            . "<tr>"
            . "<td height='60' valign='top' style='color:#e35b5b'>"
            . "<font size='4' color='#e35b5b'>Một ngày tốt lành！</font>"
            . "</td>"
            . "</tr>"
            . "<tr>"
            . "<td height='50' valign='top' style='color:#e35b5b'>"
            . "<font size='5' color='#e35b5b'><strong>TN<strong></font>"
            . "</td>"
            . "</tr>"
            . "<tr>"
            . "<td height='100%'>"
            . "</td>"
            . "</tr>"
            . "</tbody>"
            . "</table>"
            . "</td>"
            . "</tr>"
            . "</tbody>"
            . "</table>"
            . "</div>"
            . "</div>"
            . "</div>"
            . "<div class='yj6qo'></div>"
            . "</div>"; //body
            $mail->isHTML(true);
           
            //Send the message, check for errors
            if ( !$mail->send()) {
               // $_SESSION['error_message'] = "123";
            } else {
                // $_SESSION['error_message'] = "Kiểm tra lại thông tin đăng ký hoặc Email đã tồn tại trong hệ thống.";
            }
          
        } catch (Exception $e) {
          
            echo "Error encountered: " . $mail->ErrorInfo;
        }
    }
    //FORGOT PASSWORD POST 
    public function ForgotPassWordPOST()
    {
        $result_findemail = $this->userService->findEmail($_POST['email']);
        if ($result_findemail != false) {
            $randomPassword = $this->generateRandomPassword();
            $this->sendmail($randomPassword, $_POST['email']);
            $newu = new Users();
            $newu->SetEmail($_POST['email']);
            $newu->SetPassword($randomPassword);
            $newu->SetRoles('customer');
            $newu->SetPhonenum($result_findemail['phonenum']);
            $newu->SetAddress($result_findemail['address']);
            $newu->SetUserID("1");
            $newu->SetFirstName($result_findemail['firstname']);
            $newu->SetLastName($result_findemail['lastname']);
            $this->userService->updateUserByEmail($newu);
          
            $url = "/MVC/controller/userController.php";
            header("Location: " . $url);
        }else {
            $url = "/MVC/controller/productController.php";
            header("Location: " . $url);
            echo '<script>alert("Không tồn tại Email hoặc sai Email!");</script>';
        }
    }
}
///////////////////////////////////////
$classuser = new userController();
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    // REGISTER USER GET - POST
    if ($controller == "registerUserGET") {
        $classuser->registerUserGET();
    }
    if ($controller == "registerUserPOST") {
        $classuser->registerUserPOST();
    }
    // LOGIN USER GET - POST
    if ($controller == "loginUserGET") {
        $classuser->loginUserGET();
    }
    if ($controller == "loginUserPOST") {
        $classuser->loginUserPOST();
    }
    //LOGOUT
    if ($controller == "logout") {
        $classuser->LogOut();
    }
    //FORGOT PASSWORD
    if ($controller == "ForgotPassWordPOST") {
        $classuser->ForgotPassWordPOST();
    }
    //INFOR USER GET
    if ($controller == "inforUserGET") {
        $url = "/MVC/views/infor_user.php";
        header("Location: " . $url);
    }
} else       $classuser->loginUserGET();
