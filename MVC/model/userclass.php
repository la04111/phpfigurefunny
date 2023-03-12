<?php 
class Users {
  
    private $UserID;
    private $FirstName;
    private $LastName;
    private $Email;
    private $Password;
    private $Roles;
    private $Phonenum;
    private $Address;
   


    public function __construct()
    {
      
    } 
    public function GetUserID()
    {
        return $this->UserID;
    }
    public function SetUserID($UserID)
    {
      $this->UserID = $UserID;

    }
    public function GetFirstName()
    {
        return $this->FirstName;
    }
    public function SetFirstName($FirstName)
    {
      $this->FirstName = ($FirstName);

    }
    public function GetLastName()
    {
        return $this->LastName;
    }
    public function SetLastName($LastName)
    {
      $this->LastName = $LastName;

    }
    public function GetEmail()
    {
        return $this->Email;
    }
    public function SetEmail($Email)
    {
      $this->Email = $Email;

    }
    public function GetPassword()
    {
        return md5($this->Password);
    }
    public function SetPassword($Password)
    {
      $this->Password = md5($Password);

    }
    public function GetRoles()
    {
        return $this->Roles;
    }
    public function SetRoles($Roles)
    {
      $this->Roles = $Roles;

    }
    public function GetPhonenum()
    {
        return $this->Phonenum;
    }
    public function SetPhonenum($Phonenum)
    {
      $this->Phonenum = $Phonenum;

    }
    public function GetAddress()
    {
        return $this->Address;
    }
    public function SetAddress($Address)
    {
      $this->Address = $Address;

    }

  
}
