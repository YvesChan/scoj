<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
	require_once("./db_info.inc.php");
	if(isset($OJ_LANG)){
		require_once("../lang/$OJ_LANG.php");
	}else{
		require_once("./lang/en.php");
	}
    function checkmail(){
		
		$sql="SELECT count(1) FROM `mail` WHERE 
				new_mail=1 AND `to_user`='".$_SESSION['user_id']."'";
		$result=mysql_query($sql);
		if(!$result) return false;
		$row=mysql_fetch_row($result);
		$retmsg="<span id=red>(".$row[0].")</span>";
		mysql_free_result($result);
		return $retmsg;
	}



	$profile="";

		if (isset($_SESSION['user_id'])){
				$sid=$_SESSION['user_id'];
				$profile.= "<i class='icon-user icon-white'></i><a class='brand ' href=./modifypage.php>$MSG_USERINFO</a>;<a class='brand pull-right' href='./userinfo.php?user=$sid'><span id=red>$sid</span></a>";
				$mail=checkmail();
				if ($mail)
					$profile.= "<i class='icon-envelope icon-white'></i><a class='brand '  href=./mail.php>$mail</a>";
        $profile.="<a class='brand' href='./status.php?user_id=$sid'><span id='red'>Recent</span></a>";
                                
				$profile.= "<a class='brand ' href=./logout.php>$MSG_LOGOUT</a>";
			}else{
				$profile.= "<form class='navbar-form ' action='./login.php' method='post'>\
				<input class='span2' name='user_id' type='text' placeholder='User ID'>\
				<input class='span2' name='password' type='password' placeholder='Password'>\
				<button type='submit' class='btn'>Sign in</button>";
				if($OJ_LOGIN_MOD=="hustoj"){
					$profile.= "<a class='btn' href=./registerpage.php >$MSG_REGISTER</a></form>";
				}
				else{
					$profile.="</form>";
				}
			}
			if (isset($_SESSION['administrator'])||isset($_SESSION['contest_creator'])||isset($_SESSION['problem_editor'])){
           $profile.= "<a class='brand pull-right' href=./admin/>$MSG_ADMIN</a>";
			
			}
		?>
document.write("<?php echo ( $profile);?>");
