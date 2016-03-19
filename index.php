<?PHP

require('config.php');

//print_r($_REQUEST);

if(!$_REQUEST['c']) {
    require('view.html');
    exit();
}

if($_REQUEST['c'] == 'users') {
    if($_GET['a'] == 'getJSON') {
        require('functions/users/json_get.php');
    }
}

if($_REQUEST['c'] == 'user') {
    if($_GET['a'] == 'save') {
        require('functions/users/user_save.php');
    }

    if($_GET['a'] == 'delete') {
        require('functions/users/user_delete.php');
    }
}


?>
