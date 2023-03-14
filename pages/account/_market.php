<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Торговая лавка";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_confligsg WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

?>

<div class="s-bk-lf">
	<div class="acc-title">Рынок сбыта</div>
</div>
<div class="silver-bk"><br />

<font color = '000000'>Здесь Вы можете обменять все свои монеты на игровую валюту "Серебро"!

<br><br>


Курс обмена: <font color="green"><?=$sonfig_site["items_per_coin"]; ?> монет = 1 серебро</font>
<div class="clr"></div><BR />
<?PHP
# Продажа
if(isset($_POST["sell"])){

$all_items = $user_data["a_b"] + $user_data["b_b"] + $user_data["c_b"] + $user_data["d_b"] + $user_data["e_b"] + $user_data["f_b"] + $user_data["g_b"] + $user_data["h_b"] + $user_data["j_b"];

	if($all_items > 0){
	
		$money_add = $func->SellItems($all_items, $sonfig_site["items_per_coin"]);
		
		$tomat_b = $user_data["a_b"];
		$straw_b = $user_data["b_b"];
		$pump_b = $user_data["c_b"];
		$pean_b = $user_data["d_b"];
		$peas_b = $user_data["e_b"];
		$peasf_b = $user_data["f_b"];
		$peasg_b = $user_data["g_b"];
		$peash_b = $user_data["h_b"];
		$peasj_b = $user_data["j_b"];
		
		$money_b = ( (100 - $sonfig_site["percent_sell"]) / 100) * $money_add;
		$money_p = ( ($sonfig_site["percent_sell"]) / 100) * $money_add;
		
		# Обновляем юзверя
		$db->Query("UPDATE db_users_b SET money_b = money_b + '$money_b', money_p = money_p + '$money_p', a_b = 0, b_b = 0, c_b = 0, d_b = 0, e_b = 0, f_b = 0, g_b = 0, h_b = 0, j_b = 0 
		WHERE id = '$usid'");
		
		$da = time();
		$dd = $da + 60*60*24*15;
		
		# Вставляем запись в статистику
		$db->Query("INSERT INTO db_sell_items (user, user_id, a_s, b_s, c_s, d_s, e_s, f_s, g_s, h_s, j_s, amount, all_sell, date_add, date_del) VALUES 
		('$usname','$usid','$tomat_b','$straw_b','$pump_b','$pean_b','$peas_b','$peasf_b','$peasg_b','$peash_b','$peasj_b','$money_add','$all_items','$da','$dd')");
		
		echo "<center><font color = 'green'><b>Вы успешно обменяли {$all_items} монет на сумму {$money_add} серебра </b></font></center><BR />";
		
		$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
		$user_data = $db->FetchArray();
		
	}else echo "<center><font color = 'red'><b>Вам нечего менять</b></font></center><BR />";

}
?>	       
<form action="" method="post">
<table width="480" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" align="center" valign="middle">&nbsp;</td>
    <td height="30" align="center" valign="middle"><strong>У вас в наличии</strong></td>
    <td height="30" align="center" valign="middle"><strong>На сумму (серебра)</strong></td>
  </tr>
  <tr>
    <td width="30" height="30" align="center" valign="middle"><div class="sm-line-nt"><img src="/img/fruit/1.png" width="70" height="70" /></div></td>
    <td align="center" valign="middle"><?=$user_data["a_b"]; ?> монет </td>
    <td align="center" valign="middle"><?=$func->SellItems($user_data["a_b"], $sonfig_site["items_per_coin"]); ?></td>
  </tr>
  <tr>
    <td width="30" height="30" align="center" valign="middle"><div class="sm-line-nt"><img src="/img/fruit/2.png" width="70" height="70" /></div></td>
    <td align="center" valign="middle"><?=$user_data["b_b"]; ?> монет </td>
    <td align="center" valign="middle"><?=$func->SellItems($user_data["b_b"], $sonfig_site["items_per_coin"]); ?></td>
  </tr>
  <tr>
    <td width="30" height="30" align="center" valign="middle"><div class="sm-line-nt"><img src="/img/fruit/3.png" width="70" height="70" /></div></td>
    <td align="center" valign="middle"><?=$user_data["c_b"]; ?> монет </td>
    <td align="center" valign="middle"><?=$func->SellItems($user_data["c_b"], $sonfig_site["items_per_coin"]); ?></td>
  </tr>
  <tr>
    <td width="30" height="30" align="center" valign="middle"><div class="sm-line-nt"><img src="/img/fruit/4.png" width="70" height="70" /></td>
    <td align="center" valign="middle"><?=$user_data["d_b"]; ?> монет </td>
    <td align="center" valign="middle"><?=$func->SellItems($user_data["d_b"], $sonfig_site["items_per_coin"]); ?></td>
  </tr>
  <tr>
    <td width="30" height="30" align="center" valign="middle"><div class="sm-line-nt"><img src="/img/fruit/5.png" width="70" height="70" /></div></td>
    <td align="center" valign="middle"><?=$user_data["e_b"]; ?> монет </td>
    <td align="center" valign="middle"><?=$func->SellItems($user_data["e_b"], $sonfig_site["items_per_coin"]); ?></td>
  </tr>

   

  

  
  <tr>
    <td align="center" valign="middle" colspan="3">
	<BR />
	<input type="submit" name="sell" value="Обменять все" class="button_0" style="height: 30px;"></td>
  </tr>
  
</table>
</form>

</div>
								
<div class="clr"></div>	