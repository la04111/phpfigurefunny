<?php
//require_once(__DIR__ . '/productclass.php');
//require_once(__DIR__ . '/phpconnectmongodb.php');
require_once('billclass.php');
require_once('phpconnectmongodb.php');

class billService
{
    private  $dbcollectionbill;

    public function __construct()
    {
      $this->dbcollectionbill  = Getmongodb("figurefunnyDB", "bill");
    
    }
    public function getIdaddBill()
  {

    $result = $this->dbcollectionbill->find([]);
    foreach ($result as $document) {
      $id = $document['idbill'];
    }
    return (int)$id + 1;
  }
}
?>