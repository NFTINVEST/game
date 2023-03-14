<?PHP
$_OPTIMIZATION["title"] = "Регистрация";
$_OPTIMIZATION["description"] = "Регистрация пользователя в системе";
$_OPTIMIZATION["keywords"] = "Регистрация нового участника в системе";

if(isset($_SESSION["user_id"])){ Header("Location: /account"); return; }
?>
<div class="s-bk-lf">
	<div class="acc-title">Регистрация</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
<?PHP
	
	# Регистрация

	if(isset($_POST["login"])){
		if(isset($_POST["purse"])){
	
		function purse($purse){
		if(!preg_match("/^[0-9]{7,8,9}$/", $purse)!= "P") return false;
		     return $purse;
		}
	if(isset($_SESSION["captcha"]) AND strtolower($_SESSION["captcha"]) == strtolower($_POST["captcha"])){
	unset($_SESSION["captcha"]);

	$login = $func->IsLogin($_POST["login"]);
	$pass = $func->IsPassword($_POST["pass"]);
	$rules = isset($_POST["rules"]) ? true : false;
		
	$time = time();
	$ip = $func->UserIP;
	$ipregs = $db->Query("SELECT * FROM `al_polzov_a` WHERE INET_NTOA(al_polzov_a.ip) = '$ip' ");
	$ipregs = $db->NumRows();
        $purse = purse($_POST["purse"]);
	$purse = ($purse);

	$email = $func->IsMail($_POST["email"]);
	$referer_id = (isset($_COOKIE["i"]) AND intval($_COOKIE["i"]) > 0 AND intval($_COOKIE["i"]) < 1000000) ? intval($_COOKIE["i"]) : 1;
	$referer_name = "";
	if($referer_id != 1){
		$db->Query("SELECT user FROM al_polzov_a WHERE id = '$referer_id' LIMIT 1");
		if($db->NumRows() > 0){$referer_name = $db->FetchRow();}
		else{ $referer_id = 1; $referer_name = "admin"; }
	}else{ $referer_id = 1; $referer_name = "admin"; }
	
		if($rules){
			if($ipregs == 0) {

			if($email !== false){
		
			if($login !== false){
			
				if($pass !== false){


			
					if($pass == $_POST["repass"]){
					
if($purse !== false){
						$db->Query("SELECT COUNT(*) FROM al_polzov_a WHERE user = '$login'");
						if($db->FetchRow() == 0){
						
						# Регаем пользователя

						$db->Query("INSERT INTO al_polzov_a (user, email, pass, referer, referer_id, date_reg, ip) 
						VALUES ('$login','{$email}','$pass','$referer_name','$referer_id','$time',INET_ATON('$ip'))");
						
						$lid = $db->LastInsert();
						
						$db->Query("INSERT INTO db_users_b (id, user, a_t, purse, last_sbor) VALUES ('$lid','$login','1','$purse', '".time()."')");
						
$db->Query("UPDATE db_users_b SET money_b = money_b + 100 WHERE id = '$referer_id'");

						# Вставляем статистику
						$db->Query("UPDATE db_stats SET all_users = all_users +1 WHERE id = '1'");

						
						echo "<center><b><font color = 'green'>Вы успешно зарегистрировались. Используйте форму слева для входа в аккаунт</font></b></center><BR />";
						?></div>
						<div class="clr"></div>	
						<?PHP
						return;
						}else echo "<center><b><font color = 'red'>Указанный логин уже используется</font></b></center><BR />";
						
					}else echo "<center><b><font color = 'red'>Кошелек Payeer имеет неверный формат</font></b></center><BR />";
			
				}else echo "<center><b><font color = 'red'>Пароль заполнен неверно</font></b></center><BR />";
			
			}else echo "<center><b><font color = 'red'>Короткий пароль</font></b></center><BR />";

		}else echo "<center><font color = 'red'><b>Логин заполнен неверно</b></font></center>";
		
		}else echo "<center><font color = 'red'><b>Е-мейл имеет не верный формат </b></font></center>";

		}else echo "<center><b><font color = 'red'>Регистрация с этого IP уже производилась!</font></b></center><BR />";
	
		}else echo "<center><font color = 'red'><b>Вы не подтвердили правила </b></font></center>";

		}else echo "<center><font color = 'red'><b>Символы с картинки введены неверно!</b></font></center><BR />";

                }else echo "<center><font color = 'green'><b>Введите кошелек Payeer</b></font></center><BR />";
	}
	
					
					
				
	
?>


<BR />
<form action="" method="post">
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" style="padding:3px;">Ваш псевдоним: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="login" type="text" size="25" maxlength="10" value="<?=(isset($_POST["login"])) ? $_POST["login"] : false; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">Поле псевдоним должно иметь от 4 до 10 символов (только англ. символы).</td>
    </tr>
<tr>
    <td align="left" style="padding:3px;">Email: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="email" type="text" size="25" maxlength="50" value="<?=(isset($_POST["email"])) ? $_POST["email"] : false; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
    </tr>
  <tr>
    <td align="left" style="padding:3px;">Пароль: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="pass" type="password" size="25" maxlength="20" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">Поле Пароль должно иметь от 6 до 20 символов (только англ. символы).</td>
    </tr>
  <tr>
    <td align="left" style="padding:3px;">Пароль еще раз: <font color="#FF0000">*</font></td>
    <td align="left" style="padding:3px;"><input name="repass" type="password" size="25" maxlength="20" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">Пароли должны совпадать.</td>
    </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
    </tr>
 <tr>
    <td><b>Кошелек Payeer (на него будут делаться выплаты):</b></td>
    <td align="center"><input type="login" name="purse" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">Кошелек Payeer должен иметь  8 - 10 символов.</td>
    </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="padding:3px;">
	С <a href="/rules" target="_blank" class="stn">правилами</a> проекта ознакомлен(а) и принимаю: <input name="rules" type="checkbox" /></td>
  </tr>
<tr>
    <td align="left" style="padding:3px;">
	<a href="#" onclick="ResetCaptcha(this);"><img src="/captcha.php?rnd=<?=rand(1,10000); ?>"  border="0" style="margin:0;"/></a>
	</td>
    <td align="left" style="padding:3px;">Введите символы с картинки<input name="captcha" type="text" size="25" maxlength="50" /></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="padding:3px;"><input name="registr" type="submit" value="Зарегистрироваться" style="height: 30px;"></td>
  </tr>
</table>
</form>

</div>
<div class="clr"></div>	