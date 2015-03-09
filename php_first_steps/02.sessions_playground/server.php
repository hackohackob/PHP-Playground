<?php


echo ini_get('upload_max_filesize').'<br><br>';
echo ini_get('post_max_size').'<br><br>';

$set=ini_set('upload_max_filesize','31M');

echo $set.'<br><br>';
var_dump($set);


