<?php 
class Product {
  
    private $ProductID;
    private $ProductName;
    private $Series;
    private $Brand;
    private $Note;
    private $DateRelease;
    private $ProductStatus;
    private $Price;
    private $Stock;
   
 
    private $Infor;

    public function __construct()
    {
      
    } 
    public function GetProductID()
    {
        return $this->ProductID;
    }
    public function SetProductID($ProductID)
    {
      $this->ProductID = $ProductID;

    }
    public function GetProductName()
    {
        return $this->ProductName;
    }
    public function SetProductName($ProductName)
    {
      $this->ProductName = ($ProductName);

    }
    public function GetSeries()
    {
        return $this->Series;
    }
    public function SetSeries($Series)
    {
      $this->Series = $Series;

    }
    public function GetBrand()
    {
        return $this->Brand;
    }
    public function SetBrand($Brand)
    {
      $this->Brand = $Brand;

    }
    public function GetNote()
    {
        return $this->Note;
    }
    public function SetNote($Note)
    {
      $this->Note = $Note;

    }
    public function GetDateRelease()
    {
        return $this->DateRelease;
    }
    public function SetDateRelease($DateRelease)
    {
      $this->DateRelease = ($DateRelease);

    }
    public function GetProductStatus()
    {
        return $this->ProductStatus;
    }
    public function SetProductStatus($ProductStatus)
    {
      $this->ProductStatus = ($ProductStatus);

    }
    public function GetPrice()
    {
        return $this->Price;
    }
    public function SetPrice($Price)
    {
      $this->Price = $Price;

    }
    public function GetStock()
    {
        return $this->Stock;
    }
    public function SetStock($Stock)
    {
      $this->Stock = $Stock;

    }
  

    public function GetInfor()
    {
        return $this->Infor;
    }
    public function SetInfor($Infor)
    {
      $this->Infor = $Infor;

    }
}

?>