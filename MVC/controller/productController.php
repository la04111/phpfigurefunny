<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/src/SMTP.php';
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

        if (!isset($_SESSION['cart'])) {
            $quantity = $_POST['quantity'];
        } else {
            $quantity = 1;
        }
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
        $note  = $_POST['note'];

        $_SESSION['customercheckout']['firtnamelastname'] = $firtnamelastname;
        $_SESSION['customercheckout']['email'] = $email;
        $_SESSION['customercheckout']['phonenum'] = $phonenum;
        $_SESSION['customercheckout']['address'] = $address;
        $_SESSION['customercheckout']['note'] = $note;
    }
    public function checkoutPaymentGET()
    {
        include('../views/checkout_payment.php');
    }
    public function checkoutPaymentPOST()
    {
        $firstName = $_SESSION['customercheckout']['firtnamelastname'];
        $email = $_SESSION['customercheckout']['email'];
        $phoneNumber = $_SESSION['customercheckout']['phonenum'];
        $address = $_SESSION['customercheckout']['address'];
        $note = $_SESSION['customercheckout']['note'];

        $newbill = new Bill();
        $tempbillid = $this->billService->getIdaddBill();
        $newbill->SetIDBill($tempbillid);
        $newbill->SetNote($firstName . " - " . $note);

        $newbill->SetAddressdelivery($address);
        $newbill->SetEmailcustomer($email);
        $newbill->SetPhonenum($phoneNumber);
        $totalmoney = 0;
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

            foreach ($_SESSION['cart'] as $item) {
                $totalmoney += $item['price'] * $item['quantity'];
            }
            $newbill->SetTotal($totalmoney);


            if ($this->billService->addBill($newbill) != false) {
                if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => &$item) {
                        $newbilldetail = new BillDetail();
                        $newbilldetail->SetIDBill($tempbillid);
                        $newbilldetail->SetIDProduct($item['idproduct']);
                        $newbilldetail->SetProductname($item['name']);
                        $newbilldetail->SetPrice($item['price']);
                        $newbilldetail->SetQuantity($item['quantity']);
                        $this->billService->addBillDetail($newbilldetail);
                        $updatestock = $this->productService->findOneId($item['idproduct']);
                        $tempupdateproductstock = new Product();
                        $tempupdateproductstock->SetProductID($updatestock['ProductID']);
                        $tempupdateproductstock->SetProductName($updatestock['ProductName']);
                        $tempupdateproductstock->SetSeries($updatestock['Series']);
                        $tempupdateproductstock->SetBrand($updatestock['Brand']);
                        $tempupdateproductstock->SetNote($updatestock['Note']);
                        $tempupdateproductstock->SetDateRelease($updatestock['DateRelease']);
                        $tempupdateproductstock->SetProductStatus($updatestock['ProductStatus']);
                        $tempupdateproductstock->SetPrice($updatestock['Price']);
                        if (((int)$updatestock['Stock'] - (int)$item['quantity']) > 0) {
                            $tempupdateproductstock->SetStock((int)$updatestock['Stock'] - $item['quantity']);
                        } else $tempupdateproductstock->SetStock("0");
                        $tempupdateproductstock->SetInfor($updatestock['Infor']);
                        $this->productService->updateProduct($tempupdateproductstock);
                    }
                }
            }
            $this->sendmailpayment($email, $tempbillid, $firstName);
            unset($_SESSION['cart']);
            unset($_SESSION['customercheckout']);
            $_SESSION['tempidbill'] = $tempbillid;
        }
    }
    //SEND MAIL  PAYMENT 
    public function sendmailpayment($email, $idbill, $namecustomer)
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
            $mail->Subject = 'Thông báo xác nhận đơn hàng #' . $idbill . ''; // tieu de
            //

            $mail->CharSet = 'UTF-8';
            //
            $bodys = "<div class=''>
            <div class='aHl'></div>
            <div id=':o8' tabindex='-1'></div>
            <div id=':nk' class='ii gt'
                jslog='20277; u014N:xr6bB; 1:WyIjdGhyZWFkLWY6MTc2MDE2NDkxMzcxNDg1NDc4OSIsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsW11d; 4:WyIjbXNnLWY6MTc2MDE2NDkxMzcxNDg1NDc4OSIsbnVsbCxbXV0.'>
                <div id=':ml' class='a3s aiL '><u></u>
        
                    <div style='margin:0'>
                        <table style='border-spacing:0;border-collapse:collapse;height:100%!important;width:100%!important'>
                            <tbody>
                                <tr>
                                    <td
                                        style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                        <table style='border-spacing:0;border-collapse:collapse;width:100%;margin:40px 0 20px'>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                        <center>
                                                            <table
                                                                style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                            <table
                                                                                style='border-spacing:0;border-collapse:collapse;width:100%'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
        
                                                                                            <h1
                                                                                                style='font-weight:normal;margin:0;font-size:30px;color:#333'>
                                                                                                <a href='/MVC/controller/productController.php'
                                                                                                    style='font-size:30px;text-decoration:none;color:#333'
                                                                                                    target='_blank'
                                                                                                    data-saferedirecturl='https://www.google.com/url?q=/MVC/controller/productController.php&amp;source=gmail&amp;ust=1678788291560000&amp;usg=AOvVaw0-IXM5b_47qVRbUf9Glb8o'>Figure Funny Order
                                                                                                    </a>
                                                                                            </h1>
        
                                                                                        </td>
                                                                                        <td
                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-transform:uppercase;font-size:14px;text-align:right;color:#999'>
                                                                                            <span style='font-size:16px'>
                                                                                                Đơn hàng #" . $idbill . "
                                                                                            </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style='border-spacing:0;border-collapse:collapse;width:100%'>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px'>
                                                        <center>
                                                            <table
                                                                style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                            <h2
                                                                                style='font-weight:normal;margin:0;font-size:24px;margin-bottom:10px'>
                                                                                Cám ơn bạn đã mua hàng! </h2>
                                                                            <p
                                                                                style='margin:0;color:#777;line-height:150%;font-size:16px'>
                                                                                Xin chào " . $namecustomer . ", Chúng tôi đã nhận được đặt hàng
                                                                                của bạn và đã sẵn sàng để vận chuyển. Chúng tôi
                                                                                sẽ thông báo cho bạn khi đơn hàng được gửi đi.
                                                                            </p>
        
                                                                            <table
                                                                                style='border-spacing:0;border-collapse:collapse;width:100%;margin-top:20px'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                                            <table
                                                                                                style='border-spacing:0;border-collapse:collapse;float:left;margin-right:15px'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                        
                                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:center;padding:20px 25px;border-radius:4px;background:#1666a2'>
                                                                                                            <a href='https://ryorder.vn/account/orders/c1bb40e6464648b48b5ded0e50e13d35'
                                                                                                                style='font-size:16px;text-decoration:none;color:#fff'
                                                                                                                target='_blank'
                                                                                                                data-saferedirecturl='https://www.google.com/url?q=https://ryorder.vn/account/orders/c1bb40e6464648b48b5ded0e50e13d35&amp;source=gmail&amp;ust=1678788291560000&amp;usg=AOvVaw31f9eJ9keDyqbtRuNLv5hL'>Xem chua lam
                                                                                                                đơn hàng</a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
        
                                                                                            <table
                                                                                                style='border-spacing:0;border-collapse:collapse;margin-top:19px'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                                                            <a href='/MVC/controller/productController.php'
                                                                                                                style='font-size:16px;text-decoration:none;color:#1666a2'
                                                                                                                target='_blank'
                                                                                                                data-saferedirecturl='https://www.google.com/url?q=MVC/controller/productController.php&amp;source=gmail&amp;ust=1678788291560000&amp;usg=AOvVaw0-IXM5b_47qVRbUf9Glb8o'><span
                                                                                                                    style='font-size:16px;color:#999;display:inline-block;margin-right:10px'>hoặc</span>
                                                                                                                Đến cửa hàng của
                                                                                                                chúng tôi</a>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
        
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
        
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table
                                            style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:40px 0'>
                                                        <center>
                                                            <table
                                                                style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                            <h3
                                                                                style='font-weight:normal;margin:0;font-size:20px;margin-bottom:25px'>
                                                                                Thông tin đơn hàng</h3>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table
                                                                style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                            <table
                                                                                style='border-spacing:0;border-collapse:collapse;width:100%'>
        
        
        
        
                                                                                <tbody>
                                                                                    <tr
                                                                                        style='width:100%;border-bottom:none!important'>
                                                                                        <td
                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:15px 0;padding-top:0!important;padding-bottom:0!important'>
                                                                                            <table
                                                                                                style='border-spacing:0;border-collapse:collapse'>
                                                                                                <tbody>
                                                                                                ";
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $itemcart) {
                    $bodys .= "  <tr>
                    <td
                        style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
     
                        <img src='" . $itemcart['image'] . "'
                            align='left'
                            width='60'
                            height='60'
                            style='margin-right:15px;border:1px solid #e5e5e5;border-radius:8px;object-fit:contain'
                            class='CToWUd'
                            data-bit='iit'>

                    </td>
                    <td
                        style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;width:100%'>




                        <span
                            style='font-size:16px;font-weight:600;line-height:1.4;color:#555'>" . $itemcart['name'] . " ×
                            " . $itemcart['quantity'] . "</span><br>

                    </td>
                    <td
                        style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;white-space:nowrap'>

                        <p
                            style='margin:0;color:#555;line-height:150%;font-size:16px;font-weight:600;text-align:right;margin-left:15px'>
                            " . number_format($itemcart['quantity'] * $itemcart['price'], 0, '.', '.') . 'đ' . "</p>
                    </td>
                </tr>";
                }
            }

            $bodys .= " </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
        
                                                                                </tbody>
                                                                            </table>
                                                                            <table
                                                                                style='border-spacing:0;border-collapse:collapse;width:100%;margin-top:15px;border-top:1px solid #e5e5e5'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;width:40%'>
                                                                                        </td>
                                                                                        <td
                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                                            <table
                                                                                                style='border-spacing:0;border-collapse:collapse;width:100%;margin-top:20px'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                                                            <p
                                                                                                     style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                                                <span
                                                                                                                    style='font-size:16px'>Tổng
                                                                                                                    giá trị sản
                                                                                                                    phẩm</span>
                                                                                                            </p>
                                                                                                        </td>
                                                                                                        <td
                                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                                                            <strong
                                                                                                                style='font-size:16px;color:#555'>";
            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                $totalmoney = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $totalmoney += $item['price'] * $item['quantity'];
                }
            }
            $bodys .= " " . number_format($totalmoney, 0, '.', '.') . 'đ' . "</strong>
                                                                                                        </td>
                                                                                                    </tr>
        
        
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                                                            <p
                                                                                                                style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                                                <span
                                                                                                                    style='font-size:16px'>Khuyến
                                                                                                                    mãi </span>
                                                                                                            </p>
                                                                                                        </td>
                                                                                                        <td
                                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                                                            <strong
                                                                                                                style='font-size:16px;color:#555'>0₫</strong>
                                                                                                        </td>
                                                                                                    </tr>
        
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                                                            <p
                                                                                                                style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                                                <span
                                                                                                                    style='font-size:16px'>Phí
                                                                                                                    vận
                                                                                                                    chuyển</span>
                                                                                                            </p>
                                                                                                        </td>
                                                                                                        <td
                                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                                                            <strong
                                                                                                                style='font-size:16px;color:#555'>0₫</strong>
                                                                                                        </td>
                                                                                                    </tr>
        
        
                                                                                                </tbody>
                                                                                            </table>
                                                                                            <table
                                                                                                style='border-spacing:0;border-collapse:collapse;width:100%;margin-top:20px;border-top:2px solid #e5e5e5'>
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:20px 0 0'>
                                                                                                            <p
                                                                                                                style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                                                <span
                                                                                                                    style='font-size:16px'>Tổng
                                                                                                                    cộng</span>
                                                                                                            </p>
                                                                                                        </td>
                                                                                                        <td
                                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:20px 0 0'>
                                                                                                            <strong
                                                                                                                style='font-size:24px;color:#555'>" . number_format($totalmoney, 0, '.', '.') . 'VND' . "
                                                                                                                </strong>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
        
        
        
                                                                                        </td>
                                                                                    </tr>
                                                                                    
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table
                                            style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:40px 0'>
                                                        <center>
                                                            <table
                                                                style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                            <h3
                                                                                style='font-weight:normal;margin:0;font-size:20px;margin-bottom:25px'>
                                                                                Thông tin khách hàng</h3>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <table
                                                                style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                            <table
                                                                                style='border-spacing:0;border-collapse:collapse;width:100%'>
                                                                                <tbody>
                                                                                    <tr>
        
        
                                                                                        <td
                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px;width:50%'>
                                                                                            <h4
                                                                                                style='font-weight:500;margin:0;font-size:16px;color:#555;margin-bottom:5px'>
                                                                                                Địa chỉ thanh toán</h4>
                                                                                            <p
                                                                                                style='margin:0;color:#777;line-height:150%;font-size:16px'>
                                                                                                <br>
        
        
                                                                                                <br>,Hutech CNC
                                                                                            </p>
                                                                                        </td>
        
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table
                                                                                style='border-spacing:0;border-collapse:collapse;width:100%'>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td
                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px;width:50%'>
                                                                                            <h4
                                                                                                style='font-weight:500;margin:0;font-size:16px;color:#555;margin-bottom:5px'>
                                                                                                Phương thức vận chuyển</h4>
        
                                                                                        </td>
                                                                                        <td
                                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding-bottom:40px;width:50%'>
                                                                                            <h4
                                                                                                style='font-weight:500;margin:0;font-size:16px;color:#555;margin-bottom:5px'>
                                                                                                Phương thức thanh toán</h4>
                                                                                            <p
                                                                                                style='margin:0;color:#777;line-height:150%;font-size:16px'>
                                                                                                Chuyển khoản qua ngân hàng</p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table
                                            style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:35px 0'>
                                                        <center>
                                                            <table
                                                                style='border-spacing:0;border-collapse:collapse;width:560px;text-align:left;margin:0 auto'>
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
                                                                            <p
                                                                                style='margin:0;color:#999;line-height:150%;font-size:14px'>
                                                                                Nếu bạn có bất cứ câu hỏi nào, đừng ngần ngại
                                                                                liên lạc với chúng tôi tại <a
                                                                                    href='mailto:longan04111@gmail.com'
                                                                                    style='font-size:14px;text-decoration:none;color:#1666a2'
                                                                                    target='_blank'>longan04111@gmail.com</a>
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <img src='https://ci4.googleusercontent.com/proxy/AkPYSwbfCTPpa9UY2iemTt-8uuNCxd9wMi-MxiDXCwCclRn4IrvavPQy53Rok8pDmYePvpYw7glbcjctupZqDJjD9WVBMoR1vQ=s0-d-e1-ft#http://hstatic.net/0/0/global/notifications/spacer.png'
                                            height='0' style='min-width:600px;height:0' class='CToWUd' data-bit='iit'>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <center>
                            <p style='margin:0;color:#777;line-height:150%;font-size:16px'><a
                                    style='font-size:10px;text-decoration:none;color:#999'
                                    href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                                    target='_blank'
                                    data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1678788291560000&amp;usg=AOvVaw15-1ab77CLBqIiYHG-axnK'>powered
                                    by Haravan</a></p><a style='font-size:10px;text-decoration:none;color:#999'
                                href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                                target='_blank'
                                data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1678788291560000&amp;usg=AOvVaw15-1ab77CLBqIiYHG-axnK'>
                            </a>
                        </center><a style='font-size:10px;text-decoration:none;color:#999'
                            href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                            target='_blank'
                            data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1678788291560000&amp;usg=AOvVaw15-1ab77CLBqIiYHG-axnK'>
        
                        </a>
                    </div>
                </div>
                <div class='yj6qo'></div>
            </div>
            <div id=':oc' class='ii gt' style='display:none'>
                <div id=':od' class='a3s aiL '></div>
            </div>
            <div class='hi'></div>
        </div>"; //body
            $mail->Body = $bodys;
            $mail->isHTML(true);

            //Send the message, check for errors
            if (!$mail->send()) {
                // $_SESSION['error_message'] = "123";
            } else {
                // $_SESSION['error_message'] = "Kiểm tra lại thông tin đăng ký hoặc Email đã tồn tại trong hệ thống.";
            }
        } catch (Exception $e) {

            echo "Error encountered: " . $mail->ErrorInfo;
        }
    }
    // THANKS YOU
    public function ThankYou()
    {
        if (empty($_SESSION['thankyou']) || !isset($_SESSION['thankyou'])) {
            $_SESSION['thankyou'] = array();
        } else unset($_SESSION['thankyou']);

        $id = $_SESSION['tempidbill'];
        $getlistdetailbill = $this->billService->getBillDetail($id);
        $getinforbill = $this->billService->getBill($id);

        foreach ($getlistdetailbill as $document) {
            $new_item = array(
                //   'idbill' => $temp_idbillcart,
                'idproduct' => $document['idproduct'],
                'name' => $document['productname'],
                'price' => $document['price'],
                'image' => $this->productService->findOneImageIdProduct($document['idproduct']),
                'quantity' => $document['quantity']
                // 'note' => $notecart,
                //'datebuy' => date('d/m/Y H:i:s'),
                // 'addressdelivery' => $addressdelivery,
                // 'emailcustomer' => $customer_cart['email'],
                //'phonenum' => $customer_cart['phonenum']

            );
            $_SESSION['thankyou'][] = $new_item;
        }

        include('../views/thank_you.php');
    }
    //SEARCH GET POST
    public function SearchProduct()
    {
        $searchcontent = $_GET['searchproduct'];
        $limit = 10;
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $start = ($page - 1) * $limit;
        $counts = $this->productService->findName($searchcontent);

        $count = 0;
        foreach ($counts as $document) {
            $count++;
        }

        $total_pages = ceil((float)$count / (float)$limit);

        $result_search = $this->productService->findNameSearch($searchcontent, $start, $limit);



        include '../views/search_product.php';
    }
} //test
$classproduct = new productController();
//else    $classproduct->getAllProductIndex();
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
    if ($controller == "ThankYou") {
        $classproduct->ThankYou();
    }
} else {
    //SEARCH
    if (isset($_GET['searchproduct'])) {
        $classproduct->SearchProduct();
    } else $classproduct->getAllProductIndex();
}



  

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
