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
  // IMAGE  GET
  public function getImagewithID($id)
  {
    $result = $this->dbcollectionImage->find(['ProductID' => (int)$id]);
    //echo $result['Image'];
    return $result;
  }
  public function findOneImageId($id)
  {
    $result_image = $this->dbcollectionImage->findOne(["ProductID" => (int)$id]);
    if (!empty($result_image))
      return $result_image['Image'];
    else return "https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png";
  }
  // add one image
  public function UpdateOneImage(Image $im)
  {
    try {
     
      // xu ly hinh anh nhieu tam
      $this->dbcollectionImage->updateOne(['ProductID' => $im->GetProductID()],
      ['$set' => ['IdSort' => $im->GetIDSort(),
                   'Image' => $im->GetImage()
                   ]]);

      // insert the document in the collection
      return true;
    } catch (Exception $e) {
      // handle the exception
      return false;
    }
  }
  //add list img
  public function UpdateListImage($listimg)
  {
    try {
     
      // xu ly hinh anh nhieu tam
      // $this->dbcollectionImage->updateOne(['ProductID' => $im->GetProductID()],
      // ['$set' => ['IdSort' => $im->GetIDSort(),
      //              'Image' => $im->GetImage()
      //              ]]);

      // insert the document in the collection
      return true;
    } catch (Exception $e) {
      // handle the exception
      return false;
    }
  }
  // PRODUCT 
  public function getIdadd()
  {

    $result = $this->dbcollectionproduct->find([]);
    foreach ($result as $document) {
      $id = $document['ProductID'];
    }
    return (int)$id + 1;
  }
  public function findName($name)
  {

    $result_name = $this->dbcollectionproduct->find([
      "ProductName" => ['$regex' => $name]
    ]);
    return $result_name;
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
        'ProductID' => (int)$p->GetProductID(),
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
            'ProductID' => (int)$p->GetProductID(),
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
