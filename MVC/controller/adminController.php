<?php
require_once('../model/productclass.php');
require_once('../model/productService.php');

class adminController
{

    public $productService;
    public function __construct()
    {
        $this->productService = new ProductService();
    }
    public function LoadIndex()
    {
        include '../view_admin/index_admin.php';
    }
    public function CreateProductGET()
    {
        include '../view_admin/product_create.php';
    }
    public function CreateProductPOST(Product $p,$listimg)
    {
        if ($this->productService->addProduct($p,$listimg)) {
            include '../view_admin/index_admin.php';
        } else {
            echo "<script>alert('Lỗi thêm vui lòng xem lại thông tin !');</script>";
        }
    }
}
$adminc = new adminController();

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    // Product GET - POST
    if ($controller == "createProductGET") {
        $adminc->CreateProductGET();
    }
    if ($controller == "createProductPOST") {
        if (
            !empty($_POST['ProductName']) || !empty($_POST['Price']) ||
            !empty($_POST['Series']) || !empty($_POST['Stock'])
        ) {
            $tempID = (int)$adminc->productService->getIdadd();
            $p = new Product();
            $p->SetProductID($tempID);
            $p->SetProductName($_POST['ProductName']);
            $p->SetSeries($_POST['Series']);
            $p->SetBrand($_POST['Brand']);
            $p->SetNote($_POST['Note']);
            $p->SetDateRelease($_POST['DateRelease']);
            $p->SetProductStatus($_POST['ProductStatus']);
            $p->SetPrice((float)$_POST['Price']);
            $p->SetStock((int)$_POST['Stock']);
            $p->SetInfor($_POST['Infor']);
            $adminc->CreateProductPOST($p,$_POST['geturlcloud']);
        }



        // $p->price = $_POST['Price'];
        // $p->series = $_POST['Series'];

        // $value = $_POST['ProductName'];
        // $value2 = $_POST['Price'];
        // $value3 = $_POST['Series'];
        // echo $value;
        //$adminc->CreateProductPOST($value);
    }
    // 
} else   $adminc->LoadIndex();
?>
<!-- class AdminModel {
    public function loginUser($username, $password) {
        // Perform login logic here...
        // For example:
        if ($username === 'admin' && $password === 'password') {
            header('Location: http://localhost:3000/MVC/view/dashboard.php');
            exit;
        } else {
            echo 'Invalid credentials!';
        }
    }
}
-->

<!-- <form action="http://localhost:3000/MVC/controller/adminController.php?controller=ha" method="post">
  <label for="username">Username:</label>
  <input type="text" name="username" id="username">
  <label for="password">Password:</label>
  <input type="password" name="password" id="password">
  <button type="submit">Log in</button>
</form> -->