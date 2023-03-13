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

  }
  // IMAGE  GET
  public function getImagewithID($id)
  {
    $result = $this->dbcollectionImage->find(['ProductID' => (int)$id]);
    //echo $result['Image'];
    return $result;
  }
  public function findOneImageIdProduct($id)
  {
    $result_image = $this->dbcollectionImage->findOne(
      ["ProductID" => (int)$id],
      ['sort' => ['_id' => -1]]
    );
    if (!empty($result_image))
      return $result_image['Image'];
    else return "https://artsmidnorthcoast.com/wp-content/uploads/2014/05/no-image-available-icon-6.png";
 
  }
  public function findOneImageIdProductIdSort($id)
  {
    $result_images = $this->dbcollectionImage->find(["ProductID" => (int)$id]);
    // return the images array
    return $result_images;
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
      $this->dbcollectionImage->updateOne(
        ['ProductID' => $im->GetProductID()],
        ['$set' => [
          'IdSort' => $im->GetIDSort(),
          'Image' => $im->GetImage()
        ]]
      );

      // insert the document in the collection
      return true;
    } catch (Exception $e) {
      // handle the exception
      return false;
    }
  }
  //add list img
  public function UpdateListImage($idProduct, $listimg)
  {
    try {
      $deleteall = $this->dbcollectionImage->deleteMany(["ProductID" => (int)$idProduct]);
      // xu ly hinh anh nhieu tam
      $imgall = explode("@", $listimg); // ~ split
      $i = 1;
      foreach ($imgall as $img) {
        if (!empty($img)) {
          $addimg = [
            'ProductID' => (int)$idProduct,
            'IdSort' => (int)$i,
            'Image' => $img
          ];
          $this->dbcollectionImage->insertOne($addimg);
          (int)$i++;
        }
      }
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
  public function updateProduct(Product $p)
  {
    try {
      $result = $this->dbcollectionproduct->updateOne(
        ['ProductID' => (int)$p->GetProductID()],
        ['$set' => [
          'ProductName' => $p->GetProductName(),
          'Series' => $p->GetSeries(),
          'Brand' => $p->GetBrand(),
          'Note' =>  $p->GetNote(),
          'DateRelease' => $p->GetDateRelease(),
          'ProductStatus' => $p->GetProductStatus(),
          'Price' => (double)$p->GetPrice(),
          'Stock' => (int)$p->GetStock(),
          'Infor' => $p->GetInfor()
        ]]
      );

      return true;
    } catch (Exception $e) {
      // handle the exception
      return false;
    }
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
  //GET LIST PRODUCT WITH Series
  public function GetSeries($Seri)
  {
    $result_SeriresList = $this->dbcollectionproduct->find(["Series" => $Seri]);
    return $result_SeriresList;
  }
}
