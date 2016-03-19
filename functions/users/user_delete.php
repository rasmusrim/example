<?php

$dbObj->query('DELETE FROM users WHERE userID = "' . $dbObj->clean($_GET['userID']) . '"');
?>

