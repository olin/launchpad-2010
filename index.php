<?php

/*
 * Launchpad2 user-interface code
 * Written by Jeffrey Stanton (Olin 2010) http://nomagicsmoke.com/
 * Inspired by work by Gregory Marra (Olin 2010)
 * This software uses JQuery, licensed under the BSD license.
 */
 
/*************** BSD LICENSE *****************

Copyright (c) 2010, Jeffrey Stanton
All rights reserved.

Redistribution and use in source and binary forms, with or without modification,
are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this
  list of conditions and the following disclaimer.

* Redistributions in binary form must reproduce the above copyright notice, this
  list of conditions and the following disclaimer in the documentation and/or
  other materials provided with the distribution.

* Neither the name of JEFFREY STANTON nor the names of LAUNCHPAD2's contributors
  may be used to endorse or promote products derived from this software without
  specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR
ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON
ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

*/

?>
<html>
<head>
<meta http-equiv="Refresh" content="0;url=http://www.fwol.in" />
<meta name="viewport" content="width=684">
<title>Olin Launchpad 2.0</title>
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/bluebar/theme.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="css/rocket.png">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/lp2ui.js"></script>
</head>
<body>

<div class="BannerAbout">
<p>Launchpad is a list of links for the <a href="http://www.olin.edu" target="_blank">Olin College</a> community.<br>
It is a work in progress by <a href="http://nomagicsmoke.com/" target="_blank" title="Jeffrey Stanton's Website [new window]">Jeffrey Stanton</a>, now tended by <a href="http://core.olin.edu/" title="CORe's Website [new window]" target="_blank">CORe</a><br>
Based on the original version by <a href="http://www.grgmrr.com/" title="Greg Marra's Website [new window]" target="_blank">Greg Marra</a> (Olin 2010).</p>
</div>

<div class="searchbox">
<form id="filterForm"><img id="logo" src="css/logo.png" /><span class="title">Launchpad<sup>2.0</sup></span> Filter by Name: <input type="text" size="20" name="appName" id="appName" /> <span id="singleReminder">Press ENTER to go to <span id="singleResultName"></span></span></form>
</div>


<div id="appList">
<?php

$userCat = "main";
if(isset($_REQUEST['c'])){
	$userCat = strtolower($_REQUEST['c']);
}else if(isset($_REQUEST['cat'])){
	$userCat = strtolower($_REQUEST['cat']);
	}
if($userCat!="main"){ ?>
<a href="./" target="_parent"><span class="linkblock category">All Categories</span></a>
<?php }


$lines = explode("\n",file_get_contents('./data/links.tsv'));
foreach($lines as $line){
	$parsed = explode("\t",trim($line));
	if(count($parsed)!=5){ continue; }
	$cat = $parsed[0];
	if($cat!=$userCat){ continue; }
	$type = $parsed[1];
	$title = $parsed[2];
	$icon = $parsed[3];
	$url = $parsed[4];
	if($type=='category'){
		$title = "[+] $title";
	}
	?>
<a href="<?php print htmlspecialchars($url); ?>" title="<?php print htmlspecialchars($title); ?>" target="_parent"><span class="linkblock <?php print htmlspecialchars($type); ?>" style="background-image:url('images/<?php print htmlspecialchars($icon); ?>');"><?php print htmlspecialchars($title); ?></span></a>
<?php
	}


?>
</div>
<div style="clear:both;"><br /></div>

</body>
</html>
