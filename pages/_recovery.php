<?PHP
######################################
# ����� Sale-script.ru
# ICQ:27837023
######################################
$_OPTIMIZATION["title"] = "�������������� ������";
$_OPTIMIZATION["description"] = "�������������� �������� ������";
$_OPTIMIZATION["keywords"] = "�������������� �������� ������";

if(isset($_SESSION["user_id"])){ Header("Location: /account"); return; }

?>
<div class="s-bk-lf">
	<div class="acc-title">�������������� ������</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
<?PHP

	if(isset($_POST["email"])){

		if(isset($_SESSION["captcha"]) AND strtolower($_SESSION["captcha"]) == strtolower($_POST["captcha"])){
		
		unset($_SESSION["captcha"]);
		
		$email = $func->IsMail($_POST["email"]);
		$time = time();
		$tdel = $time + 60*15;
		
			if($email !== false){
				
				$db->Query("DELETE FROM db_recovery WHERE date_del < '$time'");
				$db->Query("SELECT COUNT(*) FROM db_recovery WHERE ip = INET_ATON('".$func->UserIP."') OR email = '$email'");
				if($db->FetchRow() == 0){
				
					$db->Query("SELECT id, user, email, pass FROM al_polzov_a WHERE email = '$email'");
					if($db->NumRows() == 1){
					$db_q = $db->FetchArray();
					
					# ������ ������ � ��
					$db->Query("INSERT INTO db_recovery (email, ip, date_add, date_del) VALUES ('$email',INET_ATON('".$func->UserIP."'),'$time','$tdel')");
					
					# ���������� ������
					$sender = new isender;
					$sender -> RecoveryPassword($db_q["email"], $db_q["pass"], $db_q["email"]);
					
					echo "<center><font color = 'green'><b>������ ��� ����� ���������� �� Email</b></font></center>";
					?>
					</div>
					<div class="clr"></div>	
					<?PHP
					return; 
					
					}else echo "<center><font color = 'red'><b>������������ � ����� Email �� ���������������</b></font></center>";
				
				}else echo "<center><font color = 'red'><b>�� ��� Email ��� IP ��� ��� ��������� ������ �� ��������� 15 �����</b></font></center>";
				
			}else echo "<center><font color = 'red'><b>Email ������ �������</b></font></center>";
		
		}else echo "<center><font color = 'red'><b>������� � �������� ������� �������</b></font></center>";
	
	}

?>

<BR />
<form action="" method="post">
<table width="550" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" width="250">Email (�� ���� ����� ������ ������):</td>
    <td align="left" width="250"><input name="email" type="text" size="25" maxlength="50" value="<?=(isset($_POST["email"])) ? $_POST["email"] : false; ?>"/></td>
  </tr>
  
  <tr>
    <td align="left" width="250" style="padding-top:20px;">
	<a href="#" onclick="ResetCaptcha(this);"><img src="/captcha.php?rnd=<?=rand(1,10000); ?>"  border="0" style="margin:0;"/></a>
	</td>
    <td align="left" width="250" style="padding-top:20px;">������� ������� � ��������<input name="captcha" type="text" size="25" maxlength="50" /></td>
  </tr>
  
  <tr>
    <td colspan="2" align="center"><BR /><input type="submit" value="������������" style="height: 30px;"></td>
  </tr>
</table>
</form>
</div>
<div class="clr"></div>	