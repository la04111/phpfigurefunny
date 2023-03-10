<?php
//require_once(__DIR__ . '/productclass.php');
//require_once(__DIR__ . '/phpconnectmongodb.php');
require_once('productclass.php');
require_once('productimageclass.php');
require_once('phpconnectmongodb.php');

class productService
{
  private  $dbcollectionproduct;
  private  $dbcollectionImage;
  public function __construct()
  {
    $this->dbcollectionproduct  = Getmongodb("figurefunnyDB", "product");
    $this->dbcollectionImage  = Getmongodb("figurefunnyDB", "product_image");
  }
  public function getAllProduct()
  {

    $result = $this->dbcollectionproduct->find([]);
    return $result;
    // foreach ($result as $document) {
    //   echo 'ProductID: ' . $document['ProductID'] . '<br>';
    //   echo 'ProductName: ' . $document['ProductName'] . '<br>';
    //   echo 'Series: ' . $document['Series'] . '<br>';
    //   echo 'Brand: ' . $document['Brand'] . '<br>';
    //   echo 'Note: ' . $document['Note'] . '<br>';

    //   echo 'DateRelease: ' . $document['DateRelease'] . '<br>';
    //   echo 'ProductStatus: ' . $document['ProductStatus'] . '<br><br>';
    // }
  }
  public function getIdadd()
  {

    $result = $this->dbcollectionproduct->find([]);
    foreach ($result as $document) {
      $id = $document['ProductID'];
    }
    return (int)$id + 1;
  }
  public function findOneName($name)
  {

    $result = $this->dbcollectionproduct->findOne(["ProductName" => $name]);
    return $result;
  }
  public function findOneId($id)
  {

    $result = $this->dbcollectionproduct->findOne(["ProductID" => (int)$id]);
    return $result;
  }
  public function addProduct(Product $p, $list_image)
  {

    try {
      $product = [
        'ProductID' => $p->GetProductID(),
        'ProductName' => $p->GetProductName(),
        'Series' => $p->GetSeries(),
        'Brand' => $p->GetBrand(),
        'Note' =>  $p->GetNote(),
        'DateRelease' => $p->GetDateRelease(),
        'ProductStatus' => $p->GetProductStatus(),
        'Price' => (float)$p->GetPrice(),
        'Stock' => (int)$p->GetStock(),
        'Infor' => $p->GetInfor()

      ];
      // xu ly hinh anh nhieu tam

      $imgall = explode("@", $list_image); // ~ split
      $i = 1;
      foreach ($imgall as $img) {
        if (!empty($img)) {
          $addimg = [
            'ProductID' => $p->GetProductID(),
            'IdSort' => (int)$i,
            'Image' => $img
          ];
          $this->dbcollectionImage->insertOne($addimg);
          (int)$i++;
        }
      }
      // insert the document in the collection
      $this->dbcollectionproduct->insertOne($product);
      return true;
    } catch (Exception $e) {
      // handle the exception
      return false;
    }
    // printf(" Success Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
  }
}
