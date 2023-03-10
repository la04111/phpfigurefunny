<?php 
class Image {
  
    private $ProductID;
    private $img;
   
 
   

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
    
}

?>