<?php

function render($data,$templateName)
{
    include './templates/header.php';

    include './templates/'.$templateName.'.php';

    include './templates/footer.php';
}