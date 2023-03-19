<?php
//require_once(__DIR__ . '/productclass.php');
//require_once(__DIR__ . '/phpconnectmongodb.php');
require_once('billclass.php');
require_once('billdetailclass.php');
require_once('phpconnectmongodb.php');

class billService
{
    private  $dbcollectionproduct;
    private  $dbcollectionbill;
    private  $dbcollectionbilldetail;
    public function __construct()
    {
        $this->dbcollectionbill  = Getmongodb("figurefunnyDB", "bill");
        $this->dbcollectionbilldetail  = Getmongodb("figurefunnyDB", "bill_detail");
        $this->dbcollectionproduct  = Getmongodb("figurefunnyDB", "product");
    }
    public function getIdaddBill()
    {

        $result = $this->dbcollectionbill->find([]);
        foreach ($result as $document) {
            $id = $document['idbill'];
        }
        return (int)$id + 1;
    }
    public function getBillDetail($idbillObject)
    {

        $result = $this->dbcollectionbilldetail->find(["idbill" => (int)$idbillObject]);

        return $result;
    }
    public function getBill($idbillObject)
    {

        $result = $this->dbcollectionbill->findOne(["idbill" => (int) $idbillObject]);

        return $result;
    }
    public function getBillEmaill($email)
    {

        $result = $this->dbcollectionbill->find(
            ["emailcustomer" => $email],
            ['sort' => ['idbill' => -1], 'limit' => 5]
        );

        return $result;
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
                'addressdelivery' => (string)$b->GetAddressdelivery(),
                'emailcustomer' => $b->GetEmailcustomer(),
                'phonenum' =>  $b->GetPhonenum(),
                'totalbill' => (float)$b->GetTotal(),
                'status' => 'Chờ xử lý'
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
                'price' => (float)$bd->GetPrice(),
                'quantity' =>  (int) $bd->GetQuantity()
            ];
            $this->dbcollectionbilldetail->insertOne($billd);
        } catch (Exception $e) {
            // handle the exception
            return false;
        }
    }
    //UPDATE BILL
    public function updateBill(Bill $b)
    {
        $this->dbcollectionbill->updateOne(
            ['idbill' => (int)$b->GetIDBill()],
            ['$set' => [
                'note' => $b->GetNote(),
                'datebuy' => (string)$b->GetDateBuy(),
                'addressdelivery' => (string)$b->GetAddressdelivery(),
                'emailcustomer' => $b->GetEmailcustomer(),
                'phonenum' =>  $b->GetPhonenum(),
                'totalbill' => (float)$b->GetTotal(),
                'status' => $b->GetStatus()
            
            ]]
        );
    }
    
    //ADMIN 
    public function countBilltoday()
    {
        $current_date = date("d/m/Y");
        $temp = $this->dbcollectionbill->find(["datebuy" => ['$regex' => $current_date, '$options' => 'i']]);

        $count = 0;

        foreach ($temp as $document) {
            $count++;
        }
        return $count;
    }
    public function countStock()
    {
        $result = $this->dbcollectionproduct->find(["Stock" => ['$lt' => 10]]);
        $count = 0;

        foreach ($result as $document) {
            $count++;
        }
        return $count;
    }
    public function countBillwait()
    {
        $temp = $this->dbcollectionbill->find(["status" => ['$regex' => 'Chờ xử lý', '$options' => 'i']]);
        $count = 0;

        foreach ($temp as $document) {
            $count++;
        }
        return $count;
    }
    public function bestsellertop5()
    {
        $result = $this->dbcollectionbilldetail->aggregate([
            [
                '$group' => [
                    '_id' => '$idproduct',
                    'quantity' => ['$sum' => '$quantity']
                ]
            ], ['$sort' => ['_id' => -1]],
            ['$limit' => 5]
        ]);

        return $result;
    }
    // bill search
    public function searchBillwithIDorEmail($email)
    {
        // if (!isset($email)) {
        //     $email = "";
        // }
        // if (!isset($idbill)) {
        //     $idbill = "";
        // }
        $temp = $this->dbcollectionbill->find(
            [
                '$or' => [
                    ["emailcustomer" => ['$regex' => $email, '$options' => 'i']],
                    ["idbill" => (int)$email]
                ]
            ],
            ['sort' => ['idbill' => -1]]
        );
        return $temp;
    }
    public function searchBillwithIDorEmailWait($email)
    {
       
        $temp = $this->dbcollectionbill->find(
            [
                'status' => 'Chờ xử lý', //filter for status field
                '$or' => [
                    ["emailcustomer" => ['$regex' => $email, '$options' => 'i']],
                    ["idbill" => (int)$email]
                ]
            ],
            ['sort' => ['idbill' => -1]]
        );
        return $temp;
    }
}
