<!DOCTYPE HTML>
<html>

<?php
// We want to keep track of website statistics (actually, the technical term is 'parameters')
function incrementFile($fileName) {
    file_put_contents($fileName, strval(intval(file_get_contents($fileName)) + 1));
}
incrementFile("CrowdForceMainCounter.db");
?>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="sam.js"></script>
<script type="text/javascript">
function goAway() {
    // Note: this is a placeholder URL.
    window.location = "http://www.CrowdForce.com/notready/";
}
</script>
<!--An external favicon is required since browsers aren't too bright-->
<link rel="shortcut icon" href="PUT SOME FILE HERE..." />
<title>CrowdForce</title>
</head>

<body onload="pageStartup();">
<div class="bar">
<form method="post" id="loginform" name="loginform" action="http://CrowdForce.com/signup/" name="login" onsubmit="">
<span class="bold medium_indent">CrowdForce</span>
<input class="small_indent inputbox" id="email" type="text" value="Email" name="email" />
<input class="small_indent inputbox" id="pass" type="password" value="" name="pass" />
<a style="font-family:Euphemia,Verdana,Tahoma,Arial,sans-serif;cursor:hand;cursor:pointer;"
 class="small_indent silverlink" onclick="document.forms['loginform'].submit();">Login</a>
&nbsp;
<a style="font-family:Euphemia,Verdana,Tahoma,Arial,sans-serif;cursor:hand;cursor:pointer;"
 class="small_indent silverlink" onclick="document.forms['loginform'].submit();">Register</a>
<span id="clocktime" class="lock_right timekeeper"></span>
</form>
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<table class="centerobject">
<tr>
<td class="center">
<img src="http://hosted.crowdforce.com/resources/images/bannerForCrowdForce.png" alt="CROWD FORCE" /><br />
Please login or register above. Thank you!
</td>
</table>


</body></html>
