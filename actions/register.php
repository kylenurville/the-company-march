<?php
require_once "../classes/user.php";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$origin = $_POST['btn_register']; // $_POST['btn_register'] can be either register or dashboard
// btn_register is the name of the button
// $origin = "register" or $origin = "dashboard"

$user = new User;
$user->createUser($first_name, $last_name, $username, $password, $origin);

// built-in PHP function
// used for encryption
// password_hash($login_password, <algorithm>)
// password_hash("kyle123", PASSWORD_BCRYPT);
// password_hash("kyle123", PASSWORD_ARGON2);
// PASSWORD_DEFAULT will use the strongest algorithm available
// PASSWORD_BCRYPT - uses $2y$ format, produces 60-character long string
