<?php

mb_internal_encoding('UTF-8');

$post=$_POST;

$name=trim($post['name']);
$phone=trim($post['phone']);
$group=(int)$post['group'];

$name=str_replace('!','',$name);
$phone=str_replace('!','',$phone);
$group=str_replace('!','',$group);

$error=false;

if(mb_strlen($name)<6 || mb_strlen($phone)<8)
{
    $error=true;
    redirect('./form.php?error=1');
}
else
{
    $result=$name.'!'.$phone.'!'.$group."\n";
    if(file_put_contents('contacts.txt',$result,FILE_APPEND))
    {
        redirect('./form.php?success=1');
    }
    else
    {
        echo 'SERVER ERROR';
    }
}

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

?>