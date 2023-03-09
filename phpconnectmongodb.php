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
// require_once __DIR__ . "/vendor/autoload.php";
// $client = new MongoDB\Client("mongodb+srv://la04111:123@webth.jlnmqj4.mongodb.net/test");
// $database = $client->selectDatabase("figurefunnyDB");
// $collection = $database->selectCollection("product");
// $result = $collection->find([]);
// echo 'ProductID: ' . $result['ProductID'] . '<br>';
// echo 'ProductName: ' . $result['ProductName'] . '<br>';
// echo 'Series: ' . $result['Series'] . '<br>';
// echo 'Brand: ' . $result['Brand'] . '<br>';
// echo 'Note: ' . $result['Note'] . '<br>';
// echo 'DateRelease: ' . $result['DateRelease'] . '<br>';
// echo 'ProductStatus: ' . $result['ProductStatus'] . '<br>'; 
?>
