<!DOCTYPE html>
<html>
<head>
<title>Upload Bounty Image</title>
</head>
<body>
<?php
// The user has messed up. Send him back so he can figure out what to do.
if (strlen($_GET["main"]) < 3) {
    echo "<script type=\"text/javascript\">window.location=\"http://www.CrowdForce.com\";</script>";
    exit(0);
}

function possesses($someString, $subString) {
    return strstr($someString, $subString) !== FALSE;
}

$rickRoll = "<script type=\"text/javascript\">window.location=\"http://www.CrowdForce.com/notallowed/error.html\";</script>";
$realRoll = "<script type=\"text/javascript\">window.location=\"http://www.google.com/";</script>";

$allowedExts = array("jpg", "jpeg", "gif", "png", "bmp", "tiff");
$extension = end(explode(".", $_FILES["file"]["name"]));
if (in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        echo $rickRoll;
    } else {
        /** Is the user trying to hack CrowdForce? */
        if (possesses($_FILES["file"]["name"], "/") ||
            possesses($_FILES["file"]["name"], "\\") ||
            possesses($_FILES["file"]["name"], "..") ||
            possesses($_FILES["file"]["name"], "$") ||
            possesses($_FILES["file"]["name"], "--") ||
            possesses($_FILES["file"]["name"], "<") ||
            possesses($_FILES["file"]["name"], ">") ||
            possesses($_FILES["file"]["name"], ";") ||
            possesses($_FILES["file"]["name"], "&") ||
            possesses($_FILES["file"]["name"], "\r") ||
            possesses($_FILES["file"]["name"], "\n") ||
            possesses($_FILES["file"]["name"], "\t") ||
            possesses($_FILES["file"]["name"], "\a") ||
            possesses($_FILES["file"]["name"], "php") ||
            possesses($_FILES["file"]["name"], "rb") ||
            possesses($_FILES["file"]["name"], "js") ||
            possesses($_FILES["file"]["name"], "py") ||
            possesses($_FILES["file"]["name"], "DROP") ||
            possesses($_FILES["file"]["name"], "TABLE") ||
            possesses($_FILES["file"]["name"], "echo") ||
            possesses($_FILES["file"]["name"], "bash") ||
            possesses($_FILES["file"]["name"], "ftquota") ||
            possesses($_FILES["file"]["name"], "ftpquota") ||
            possesses($_FILES["file"]["name"], ":") ||
            possesses($_FILES["file"]["name"], "@") ||
            possesses($_FILES["file"]["name"], "#") ||
            possesses($_FILES["file"]["name"], "DERP") ||
            possesses($_FILES["file"]["name"], "HERP") ||
            possesses($_FILES["file"]["name"], "%") ||
            possesses($_FILES["file"]["name"], "*") ||
            possesses($_FILES["file"]["name"], "^") ||
            possesses($_FILES["file"]["name"], "=")) {
            /** If he's trying to hack us, then he needs to leave. */
            /** NOTE: THIS WILL SEND HIM TO GOOGLE.COM */
            echo $realRoll;
        } else {
            $sep = "echoechoechoecho";
            /** Okay, the user is probably not trying to
             *  mess up CrowdForce. */
            echo "Upload Name: " . $_FILES["file"]["name"] . "<br />";
            echo "Image Type: " . $_FILES["file"]["type"] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"] / 1024.0) . " kilobytes<br />";
            /** echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />"; **/
            if (file_exists("uploads/" . $_POST["main"] . $sep . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
                echo $rickRoll;
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                                   "uploads/" . $_POST["main"] . $sep . $_FILES["file"]["name"]);
                /** echo "Stored in: " . "uploads/" . $_FILES["file"]["name"]; */
                echo "<br />Thanks for using the CrowdForce Uploader!<br /><br />The image of your bounty offer is located at...<br />";
                $finalized = "http://www.CrowdForce.com/disk/uploads/" . $_POST["main"] . $sep . $_FILES["file"]["name"];
                echo "<a href=\"" . $finalized . "\" target=\"_blank\">http://www.CrowdForce.com/bounty_art/" . $_FILES["file"]["name"] . "</a>";
            }
        }
    }
} else {
    // This is not really a rickroll.
    // Just sends the user back to the index.php
    // of CrowdForce.
    echo $rickRoll;
}
?>
<br /><br /><br /><br />
</body>
</head>
