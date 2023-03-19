<?php
require_once('../model/productclass.php');
require_once('../model/productService.php');
require_once('../model/billService.php');
class adminController
{

    public $productService;
    public $billService;
    public function __construct()
    {
        $this->productService = new ProductService();
        $this->billService = new billService();
    }
    // Index
    public function LoadIndex()
    {
        $countbilltoday = $this->billService->countBilltoday();
        $countstock = $this->billService->countStock();
        $countbillwait = $this->billService->countBillwait();
        $top5 = $this->billService->bestsellertop5();
        $idtemp = 0;
        foreach ($top5 as $row) {
            $_SESSION['topseller' . $idtemp] = $this->productService->findOneId($row['_id'])['ProductName'];
            $_SESSION['quantityseller' . $idtemp] = $row['quantity'];
            $idtemp++;
        }

        for ($id = $idtemp; $id < 5; $id++) {
            //echo $id;
            $_SESSION['topseller' . $id] = "";
            $_SESSION['quantityseller' . $id] = 0;
        }


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
            // $result = $this->productService->getAllProduct();
            // include '../view_admin/product_index.php';
            $url = "/MVC/controller/adminController.php?controller=indexProductGET";
            header("Location: " . $url);
        } else {
            echo "<script>alert('Lỗi thêm vui lòng xem lại thông tin !');</script>";
        }
    }
    public function UpdateProduct()
    {
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

        $this->productService->updateProduct($p);

        if (!empty($_POST['geturlcloud'])) {
            // call add new 
            $this->productService->UpdateListImage($_POST['ProductID'], $_POST['geturlcloud']);
        } else {
            if (!empty($_POST['image1'])) {
                $imgs = new Image();
                $imgs->SetProductID($_POST['ProductID']);
                $imgs->SetIDSort("1");
                $imgs->SetImage($_POST['image1']);
                $this->productService->UpdateOneImage($imgs);
            }
            if (!empty($_POST['image2'])) {
                $imgs = new Image();
                $imgs->SetProductID($_POST['ProductID']);
                $imgs->SetIDSort("2");
                $imgs->SetImage($_POST['image2']);
                $this->productService->UpdateOneImage($imgs);
            }
            if (!empty($_POST['image3'])) {
                $imgs = new Image();
                $imgs->SetProductID($_POST['ProductID']);
                $imgs->SetIDSort("3");
                $imgs->SetImage($_POST['image3']);
                $this->productService->UpdateOneImage($imgs);
            }
            if (!empty($_POST['image4'])) {
                $imgs = new Image();
                $imgs->SetProductID($_POST['ProductID']);
                $imgs->SetIDSort("4");
                $imgs->SetImage($_POST['image4']);
                $this->productService->UpdateOneImage($imgs);
            }
        }
    }
    public function SetProduct()
    {
        $tempID = (int)$this->productService->getIdadd();
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
        return $p;
    }
    public function SearchNotFound()
    {
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
    /////////////////////////////////////////
    // Bill
    public function BillIndex()
    {

        if (!isset($_POST['searchname'])) {
            $search = "";
        } else
            $search = $_POST['searchname'];
        $result = $this->billService->searchBillwithIDorEmail($search);

        include '../view_admin/bill_index.php';
    }

    // Bill Infor 
    public function BillInfor()
    {
        $inforbill = $this->billService->getBill($_GET['id']);
        $inforbilldetail = $this->billService->getBillDetail($_GET['id']);
        // foreach ($inforbilldetail as $i) {
        //     echo $i['idproduct'];
        // }
        include '../view_admin/bill_invoice.php';
    }
    // Bill not accept
    public function denyBill()
    {
        $inforbill = $this->billService->getBill($_GET['id']);
        $bill = new Bill();
        $bill->SetIDBill($inforbill['idbill']);
        $bill->SetNote($inforbill['note']);
        $bill->SetDateBuy($inforbill['datebuy']);
        $bill->SetAddressdelivery($inforbill['addressdelivery']);
        $bill->SetEmailcustomer($inforbill['emailcustomer']);
        $bill->SetPhonenum($inforbill['phonenum']);
        $bill->SetTotal($inforbill['totalbill']);
        $bill->SetStatus('Huỷ');
        $this->billService->updateBill($bill);
        $url = "/MVC/controller/adminController.php?controller=billindex";
            header("Location: " . $url);
    }
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

            $adminc->CreateProductPOST($adminc->SetProduct(), $_POST['geturlcloud']);
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
            include '../view_admin/product_index.php';
        } else {
            if ($_POST['searchname'] != "") {
                $adminc->SearchNotFound();
            } else {
                $result = $adminc->productService->getAllProduct();
                include '../view_admin/product_index.php';
            }
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

            $adminc->updateProduct();

            $result = $adminc->productService->getAllProduct();
            include '../view_admin/product_index.php';
        } else {
            $result = $adminc->productService->findOneId($_POST('ProductID'));
            include '../view_admin/product_update.php';
        }
    }
    if ($controller == "billindex") {
        $adminc->BillIndex();
    }
    if ($controller == "BillInfor") {
        $adminc->BillInfor();
    }
} else   $adminc->LoadIndex();
