<?php

if($_GET['userID'] == 'new') {
    $userObj = new User();
} else {
    $userObj = new User($_GET['userID']);
}

$userObj->setFirstname($_GET['firstname']);
$userObj->setLastname($_GET['lastname']);
$userObj->setEmail($_GET['email']);

if($_GET['password']) {
    $userObj->setPasswordHash(md5($_GET['password']));
}

// This function returns the ID. Return it to browser if new user.
print($userObj->save());

