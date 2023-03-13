<?php


// require_once(__DIR__ . '/../model/productclass.php');

// require_once(__DIR__ . '/../model/productService.php');
// require_once(__DIR__.'/../../phpconnectmongodb.php');
require_once('../model/productclass.php');
require_once('../model/productService.php');
require_once('../model/billclass.php');
require_once('../model/billService.php');
class productController
{
    public $productService;
    public $billService;
    public function __construct()
    {
        $this->productService = new ProductService();
        $this->billService = new billService();
    }
    public function getAllProductIndex()
    {
        $result_List = $this->productService->getAllProduct();
        include('../views/index.php');
    }
    public function productDetailId($id)
    {
        $result_productId = $this->productService->findOneId($id);
        include('../views/product_detail.php');
    }
    //CART GET - POST
    public function addProductCartPOST()
    {
        //if not login {}
        //$customer_cart = $_SESSION['accountuser'];
        $product_idcart = $_GET['id'];
        $quantity = $_POST['quantity'];
        // $notecart = $_POST['note'];
        // $addressdelivery = $_POST['addressdelivery'];
        if (empty($_SESSION['cart']) || !isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        // Check if item already exists in cart, and add or update quantity accordingly
        $item_found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['idproduct'] == $product_idcart) {
                $item_found = true;
                $item['quantity'] += $quantity;
            }
        }
        $findproductcart = $this->productService->findOneId($product_idcart);

        //$temp_idbillcart = $this->billService->getIdaddBill();
        // If item not found, add it to cart
        if (!$item_found) {
            $new_item = array(
                //   'idbill' => $temp_idbillcart,
                'idproduct' => $findproductcart['ProductID'],
                'name' => $findproductcart['ProductName'],
                'price' => $findproductcart['Price'],
                'image' => $this->productService->findOneImageIdProduct($findproductcart['ProductID']),
                'quantity' => $quantity
                // 'note' => $notecart,
                //'datebuy' => date('d/m/Y H:i:s'),
                // 'addressdelivery' => $addressdelivery,
                // 'emailcustomer' => $customer_cart['email'],
                //'phonenum' => $customer_cart['phonenum']

            );
            $_SESSION['cart'][] = $new_item;

            // $total = 0.0;
            // foreach ($_SESSION['cart'] as $item) {
            //     $total += $item['price'] * $item['quantity'];
            //   }

            // $url = '/MVC/controller/productController.php?controller=productDetailId&value='.$findproductcart['ProductID'];
            // header("Location: " . $url);
            //exit();

        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    public function RemoveCart()
    {
        $product_idcartremove = $_GET['id'];
        foreach ($_SESSION['cart'] as $key => &$item) {
            if ($item['idproduct'] == $product_idcartremove) {
                unset($_SESSION['cart'][$key]);
            }
        }

        $url = '/MVC/controller/productController.php?controller=productDetailId&value=' . $product_idcartremove;
        header("Location: " . $url);
        exit();
    }
    //INDEX UPDATE CART GET - POST
    public function indexCartGET()
    {
        include('../views/index_cart.php');
    }
    public function updateCart()
    {
        foreach ($_SESSION['cart'] as &$item) {
            $product_idcart = $_POST['product_id'];
            $quantity = $_POST['quantity'];
            if ($item['idproduct'] == $product_idcart) {
                if ((int)$quantity > 0) {
                    $item['quantity'] = $quantity;
                } else   $item['quantity'] = 1;
                header("Location: " . $_SERVER['HTTP_REFERER']);
                break; //exit the loop since item is found
            }
        }
    }

    public function UpdateCartRemove()
    {
        $product_idcartremove = $_GET['id'];
        foreach ($_SESSION['cart'] as $key => &$item) {
            if ($item['idproduct'] == $product_idcartremove) {
                unset($_SESSION['cart'][$key]);
            }
        }
        $url = '/MVC/controller/productController.php?controller=indexCartGET';
        header("Location: " . $url);
    }
    //CHECKOUT CART
    public function checkoutCart()
    {
        include('../views/checkout_cart.php');
    }
    public function checkoutCartPOST()
    {
        $firtnamelastname = $_POST['firtnamelastname'];
        $email = $_POST['email'];
        $phonenum = $_POST['phonenum'];
        $address = $_POST['address'];

        $_SESSION['customercheckout']['firtnamelastname'] = $firtnamelastname;
        $_SESSION['customercheckout']['email'] = $email;
        $_SESSION['customercheckout']['phonenum'] = $phonenum;
        $_SESSION['customercheckout']['address'] = $address;
    }
    public function checkoutPaymentGET()
    {
        include('../views/checkout_payment.php');
    }
    public function checkoutPaymentPOST()
    {
       
    }
} //test
$classproduct = new productController();
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];

    if ($controller == "productDetailId") {
        $value = $_GET['value'];
        $classproduct->productDetailId($value);
    }
    if ($controller == "addProductCartPOST") {
        $classproduct->addProductCartPOST();
    }
    //
    if ($controller == "RemoveCart") {
        $classproduct->RemoveCart();
    }
    if ($controller == "indexCartGET") {
        $classproduct->indexCartGET();
    }
    //UPDATE CART/  REMOVE CART
    if ($controller == "UpdateCartRemove") {
        $classproduct->UpdateCartRemove();
    }
    if ($controller == "updateCart") {
        $classproduct->updateCart();
    }
    //CHECKOUT 
    if ($controller == "checkoutCart") {
        $classproduct->checkoutCart();
    }
    if ($controller == "checkoutCartPOST") {
        $classproduct->checkoutCartPOST();
    }
    if ($controller == "checkoutPaymentGET") {
        $classproduct->checkoutPaymentGET();
    }
    if ($controller == "checkoutPaymentPOST") {
        $classproduct->checkoutPaymentPOST();
    }
} else   $classproduct->getAllProductIndex();


  

// foreach ($result as $document) {
//     echo 'ProductID: ' . $document['ProductID'] . '<br>';
//     echo 'ProductName: ' . $document['ProductName'] . '<br>';
//     echo 'Series: ' . $document['Series'] . '<br>';
//     echo 'Brand: ' . $document['Brand'] . '<br>';
//     echo 'Note: ' . $document['Note'] . '<br>';

//     echo 'DateRelease: ' . $document['DateRelease'] . '<br>';
//     echo 'ProductStatus: ' . $document['ProductStatus'] . '<br><br>';
// }
// $controller = new productController();
// $controller->getAllProductIndex();

// $productService = new productService();
//   $products  =new Product();
//   $products->SetProductID("33");
//   $products->SetProductName("hí hí");
//   $products->SetSeries("Honkai");
//   $products->SetBrand("Hoyo");
//   $products->SetDateRelease("2023");
//   $products->SetProductStatus("Good");
//   $products->SetPrice("3");
//   $products->SetStock("100");
//   $products->SetImage("3");
//   $productService->addProduct($products);
// <a href="http://localhost:3000/views/user/testPost.php?id=hehe">Post</a>
