<?php
include "../classes/user.php";

$user_id = $_GET['user_id'];
$user = new User;
$user->deleteUser($user_id);