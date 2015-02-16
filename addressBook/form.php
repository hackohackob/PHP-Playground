<?php
$pageTitle="Adding contact";

include '.\header.php';
require '.\constants.php';
?>

<?php
if($_GET) {
    if(array_key_exists('error',$_GET))
    {
        $title = 'Error';
        $message = 'Some of the fields you entered is invalid. Please check the requirements and try again.';
        $class = 'danger';
    }
    else if(array_key_exists('success',$_GET))
    {
        $title = 'Success';
        $message = 'Contact successfully added to list.';
        $class = 'success';
    }

        echo '<div class="panel panel-' . $class . '">
  <div class="panel-heading">
    <h3 class="panel-title">' . $title . '</h3>
  </div>
  <div class="panel-body">' . $message . '
  </div>
</div>';

}
?>

<div class="jumbotron">
    <div class="container">
        <h1>Add a contact</h1>
        <style>form {
                text-align: center;
                margin: 0 auto;
            }</style>
        <style> form input, select {
                margin: 20px;
                width: 200px;
            } </style>
        <style> form div {
                margin: 0px auto;
            } </style>

        <form method="post" action="./addContact.php">
            <div class="input-group input-group-lg">
                <label>Name: <input type="text" placeholder="Name" name="name"></label><br>
                <label>Phone: <input type="text" placeholder="Phone" name="phone"></label><br>
                Group: <select name="group">
                    <?php
                        foreach($groups as $index=>$group)
                        {
                                echo '<option value="' . $index . '">' . $group . '</option>';
                        }
                    ?>
                </select><br>
                <input type="submit" class="btn btn-success" value="Send">
            </div>
        </form>
    </div>
</div>

<?php
include '.\footer.php';
?>