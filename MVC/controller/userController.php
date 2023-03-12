<?php


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
}
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
} else       $classuser->loginUserGET();
