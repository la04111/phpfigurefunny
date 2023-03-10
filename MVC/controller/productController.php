<?php


// require_once(__DIR__ . '/../model/productclass.php');

// require_once(__DIR__ . '/../model/productService.php');
// require_once(__DIR__.'/../../phpconnectmongodb.php');
require_once('../model/productclass.php');
require_once('../model/productService.php');
//session_start();

class productController
{
    private $productService;
    public function __construct()
    {
        $this->productService = new ProductService();
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
}
$classproduct = new productController(); 
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];

    if ($controller == "productDetailId") {
        $value = $_GET['value'];
        $classproduct->productDetailId($value);
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
