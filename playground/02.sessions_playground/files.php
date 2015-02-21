<?php
$pageTitle = 'Files';
include './header.php';
require './constants.php';
session_start();

$activeWindow='Files';

if (array_key_exists('isLogged', $_SESSION) && $_SESSION['isLogged'] == true) {
    $logged = true;
    include './menu.php';

    if (array_key_exists('logout', $_POST) && $_POST['logout']) {
        session_destroy();
        $logged = false;
        redirect('./index.php');
    }

} else {
    $logged = false;


    if ($_POST && array_key_exists('username', $_POST)) {
        $username = trim($_POST['username']);
        $pass = trim($_POST['pass']);

        $usernames=file('users.txt');
        $usernames=array_map('parseUsersFromFile',$usernames);
        $match=false;

        print_r($usernames);
        print_r($usernames[0]);
        print_r($usernames[1]);
        foreach($usernames as $user)
        {
            if($user[0]==$username && $user[1]==$pass)
            {
                $match=true;
                $_SESSION['isLogged'] = true;
                $_SESSION['username']=$username;
                $_SESSION['avatar']=$user[2];
                $logged = true;
                redirect('./index.php');
            }
        }

        redirect('./index.php?err=1');

    }

    include './menu.php';

    echo $loginHTML;
}

if($logged)
{
    echo $uploadFileHTML;
}

include './footer.php';
?>