<?php


$client2=new MongoClient('mongodb://localhost:27017');
if(!$client2)
{
    echo 'Could not connect';
}
else
{
    $connection=$client2->connect();
    $db=$client2->test;
    $zips=$db->zips;
    $results=$zips->find();
    for($i=0;$i<$results->count();$i++)
    {
        $single=$results->getNext();
        print_r($single);
        echo '<br>';
    }
}