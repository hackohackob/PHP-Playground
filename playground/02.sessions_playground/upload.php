<?php


require './constants.php';
session_start();


$user=$_SESSION['username'];
$targetDir='.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$user;
$fullPath=realpath($targetDir);

if(!is_dir($targetDir))
{
    mkdir($targetDir);
}

if($_FILES['file']['error']==UPLOAD_ERR_OK)
{
    $tmpName=$_FILES['file']['tmp_name'];
    $fileName=$_FILES['file']['name'];
    $target=$fullPath.DIRECTORY_SEPARATOR.$fileName;

    if(move_uploaded_file($tmpName,$target))
    {
        redirect('./index.php?file=1');
    }
    else
    {
        redirect('./index.php?file=0');
    }
}
else
{
    redirect('./index.php?file=0');
}



