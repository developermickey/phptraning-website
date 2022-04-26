<div style="background:url(images/top1.jpg) repeat-x;height: 100px;background: linear-gradient(#fff,#ddd);">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="130" align="left"><img src="images/logo.png"  border="0" alt="NVIRON" style="padding:10px 0 0 0"/></td>
	 <td align="left">
		<div>
			<div class="header-text"> Admin Panel</div>
			<div>&nbsp;</div>

		</div>
	</td>
    <td width="180" align="center" valign="top">
	<?php if(isLoggedin()) { ?>
	<div class="headerlinkbox">
        <div class="headerlinks">Welcome</div>
        <div class="headerlinks"><?=$_SESSION[SES]['admin']['admin_name']?><br />You are signed in as: <b><?=$_SESSION[SES]['admin']['admin_user']?></b> &nbsp;</div>
        <div class="headerlinks"><a href="logout.php" class="signout">Signout</a></div>
      </div>
	 <?php } else {echo '&nbsp';}?> 
	 </td>
  </tr>
</table>
</div>
