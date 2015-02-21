<?php

require './constants.php';

if(array_key_exists('username',$_POST))
{
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $pass2=$_POST['pass2'];

    if(strlen($username)<6)
    {
        redirect('./register.php?err=username');
    }
    elseif(strlen($pass)<6)
    {
        redirect('./register.php?err=password');
    }
    elseif($pass!==$pass2)
    {
        redirect('./register.php?err=match');
    }
    else
    {
        $fileName='users.txt';
        $username=str_replace('!','',trim($username));
        $pass=str_replace('!','',trim($pass));
        $record=$username.'!'.$pass.'!user-icon.png'.PHP_EOL;
        file_put_contents($fileName,$record,FILE_APPEND);
        redirect('./index.php?reg=1');
    }
}



$pageTitle = 'Register';
include './header.php';

$logged = false;
include './menu.php';

if(array_key_exists('err',$_GET))
{
    $err=$_GET['err'];
    $message='';
    switch ($err)
    {
        case 'username': $message='Username is invalid. Please try again. (Username must be longer than 5 characters) '; break;
        case 'password': $message='Password is invalid. Please try again. (Password must be longer than 5 characters) '; break;
        case 'match': $message='Passwords don\'t match. Please try again.'; break;
    }

    echo '<div class="uk-alert uk-alert-danger" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>'.$message.'</p>
                  </div>';
}

echo $registerHTML;

include './footer.php';
?>