<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles2.css" />
<link rel="shortcut icon" href="FILE GOES HERE..." />
<title>Signup Status</title>
</head>

<body style="font-family:Verdana,Tahoma,Arial,sans-serif;font-size:12px;">
<div class="center" style="background-color:white;" width="100%"><img height="70" src="img/CROWD_FORCE_X.png" alt="CrowdForce" /></div>
<br /><br />
<div class="center">
<?php
// Replace this with a reasonable encryption system.
function scramble($password) {
    $i = 0;
    $result = "";
    while ($i < strlen($password)) {
        $result .= chr(ord(substr($password, $i, 1)) ^ 14);
        $i++;
    }
    return $result;
}
// END FUNCTION

if ($_POST["password"] !== $_POST["password2"]) {
    echo "Your passwords do not match.<br /><br /><a href=\"Signup.php\">Back to Sign Up</a>";
} else {
    if (strstr(file_get_contents("users.txt"), $_POST["accname"]) != false) {
        echo "Sorry, the account name " . $_POST["accname"] . " is invalid or unhashable in logarithmic time. Try again with a different one.<br /><br /><a href=\"signup.php\">Back to Sign Up</a>";
    } else {
        file_put_contents("users.txt", "\n" . $_POST["accname"] . "[#]" . scramble($_POST["password"]) . "[#]" . $_POST["email"] . "\n", FILE_APPEND);
        echo "Thank you for registering. Please post some CrowdForce bounties soon!<br /><br /><a href=\"CrowdForce.php\">Go to main page</a>";
    }
}

// This sometimes doesn't work. Weird...
setcookie("loggedin", $_POST["accname"] . "[#]" . $_POST["dname"] . "[#]" . $_POST["password"], time() +  604800);
?>
</div>
</body>
</html>
