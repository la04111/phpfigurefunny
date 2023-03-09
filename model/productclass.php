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
    private $Image;
    private $Status;

    public function __construct()
    {
      
    } 
    public function GetProductID()
    {
        return $this->ProductID;
    }
    public function SetProductID($ProductID)
    {
      $this->ProductID = strtoupper($ProductID);

    }
    public function GetProductName()
    {
        return $this->ProductName;
    }
    public function SetProductName($ProductName)
    {
      $this->ProductName = strtoupper($ProductName);

    }
    public function GetSeries()
    {
        return $this->Series;
    }
    public function SetSeries($Series)
    {
      $this->Series = strtoupper($Series);

    }
    public function GetBrand()
    {
        return $this->Brand;
    }
    public function SetBrand($Brand)
    {
      $this->Brand = strtoupper($Brand);

    }
    public function GetNote()
    {
        return $this->Note;
    }
    public function SetNote($Note)
    {
      $this->Note = strtoupper($Note);

    }
    public function GetDateRelease()
    {
        return $this->DateRelease;
    }
    public function SetDateRelease($DateRelease)
    {
      $this->DateRelease = strtoupper($DateRelease);

    }
    public function GetProductStatus()
    {
        return $this->ProductStatus;
    }
    public function SetProductStatus($ProductStatus)
    {
      $this->ProductStatus = strtoupper($ProductStatus);

    }
    public function GetPrice()
    {
        return $this->Price;
    }
    public function SetPrice($Price)
    {
      $this->Price = strtoupper($Price);

    }
    public function GetStock()
    {
        return $this->Stock;
    }
    public function SetStock($Stock)
    {
      $this->Stock = strtoupper($Stock);

    }
    public function GetImage()
    {
        return $this->Image;
    }
    public function SetImage($Image)
    {
      $this->Image = strtoupper($Image);

    }
    public function GetStatus()
    {
        return $this->Status;
    }
    public function SetStatus($Status)
    {
      $this->Status = strtoupper($Status);

    }
}

?>