<?php
$pageTitle = 'Home';
include './header.php';
require './constants.php';
session_start();
//ini_set('upload_max_filesize','30M');
$activeWindow='Home';

if (array_key_exists('isLogged', $_SESSION) && $_SESSION['isLogged'] == true) {
    $logged = true;


    if (array_key_exists('logout', $_POST) && $_POST['logout']) {
        session_destroy();
        $logged = false;
        redirect('./index.php');
    }

    include './menu.php';

    if (array_key_exists('file', $_GET)) {
        $file = (int)$_GET['file'];
        if($file==0)
        {
            echo '<div class="uk-alert uk-alert-danger" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>Failed to write file to disk. Please try again later.</p>
                  </div>';
        }
        elseif ($file == 1) {
            echo '<div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>File uploaded successfully.</p>
                  </div>';
        }
    }

    $userDir='.'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$_SESSION['username'];
    $filesArray=array();

    if(is_dir($userDir)&&$handle=opendir($userDir)){

        while(false!==($file=readdir($handle)))
        {
            if($file!='.' && $file!='..')
            {
                $fileSize=filesize($userDir.DIRECTORY_SEPARATOR.$file);

                if($fileSize>1000)
                {
                    $fileSize/=1000;

                    if($fileSize>1000)
                    {
                        $fileSize/=1000;
                        $fileSize=round($fileSize,2);
                        $fileSize.=' MB';
                    }
                    else {
                        $fileSize=round($fileSize,2);
                        $fileSize .= ' KB';
                    }
                }
                else
                {
                    $fileSize=round($fileSize,2);
                    $fileSize.=' B';
                }

                $filesArray[]=array('name'=>$file,'size'=>$fileSize);
            }
        }
        closedir($handle);
    }
    echo '<div class="uk-overflow-container " style="overflow: hidden;">';
    echo '<table class="uk-table ">
            <thead>
                <tr class="uk-grid uk-grid-small ">
                    <th class="uk-width-1-6 uk-text-center">№</th>
                    <th class="uk-width-3-6 uk-text-center">File name</th>
                    <th class="uk-width-1-6 uk-text-center">File size</th>
                    <th class="uk-width-1-6 uk-text-center">Download</th>
                </tr>
            </thead>';

    echo '<tbody class=" ">';
    if(count($filesArray)==0)
    {
        echo '<tr><td colspan="3" class="uk-text-center">You have no files</td></tr>';
    }
    else
    {
        $count=1;
        foreach($filesArray as $fileRow)
        {
            $name=$fileRow['name'];
            $base=basename($name);
            echo '<tr class="uk-grid uk-grid-small uk-margin-top-remove">';

            echo '<td class="uk-width-1-6  uk-text-center">'.$count.'</td>';
            echo '<td class="uk-width-3-6" style="overflow: hidden;">'.$fileRow['name'].'</td>';
            echo '<td class="uk-width-1-6  uk-text-center">'.$fileRow['size'].'</td>';
            echo '<td class="uk-width-1-6 uk-text-center">
                    <a href="'.$userDir.DIRECTORY_SEPARATOR.$fileRow['name'].'" class="uk-button uk-button-success" download>
                    <i class="uk-icon-download"></i></a></td>';
            echo '</tr>';
            $count++;
        }
    }
    echo '</tbody></table></div>';


} else {
    $logged = false;

    if ($_POST && array_key_exists('username', $_POST)) {
        $username = trim($_POST['username']);
        $pass = trim($_POST['pass']);

        $usernames=file('users.txt');
        $usernames=array_map('parseUsersFromFile',$usernames);
        $match=false;

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

    if (array_key_exists('err', $_GET)) {
        $err = (int)$_GET['err'];

        if ($err == 1) {
            echo '<div class="uk-alert uk-alert-danger" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>Wrong username or passowrd. Maybe you should <a href="register.php">register</a> first?</p>
                  </div>';
        }
    }

    if (array_key_exists('reg', $_GET)) {
        $reg = (int)$_GET['reg'];

        if ($reg == 1) {
            echo '<div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>Registration successfull. You may now log in.</p>
                  </div>';
        }
    }



    echo $loginHTML;
}





include './footer.php';


?>


