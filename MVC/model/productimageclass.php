<?php 
class Image {
  
    private $ProductID;
    private $img;
   private $IDSort;
 
   

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
    public function GetImage()
    {
        return $this->img;
    }
    public function SetImage($img)
    {
      $this->img = strtoupper($img);

    }
    public function GetIDSort()
    {
        return $this->IDSort;
    }
    public function SetIDSort($IDSort)
    {
      $this->IDSort = strtoupper($IDSort);

    }
}

?>