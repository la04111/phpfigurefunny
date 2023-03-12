<?php
//require_once(__DIR__ . '/productclass.php');
//require_once(__DIR__ . '/phpconnectmongodb.php');
require_once('userclass.php');
require_once('phpconnectmongodb.php');

class UserService
{
    private  $dbcollectionuser;

    public function __construct()
    {
        $this->dbcollectionuser  = Getmongodb("figurefunnyDB", "account");
    }
    public function getAllUser()
    {

        $result = $this->dbcollectionuser->find([]);
        return $result;
    }
    public function findUserWithEmailandPassword($email, $password)
    {
        $user = $this->dbcollectionuser->findOne([
            "email" => $email,
            "password" => $password
        ]);
        if (!is_null($user)) {

            return $user;
        } else {

            return false;
        }
    }
    //// C R U    USER
    public function addUser(Users $u)
    {
        $userCount = $this->dbcollectionuser->countDocuments([
            "email" => $u->GetEmail()
        ]);

        if ($userCount > 0) {
            return false;
        } else {
            $newUser = [
                "email" => $u->GetEmail(),
                "password" => $u->GetPassword(),
                "roles" => "customer",
                "phonenum" => $u->GetPhonenum(),
                "address" => $u->GetAddress(),
                "id" => 1,
                "firstname" => $u->GetFirstName(),
                "lastname" => $u->GetLastName()
            ];
            $insertResult = $this->dbcollectionuser->insertOne($newUser);

            // check if the insertion was successful
            if ($insertResult->getInsertedCount() == 1) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function updateUserByEmail(Users $u)
    {
        $filter = ["email" => $u->GetEmail()];
        $update = [
            '$set' => [
                "email" => $u->GetEmail(),
                "password" => $u->GetPassword(),
                "roles" => "customer",
                "phonenum" => $u->GetPhonenum(),
                "address" => $u->GetAddress(),
                "id" => 1,
                "firstname" => $u->GetFirstName(),
                "lastname" => $u->GetLastName()
            ]
        ];
        $updateResult = $this->dbcollectionuser->updateOne($filter, $update);

        if ($updateResult->getModifiedCount() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
