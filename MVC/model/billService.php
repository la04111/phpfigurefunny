<?php
//require_once(__DIR__ . '/productclass.php');
//require_once(__DIR__ . '/phpconnectmongodb.php');
require_once('billclass.php');
require_once('billdetailclass.php');
require_once('phpconnectmongodb.php');

class billService
{
    private  $dbcollectionbill;
    private  $dbcollectionbilldetail;
    public function __construct()
    {
        $this->dbcollectionbill  = Getmongodb("figurefunnyDB", "bill");
        $this->dbcollectionbilldetail  = Getmongodb("figurefunnyDB", "bill_detail");
    }
    public function getIdaddBill()
    {

        $result = $this->dbcollectionbill->find([]);
        foreach ($result as $document) {
            $id = $document['idbill'];
        }
        return (int)$id + 1;
    }
    // CREATE BILL
    public function addBill(Bill $b)
    {

        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('d/m/Y H:i:s');
            $bill = [
                'idbill' => (int)$b->GetIDBill(),
                'note' => $b->GetNote(),
                'datebuy' => (string)$date,
                'emailcustomer' => $b->GetEmailcustomer(),
                'phonenum' =>  $b->GetPhonenum(),
                'totalbill' => (double)$b->GetTotal(),
                'status' => 'init'
            ];

            $this->dbcollectionbill->insertOne($bill);
            return $bill;
        } catch (Exception $e) {
            // handle the exception
            return false;
        }
    }
    public function addBillDetail(BillDetail $bd)
    {
        try {
            $billd = [
                'idbill' =>  (int)$bd->GetIDBill(),
                'idproduct' =>  (int)$bd->GetIDProduct(),
                'productname' => $bd->GetProductname(),
                'price' => (double)$bd->GetPrice(),
                'quantity' =>  (int) $bd->GetQuantity()
            ];
            $this->dbcollectionbilldetail->insertOne($billd);
          
        } catch (Exception $e) {
            // handle the exception
            return false;
        }
    }
}
