<?php
//terminal:composer require mongodb/mongodb 
// error use :composer update --ignore-platform-reqs
require_once __DIR__ . "/vendor/autoload.php";

// connect to MongoDB
function Getmongodb($namedb, $namecollection)
{
    $client = new MongoDB\Client("mongodb+srv://la04111:123@webth.jlnmqj4.mongodb.net/test");

    // select a database
    $database = $client->selectDatabase($namedb);

    // select a collection
    $collection = $database->selectCollection($namecollection);
    return $collection;

    // output user data
}

//CRUD

//C
// $document = ['userID' => (int) 1, 
// 'userEmail' => "longan04111@gmail.com", 
// 'userPassword' => 'johndoe@example.com',
// 'userName' => 'johndoe@example.com',
// 'userRole' => 'johndoe@example.com',
// 'userAddress' => 'johndoe@example.com',
// 'userPhoneNumber' => '01234567',
// 'userState' => (bool) true
// ];
// $collection->insertOne($document);
//U
// $collection->updateOne(['userEmail' =>'longan04111@gmail.com'], 
// ['$set'=> ['userEmail'=> 'TN',
// 'userPassword'=> 'TN'

// ]]);
// D
//$collection->deleteOne(['userEmail' =>'TN']);

// require_once __DIR__ . "/vendor/autoload.php";
// $client = new MongoDB\Client("x");
$client = new MongoDB\Client("mongodb+srv://longan04111:123@dbmongo.3hqdaqt.mongodb.net/test
");
$database = $client->selectDatabase("dbmongo");
$collection = $database->selectCollection("user");
$result = $collection->find([]);
foreach($result as $d)
{
    echo 'ProductID: ' . $d['name'] . '<br>';
}
// echo 'ProductName: ' . $result['ProductName'] . '<br>';
// echo 'Series: ' . $result['Series'] . '<br>';
// echo 'Brand: ' . $result['Brand'] . '<br>';
// echo 'Note: ' . $result['Note'] . '<br>';
// echo 'DateRelease: ' . $result['DateRelease'] . '<br>';
// echo 'ProductStatus: ' . $result['ProductStatus'] . '<br>'; 
?>
