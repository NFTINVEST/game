                                                                <div class="s-bk-lf">
	<div class="acc-title">Прибыль</div>
</div>
<div class="silver-bk">Здесь Вы можете собрать всю прибыль которую принесли Ваши майнеры. Прибыль можно собирать не чаще чем 1 раз в 10 минут!
<BR />
<BR />
<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Склад";
$usid = $_SESSION["user_id"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_confligsg WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

	if(isset($_POST["sbor"])){
	
		if($user_data["last_sbor"] < (time() - 600) ){
		
			$tomat_s = $func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);
			$straw_s = $func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);
			$pump_s = $func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);
			$peas_s = $func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);
			$pean_s = $func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);
			
			$db->Query("UPDATE db_users_b SET 
			a_b = a_b + '$tomat_s', 
			b_b = b_b + '$straw_s', 
			c_b = c_b + '$pump_s', 
			d_b = d_b + '$peas_s', 
			e_b = e_b + '$pean_s', 
			all_time_a = all_time_a + '$tomat_s',
			all_time_b = all_time_b + '$straw_s',
			all_time_c = all_time_c + '$pump_s',
			all_time_d = all_time_d + '$peas_s',
			all_time_e = all_time_e + '$pean_s',
			last_sbor = '".time()."' 
			WHERE id = '$usid' LIMIT 1");
			
			echo "<center><font color = 'green'><b>Вы успешно собрали всю прибыль.</b></font></center><BR />";
			
			$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
			$user_data = $db->FetchArray();
			
		}else echo "<center><font color = 'red'><b>Прибыль можно собирать не чаще 1-го раза за 10 минут</b></font></center><BR />";
	
	}

 
 
?>
<form action="" method="post">
<div class="clr"></div>	
<div class="sm-line">
<img src="/img/fruit/1.png" alt="" width="110" height="110" /><font color="#160E8B">Miner Mini </font> <font color="#000">: <?=$func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]);?> монет</font></div>
<div class="sm-line">
<img src="/img/fruit/2.png" alt="" width="110" height="110" /><font color="#160E8B">Miner Normal <font color="#000">: <font color="#000"> <?=$func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"]);?> монет</font></div>

<div class="sm-line"><img src="/img/fruit/3.png" alt="" width="110" height="110"/><font color="#160E8B">Miner Standart <font color="#000">: <font color="#000"> <?=$func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"]);?> монет</font></div>

<div class="sm-line"><img src="/img/fruit/4.png" alt="" width="110" height="110" /><font color="#160E8B">Miner Farm <font color="#000">: <font color="#000"> <?=$func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"]);?> монет</font></div>

<div class="sm-line"><img src="/img/fruit/5.png" alt="" width="110" height="110" /><font color="#160E8B">Miner Mega Farm <font color="#000">: <font color="#000"> <?=$func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"]);?> монет</font></div>
<div class="clr"></div>
<center><input type="submit" name="sbor" value="Собрать всё" style="height:30px;"/></center>
</form>
                   


  
</table>
<div class="clr"></div>
</div>

							<div class="clr"></div>	
                            
                            