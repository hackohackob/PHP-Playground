<!DOCTYPE html>
<html>
<head>
    <title><?= $pageTitle; ?></title>
    <meta charset="UTF-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/uikit/2.16.2/css/uikit.min.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/uikit/2.16.2/css/uikit.almost-flat.min.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/uikit/2.16.2/js/uikit.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>


</head>
<body>
<nav class="uk-navbar uk-navbar-attached">
    <ul class="uk-navbar-nav">
        <li><a href="./index.php">Home</a></li>
        <li><a href="./other.php">Other</a></li>
    </ul>
    <?php if ($logged) {
        echo '<div class="uk-navbar-flip">
        <ul class="uk-navbar-nav">
            <li>
                <form method="post" action="./index.php">
                    <input type="hidden" name="logout" value="1">
                    <input class="uk-button uk-button-danger" type="submit" value="Log out">
                </form>
            </li>
        </ul>
    </div>';
    }
    ?>

</nav>