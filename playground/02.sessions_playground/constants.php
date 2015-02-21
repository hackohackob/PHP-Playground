<?php

$loginHTML='<div class="uk-margin-top">
        <div class="uk-panel uk-panel-header uk-panel-box uk-width-large-1-3 uk-width-medium-1-2 uk-width-small-8-10 uk-container-center">
            <h3 class="uk-panel-title uk-h1">Login</h3>

            <form method="post" action="" class="uk-form uk-text-center uk-form-horizontal">
                <div class="uk-form-row uk-container-center">
                    <input type="text" name="username" placeholder="Username" autofocus>
                </div>

                <div class="uk-form-row uk-container-center">
                    <input type="password" name="pass"  placeholder="Password" class="">
                </div>

                <div class="uk-form-row uk-text-center">
                    <button type="submit" class="uk-button uk-button-success uk-container-center" value="Login"> Login
                    <i class="uk-icon-sign-in"></i></button>
                </div>
            </form>
        </div>
    </div>';

$registerHTML='<div class="uk-margin-top">
        <div class="uk-panel uk-panel-header uk-panel-box uk-width-large-1-3 uk-width-medium-1-2 uk-width-small-8-10 uk-container-center">
            <h3 class="uk-panel-title uk-h1">Register</h3>

            <form method="post" action="./register.php" class="uk-form uk-text-center uk-form-horizontal">
                <div class="uk-form-row uk-container-center">
                    <input type="text" name="username" placeholder="Username" autofocus required>
                </div>

                <div class="uk-form-row uk-container-center">
                    <input type="password" name="pass" placeholder="Password" required>
                </div>

                <div class="uk-form-row uk-container-center">
                    <input type="password" name="pass2" placeholder="Repeat password" required>
                </div>

                <div class="uk-form-row uk-text-center">
                    <button type="submit" class="uk-button uk-button-success uk-container-center" value="Register">Register</button>
                </div>
            </form>
        </div>
    </div>';

$uploadFileHTML='<div class="uk-margin-top">
        <div class="uk-panel uk-panel-header uk-panel-box uk-width-large-1-3 uk-width-medium-1-2 uk-width-small-8-10 uk-container-center">
            <h3 class="uk-panel-title uk-h1">Upload a file</h3>

            <form method="post" action="./upload.php" class="uk-form uk-form-horizontal" enctype="multipart/form-data">
                <div class="uk-form-file uk-text-center">
                    <input type="file" name="file" id="1" required>
                </div>
                <div class="uk-text-center ">
                    <button class="uk-button uk-margin-top uk-button-success" type="submit" value="Upload">Upload
                    <i class="uk-icon-upload"></i> </button>
                    </div>
            </form>
        </div>
    </div>';

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

function parseUsersFromFile($userString)
{
    $userArray=explode('!',$userString);
    $userArray[2]=trim($userArray[2]);
    return $userArray;
}

function filesToHTML($fileArray)
{
    echo 'FILEARRAY:<br>';
    print_r($fileArray);
    echo '<br>';
    $fileArray2=array();
    $fileArray2['name']=$fileArray['name'];
    $fileArray2['size']=$fileArray['size'];
    echo 'FILEARRAY2:<br>';
    print_r($fileArray2);
    echo '<br>';
    return $fileArray2;
}
?>