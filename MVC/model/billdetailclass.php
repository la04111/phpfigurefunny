<?php 
class BillDetail{
    private $idbill;
    private $idproduct;
    private $price;
    private $quantity;
    private $productname;
 

    public function GetIDBill()
    {
       return $this->idbill;
    }
    public function SetIDBill($idbill)
    {
      $this->idbill = $idbill;
    }
    public function GetIDProduct()
    {
       return $this->idproduct;
    }
    public function SetIDProduct($idproduct)
    {
      $this->idproduct = $idproduct;
    } 
     public function GetPrice()
    {
       return $this->price;
    }
    public function SetPrice($price)
    {
      $this->price = $price;
    }
    public function GetQuantity()
    {
       return $this->quantity;
    }
    public function SetQuantity($quantity)
    {
      $this->quantity = $quantity;
    }
    public function GetProductname()
    {
       return $this->productname;
    }
    public function SetProductname($productname)
    {
      $this->productname = $productname;
    }
    
}
