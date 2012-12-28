<!DOCTYPE HTML>
<html>

<?php
function incrementFile($fileName) {
    file_put_contents($fileName, strval(intval(file_get_contents($fileName)) + 1));
}
incrementFile("X_V_I_COUNTER.db");
?>

<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="CrowdForce_titanium_edition.js"></script>
<!--An external favicon is required since browsers aren't too bright-->
<link rel="shortcut icon" href="NO IMAGE YET" />
<title>Share A Muse</title>
</head>

<body>
<div class="center" style="vertical-align:middle;background-color:white;" width="100%"><img height="70" src="img/banner4.png" alt="Share A Muse" />
<a style="position:absolute;right:175px;" href="UnderConstruction.php">
<img style="margin:18px 18px 18px 18px;border:none;" src="img/login.png" alt="Login" title="Log In" />
</a>
<a style="position:absolute;right:27px;" href="Signup.php">
<img style="margin:18px 18px 18px 18px;border:none;" src="img/signup.png" alt="Signup" title="Sign Up!" />
</a></div>

<table class="main">
<tr><td class="sidebar">
<div class="gadget_title">Bounties!</div>
<div class="center">
// OBVIOUSLY THIS PART IS NOT DONE YET... [ TODO ]
<img src="img/sp.png" alt="ERROR!" onclick="alert(3);" height="560" />
</div>

</td>
<td width="80%">
<table class="centerobject">
<tr><td>
<img src="img/THE_CROWD_FORCE.png" alt="Picture here" height="150" /></td>
<td>
<span style="font-weight:bold;font-size:4em;">C</span><span style="font-weight:bold;font-size:2em;">rowd 
</span><span style="font-weight:bold;font-size:4em;">F</span><span style="font-weight:bold;font-size:2em;">orce</span>
<br />
<!-- FINISH THIS SECTION! --><br />
<br />
</td>
</tr>
</table>

<table cellspacing="12" width="99%">
<tr>
<td width="33%"><b><span style="font-size:1.4em">BOUNTY NUMBER 001</span></b><br />
I am LOOKING for a songwriter who uses no white keys on the piano.<br />
<!-- MORE CONTENT TO COME... -->

</td>
<td width="33%"><b><span style="font-size:1.4em">BOUNTY NUMBER 002 (promo code = 33DSF93766LKJ)</span></b><br />
I am LOOKING for a chef who knows how to cook Japanese beef.<br />
<!-- MORE CONTENT TO COME... -->
</td>
</tr>
</table>
</td>
<td class="sidebar">
<div class="gadget_title">Market &amp; More Bounties</div>
<br />
<div class="center">
<img src="img/reqs.png" alt="Requests" />
</div>
</td>
</tr>
</table>
</body>

</html>
