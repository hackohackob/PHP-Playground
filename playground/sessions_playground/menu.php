<body>
<nav class="uk-navbar uk-navbar-attached ">
    <ul class="uk-navbar-nav ">
        <li><span href="./index.php" class="uk-navbar-brand">
        <i class="uk-icon-folder-open"></i>
    </span></li>
        <li class="<?php if ($activeWindow == 'Home') {
            echo 'uk-active';
        } ?>"><a href="./index.php">Home</a></li>
        <li class="<?php if ($activeWindow == 'Files') {
            echo 'uk-active';
        } ?>"><a href="./files.php">Upload File</a></li>

    </ul>

    <?php if ($logged == true) {

        echo '
    <div class="uk-navbar-flip ">
        <ul class="uk-navbar-nav ">
            <li class="uk-parent" data-uk-dropdown="{mode:\'click\'}" style="margin-right: 10px;">
                <a>
                    My Profile
                    <i class="uk-icon-chevron-down"></i>
                </a>
                <div class="uk-dropdown uk-dropdown-center">
                    <ul class="uk-nav uk-nav-dropdown uk-text-center">
                        <li class="uk-nav-header"><img class="uk-comment-avatar uk-border-circle" src="./avatars/'.
                            $_SESSION['avatar'].'"><span>'.$_SESSION['username'].'</span></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="">View my profile</a></li>
                        <li><a href="">Change password</a></li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="">Delete my files</a></li>
                    </ul>
                </div>
            </li>
            <li >
                <form method="post" action="./index.php" style="margin-top:5px; margin-right:10px;">
                    <input type="hidden" name="logout" value="1">
                    <button class="uk-button uk-button-danger" type="submit" value="Log out">Log out
                    <i class="uk-icon-sign-out"></i></button>
                </form>
            </li>
        </ul>
    </div>';
    } else {
        echo '<div class="uk-navbar-flip">
        <ul class="uk-navbar-nav">
            <li>
                <div ><a href="./register.php" class="uk-button uk-button-success" style="margin-top:5px; margin-right:10px;">Register</a></div>
            </li>
        </ul>
    </div>';
    }
    ?>

</nav>
