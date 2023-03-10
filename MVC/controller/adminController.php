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
    // Index
    public function LoadIndex()
    {
        include '../view_admin/index_admin.php';
    }
    /////////////////////////////////////////
    //CREATE PRODUCT GET - POST
    public function CreateProductGET()
    {
        include '../view_admin/product_create.php';
    }
    public function CreateProductPOST(Product $p, $listimg)
    {
        if ($this->productService->addProduct($p, $listimg)) {
            include '../view_admin/index_admin.php';
        } else {
            echo "<script>alert('Lỗi thêm vui lòng xem lại thông tin !');</script>";
        }
    }
    /////////////////////////////////////////
}
$adminc = new adminController();

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    // Product Create GET - POST
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
            $adminc->CreateProductPOST($p, $_POST['geturlcloud']);
        }
    }
    // Product Index GET - POST - UPDATE
    if ($controller == "indexProductGET") {
        $result = $adminc->productService->getAllProduct();
        include '../view_admin/product_index.php';
    }
    if ($controller == "indexProductPOST") {

        if (!empty($_POST['searchname'])) {
            $result = $adminc->productService->findName($_POST['searchname']);
            echo gettype($result);
            include '../view_admin/product_index.php';
        } else {
            $result = new Product();
            $result->SetProductID("Không tìm thấy");
            $result->SetProductName("Không tìm thấy");
            $result->SetSeries("Không tìm thấy");
            $result->SetBrand("Không tìm thấy");
            $result->SetNote("Không tìm thấy");
            $result->SetDateRelease("Không tìm thấy");
            $result->SetProductStatus("Không tìm thấy");
            $result->SetPrice("Không tìm thấy");
            $result->SetStock("Không tìm thấy");
            $result->SetInfor("Không tìm thấy");
            include '../view_admin/product_index.php';
        }
    }
    if ($controller == "updateProductGET") {
        $id = $_GET['id'];
        if (!empty($id)) {
            $result = $adminc->productService->findOneId($id);
            include '../view_admin/product_update.php';
        }
    }
    if ($controller == "updateProductPOST") {
        if (
            !empty($_POST['ProductName']) || !empty($_POST['Price']) ||
            !empty($_POST['Series']) || !empty($_POST['Stock'])
        ) {

            $p = new Product();
            $p->SetProductID($_POST['ProductID']);
            $p->SetProductName($_POST['ProductName']);
            $p->SetSeries($_POST['Series']);
            $p->SetBrand($_POST['Brand']);
            $p->SetNote($_POST['Note']);
            $p->SetDateRelease($_POST['DateRelease']);
            $p->SetProductStatus($_POST['ProductStatus']);
            $p->SetPrice((float)$_POST['Price']);
            $p->SetStock((int)$_POST['Stock']);
            $p->SetInfor($_POST['Infor']);
            if (!empty($_POST['geturlcloud'])) {
                // call add new 
            } else {
                if (!empty($_POST['image1'])) {
                    $imgs = new Image();
                    $imgs->SetProductID($_POST['ProductID']);
                    $imgs->SetIDSort("1");
                    $imgs->SetImage($_POST['image1']);
                    $adminc->productService->UpdateOneImage($imgs);
                }
                if (!empty($_POST['image2'])) {
                    $imgs = new Image();
                    $imgs->SetProductID($_POST['ProductID']);
                    $imgs->SetIDSort("2");
                    $imgs->SetImage($_POST['image2']);
                    $adminc->productService->UpdateOneImage($imgs);
                }
                if (!empty($_POST['image3'])) {
                    $imgs = new Image();
                    $imgs->SetProductID($_POST['ProductID']);
                    $imgs->SetIDSort("3");
                    $imgs->SetImage($_POST['image3']);
                    $adminc->productService->UpdateOneImage($imgs);
                }
                if(!empty($_POST['image4'])){
                    $imgs = new Image();
                    $imgs->SetProductID($_POST['ProductID']);
                    $imgs->SetIDSort("4");
                    $imgs->SetImage($_POST['image4']);
                    $adminc->productService->UpdateOneImage($imgs);
                    }
            }


            // echo $_POST['Stock'];
            // echo $_POST['image1'];
            // echo $_POST['image2'];
            // echo $_POST['image3'];
            // echo $_POST['geturlcloud'];
            //$adminc->CreateProductPOST($p, $_POST['geturlcloud']);
        }
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