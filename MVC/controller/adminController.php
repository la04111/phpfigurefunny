<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/src/SMTP.php';

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
    //Bill wait accept
    public function BillWait()
    {
        if (!isset($_POST['searchname'])) {
            $search = "";
        } else
            $search = $_POST['searchname'];
        $result = $this->billService->searchBillwithIDorEmailWait($search);

        include '../view_admin/bill_wait.php';
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
        $this->maildeny($inforbill['emailcustomer'],$inforbill['idbill'],$inforbill['totalbill']);
        $url = "/MVC/controller/adminController.php?controller=billindex";
        header("Location: " . $url);
    }
    public function maildeny($email, $idbill,$totalbill)
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
            $mail->Subject = '[Figure Funny]Thông báo hủy đơn hàng #' . $idbill . ''; // tieu de
            //

            $mail->CharSet = 'UTF-8';
            //
            $bodys = "<div id=':b2' class='a3s aiL '><u></u>

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
                                                      <table style='border-spacing:0;border-collapse:collapse;width:100%'>
                                                         <tbody>
                                                            <tr>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
         
                                                                  <h1
                                                                     style='font-weight:normal;margin:0;font-size:30px;color:#333'>
                                                                     <a href='#'
                                                                        style='font-size:30px;text-decoration:none;color:#333'
                                                                        target='_blank'
                                                                        data-saferedirecturl='https://www.google.com/url?q=#&amp;source=gmail&amp;ust=1679302932953000&amp;usg=AOvVaw2tnb94L781s-iM8TyXhiEg'>Fingure
                                                                        Funny</a>
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
                                                      <h2 style='font-weight:normal;margin:0;font-size:24px;margin-bottom:10px'>
                                                         Đơn hàng của bạn đã hủy</h2>
                                                      <p style='margin:0;color:#777;line-height:150%;font-size:16px'>
                                                         Đơn hàng #" . $idbill . " đã được hủy
         
                                                         bởi vì chúng tôi nghi ngờ đây là gian lận
         
         
                                                         .
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
                           <table style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
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
                                                      <h3 style='font-weight:normal;margin:0;font-size:20px;margin-bottom:25px'>
                                                         Các sản phẩm hoàn lại</h3>
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
                                                      <table style='border-spacing:0;border-collapse:collapse;width:100%'>
        
                                                         <tbody>";

                                                         $getlist =$this->billService->getBillDetail($idbill);
                                                         foreach($getlist as $p){
                                                         $bodys .=   "<tr style='width:100%;border-bottom:1px solid #e5e5e5'>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:15px 0;padding-top:0!important'>
                                                                  <table style='border-spacing:0;border-collapse:collapse'>
                                                                     <tbody>
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
         
                                                                              <img
                                                                                 src='".$this->productService->findOneImageIdProduct($p['idproduct'])."'
                                                                                 align='left' width='60' height='60'
                                                                                 style='margin-right:15px;border:1px solid #e5e5e5;border-radius:8px;object-fit:contain'
                                                                                 class='CToWUd' data-bit='iit'>
         
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;width:100%'>
         
         
         
         
                                                                              <span
                                                                                 style='font-size:16px;font-weight:600;line-height:1.4;color:#555'>".$p['productname']." × ".$p['quantity']."</span><br>
         
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;white-space:nowrap'>
         
                                                                              <p
                                                                                 style='margin:0;color:#555;line-height:150%;font-size:16px;font-weight:600;text-align:right;margin-left:15px'>
                                                                                 ".number_format($p["price"]*$p["quantity"], 0, ',', '.') . " VND"."</p>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>";
                                                         }
         
         
         
         
         
                                                      $bodys .="   </tbody>
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
                                                                                 <span style='font-size:16px'>Tổng giá trị sản
                                                                                    phẩm</span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                              <strong
                                                                                 style='font-size:16px;color:#555'>".number_format($totalbill, 0, ',', '.') . " VND"."</strong>
                                                                           </td>
                                                                        </tr>
         
         
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                              <p
                                                                                 style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                 <span style='font-size:16px'>Khuyến mãi </span>
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
                                                                                 <span style='font-size:16px'>Phí vận
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
                                                                                 <span style='font-size:16px'>Tổng cộng</span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:20px 0 0'>
                                                                              <strong style='font-size:24px;color:#555'>".number_format($totalbill, 0, ',', '.') . " VND"."</strong>
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
                           <table style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
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
                                                      <p style='margin:0;color:#999;line-height:150%;font-size:14px'>Nếu bạn có
                                                         bất cứ câu hỏi nào, đừng ngần ngại liên lạc với chúng tôi tại <a
                                                            href='mailto:longan04111@gmail.com'
                                                            style='font-size:14px;text-decoration:none;color:#1666a2'
                                                            target='_blank'>longan04111@gmail.com</a></p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <img
                              src='https://ci4.googleusercontent.com/proxy/AkPYSwbfCTPpa9UY2iemTt-8uuNCxd9wMi-MxiDXCwCclRn4IrvavPQy53Rok8pDmYePvpYw7glbcjctupZqDJjD9WVBMoR1vQ=s0-d-e1-ft#http://hstatic.net/0/0/global/notifications/spacer.png'
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
                        data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>powered
                        by Haravan</a></p><a style='font-size:10px;text-decoration:none;color:#999'
                     href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                     target='_blank'
                     data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>
                  </a>
               </center><a style='font-size:10px;text-decoration:none;color:#999'
                  href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                  target='_blank'
                  data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>
         
               </a>
            </div>
         </div>";
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
    public function mailaccept($email, $idbill,$totalbill)
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
            $mail->Subject = '[Figure Funny]Thông báo đơn hàng đã được phê duyệt #' . $idbill . ''; // tieu de
            //

            $mail->CharSet = 'UTF-8';
            //
            $bodys = "<div id=':b2' class='a3s aiL '><u></u>

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
                                                      <table style='border-spacing:0;border-collapse:collapse;width:100%'>
                                                         <tbody>
                                                            <tr>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
         
                                                                  <h1
                                                                     style='font-weight:normal;margin:0;font-size:30px;color:#333'>
                                                                     <a href='#'
                                                                        style='font-size:30px;text-decoration:none;color:#333'
                                                                        target='_blank'
                                                                        data-saferedirecturl='https://www.google.com/url?q=#&amp;source=gmail&amp;ust=1679302932953000&amp;usg=AOvVaw2tnb94L781s-iM8TyXhiEg'>Fingure
                                                                        Funny</a>
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
                                                      <h2 style='font-weight:normal;margin:0;font-size:24px;margin-bottom:10px'>
                                                         Đơn hàng của bạn đã được duyệt </h2>
                                                      <p style='margin:0;color:#777;line-height:150%;font-size:16px'>
                                                         Đơn hàng #" . $idbill . " đã được xác nhận là hợp lệ.
         
         
                                                         .
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
                           <table style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
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
                                                      <h3 style='font-weight:normal;margin:0;font-size:20px;margin-bottom:25px'>
                                                         Các sản phẩm đã đặt</h3>
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
                                                      <table style='border-spacing:0;border-collapse:collapse;width:100%'>
        
                                                         <tbody>";

                                                         $getlist =$this->billService->getBillDetail($idbill);
                                                         foreach($getlist as $p){
                                                         $bodys .=   "<tr style='width:100%;border-bottom:1px solid #e5e5e5'>
                                                               <td
                                                                  style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:15px 0;padding-top:0!important'>
                                                                  <table style='border-spacing:0;border-collapse:collapse'>
                                                                     <tbody>
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif'>
         
                                                                              <img
                                                                                 src='".$this->productService->findOneImageIdProduct($p['idproduct'])."'
                                                                                 align='left' width='60' height='60'
                                                                                 style='margin-right:15px;border:1px solid #e5e5e5;border-radius:8px;object-fit:contain'
                                                                                 class='CToWUd' data-bit='iit'>
         
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;width:100%'>
         
         
         
         
                                                                              <span
                                                                                 style='font-size:16px;font-weight:600;line-height:1.4;color:#555'>".$p['productname']." × ".$p['quantity']."</span><br>
         
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;white-space:nowrap'>
         
                                                                              <p
                                                                                 style='margin:0;color:#555;line-height:150%;font-size:16px;font-weight:600;text-align:right;margin-left:15px'>
                                                                                 ".number_format($p["price"]*$p["quantity"], 0, ',', '.') . " VND"."</p>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>";
                                                         }
         
         
         
         
         
                                                      $bodys .="   </tbody>
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
                                                                                 <span style='font-size:16px'>Tổng giá trị sản
                                                                                    phẩm</span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:5px 0'>
                                                                              <strong
                                                                                 style='font-size:16px;color:#555'>".number_format($totalbill, 0, ',', '.') . " VND"."</strong>
                                                                           </td>
                                                                        </tr>
         
         
                                                                        <tr>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;padding:5px 0'>
                                                                              <p
                                                                                 style='margin:0;color:#777;line-height:1.2em;font-size:16px'>
                                                                                 <span style='font-size:16px'>Khuyến mãi </span>
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
                                                                                 <span style='font-size:16px'>Phí vận
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
                                                                                 <span style='font-size:16px'>Tổng cộng</span>
                                                                              </p>
                                                                           </td>
                                                                           <td
                                                                              style='font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,&quot;Roboto&quot;,&quot;Oxygen&quot;,&quot;Ubuntu&quot;,&quot;Cantarell&quot;,&quot;Fira Sans&quot;,&quot;Droid Sans&quot;,&quot;Helvetica Neue&quot;,sans-serif;text-align:right;padding:20px 0 0'>
                                                                              <strong style='font-size:24px;color:#555'>".number_format($totalbill, 0, ',', '.') . " VND"."</strong>
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
                           <table style='border-spacing:0;border-collapse:collapse;width:100%;border-top:1px solid #e5e5e5'>
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
                                                      <p style='margin:0;color:#999;line-height:150%;font-size:14px'>Nếu bạn có
                                                         bất cứ câu hỏi nào, đừng ngần ngại liên lạc với chúng tôi tại <a
                                                            href='mailto:longan04111@gmail.com'
                                                            style='font-size:14px;text-decoration:none;color:#1666a2'
                                                            target='_blank'>longan04111@gmail.com</a></p>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </center>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <img
                              src='https://ci4.googleusercontent.com/proxy/AkPYSwbfCTPpa9UY2iemTt-8uuNCxd9wMi-MxiDXCwCclRn4IrvavPQy53Rok8pDmYePvpYw7glbcjctupZqDJjD9WVBMoR1vQ=s0-d-e1-ft#http://hstatic.net/0/0/global/notifications/spacer.png'
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
                        data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>powered
                        by Haravan</a></p><a style='font-size:10px;text-decoration:none;color:#999'
                     href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                     target='_blank'
                     data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>
                  </a>
               </center><a style='font-size:10px;text-decoration:none;color:#999'
                  href='https://www.haravan.com/?utm_campaign=poweredby&amp;utm_medium=haravan&amp;utm_source=email'
                  target='_blank'
                  data-saferedirecturl='https://www.google.com/url?q=https://www.haravan.com/?utm_campaign%3Dpoweredby%26utm_medium%3Dharavan%26utm_source%3Demail&amp;source=gmail&amp;ust=1679302932954000&amp;usg=AOvVaw1eGgtDWuNJ-SjWDGbasF7-'>
         
               </a>
            </div>
         </div>";
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
    public function AcceptBill()
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
        $bill->SetStatus('Đã xử lý');
        $this->billService->updateBill($bill);
        $this->mailaccept($inforbill['emailcustomer'],$inforbill['idbill'],$inforbill['totalbill']);
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
    if ($controller == "denyBill") {
        $adminc->denyBill();
    }
    if ($controller == "acceptBill") {
        $adminc->AcceptBill();
    }
    if ($controller == "billwait") {
        $adminc->BillWait();
    }
} else   $adminc->LoadIndex();
