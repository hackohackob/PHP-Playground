<?php
$pageTitle = "List";

include '.\header.php';
require '.\constants.php';

if (array_key_exists('group', $_GET)) {
    $groupBy = (int)$_GET['group'];
} else {
    $groupBy = 0;
}
?>
    <style>.jumbotron table td {
            padding: 10px 15px;
        }</style>

    <div class="jumbotron">
        <div class="container">
            <div class="uk-grid .uk-grid-width-* uk-grid-divider" style="margin-bottom: 20px;">
                <h1 class="uk-width-7-10">List of all contacts</h1>
                <form method="GET" class="uk-form uk-width-3-10 ">
                    <select name="group" >
                        <option value="0">All</option>
                        <?php
                        foreach ($groups as $index => $group) {
                            echo '<option value="' . $index . '"';
                            if($index==$groupBy)
                            {
                                echo "selected";
                            }
                            echo '>' . $group . '</option>';
                        }
                        ?>
                        <input type="submit" value="Filter" class="uk-button uk-button-primary ">
                    </select>
                </form>
            </div>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Group</th>
                </tr>
                <?php
                if (file_exists('contacts.txt')) {
                    $contacts = file('contacts.txt');
                    $contactCount = 0;



                    foreach ($contacts as $contact) {
                        if ($groupBy == 0 || ($groupBy != 0 && (int)(explode('!', $contact)[2]) == (int)$groupBy)) {
                            echo '<tr>';
                            echo '<td>' . explode('!', $contact)[0] . '</td>';
                            echo '<td>' . explode('!', $contact)[1] . '</td>';
                            echo '<td>' . $groups[(int)(explode('!', $contact)[2])] . '</td>';
                            echo '</tr>';
                            $contactCount++;
                        }
                    }

                    echo '<tr>';
                    echo '<td>' . ' ' . '</td>';
                    echo '<td>' . ' ' . '</td>';
                    echo '<td>' . ' ' . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th colspan="2">' . 'Брой на контактите:' . '</td>';
                    echo '<th>' . $contactCount;
                    if ($groupBy != 0) {
                        echo '/' . count($contacts);
                    }
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
    </div>

<?php
include '.\footer.php';
?>