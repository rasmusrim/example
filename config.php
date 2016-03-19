<?PHP
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

define(DEVELOPMENT, true);

setlocale(LC_ALL,"no_NO");
header('Content-Type: text/html; charset=UTF-8');
ini_set('default_charset', 'UTF-8');

// Set configuration
if(DEVELOPMENT) {

    $configArr['db_host'] = 'localhost';
    $configArr['db_username'] = 'root';
    $configArr['db_password'] = 'root';
    $configArr['db_database'] = 'userForm';

    define('ROOT_URL', 'http://localhost/userForm');
    
    
} else {

 
}

// Require dependencies
require('classes/mysql.class.php');
require('classes/user.class.php');

// Connect to DB
$dbObj = new mysql($configArr['db_host'], $configArr['db_username'], $configArr['db_password'], $configArr['db_database']);
$dbObj->set_charset('utf-8');


?>