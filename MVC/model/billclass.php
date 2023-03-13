<?php 
class Bill{
    private $idbill;
    private $idproduct;
    private $price;
    private $quantity;
    private $note;
    private $datebuy;
    private $addressdelivery;
    private $emailcustomer;
    private $phonenum;
    private $status;
    private $total;

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
    public function GetNote()
    {
       return $this->note;
    }
    public function SetNote($note)
    {
      $this->note = $note;
    }
    public function GetDateBuy()
    {
       return $this->datebuy;
    }
    public function SetDateBuy($datebuy)
    {
      $this->datebuy = $datebuy;
    }
    public function GetAddressdelivery()
    {
       return $this->addressdelivery;
    }
    public function SetAddressdelivery($addressdelivery)
    {
      $this->addressdelivery = $addressdelivery;
    }
    public function GetEmailcustomer()
    {
       return $this->emailcustomer;
    }
    public function SetEmailcustomer($emailcustomer)
    {
      $this->emailcustomer = $emailcustomer;
    }
    public function GetPhonenum()
    {
       return $this->phonenum;
    }
    public function SetPhonenum($phonenum)
    {
      $this->phonenum = $phonenum;
    }
    public function GetStatus()
    {
       return $this->status;
    }
    public function SetStatus($status)
    {
      $this->status = $status;
    }
    public function GetTotal()
    {
       return $this->total;
    }
    public function SetTotal($total)
    {
      $this->total = $total;
    }

}
