<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Оборудование";
$usid = $_SESSION["user_id"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_confligsg WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

	if(isset($_POST["sbor11"])){
	
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
			
			echo "<center><font color = 'green'><b></b></font></center><BR />";
			
			$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
			$user_data = $db->FetchArray();
			
		}else echo "<center><font color = 'red'><b></b></font></center><BR />";
	
	}



?>
	

<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Профиль";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM al_polzov_a, db_users_b WHERE al_polzov_a.id = db_users_b.id AND al_polzov_a.id = '$user_id'");
$prof_data = $db->FetchArray();
?>



<div class="acc-title2"><font color = '000000'><?=$_SESSION["user"]; ?></div>
	<div class="field-gr"><a href="/account"><font color = '#0f5d6b'><b>Мой профиль</a></div>
	<div class="field-gr"><a href="/account/farm"><font color = '#0f5d6b'>Майнеры</a></div>
	<div class="field-gr"><a href="/account/store"><font color = '#0f5d6b'>Прибыль <td align="center"><font color="#2d7d0a"><?=$func->SumCalc($sonfig_site["a_in_h"], $user_data["a_t"], $user_data["last_sbor"]) + 
$func->SumCalc($sonfig_site["b_in_h"], $user_data["b_t"], $user_data["last_sbor"])+
$func->SumCalc($sonfig_site["c_in_h"], $user_data["c_t"], $user_data["last_sbor"])+
$func->SumCalc($sonfig_site["d_in_h"], $user_data["d_t"], $user_data["last_sbor"])+
$func->SumCalc($sonfig_site["e_in_h"], $user_data["e_t"], $user_data["last_sbor"])
;?></font></td><p></a></div>
	<div class="field-gr"><a href="/account/market"><font color = '#0f5d6b'>КАССА</a></div><br>

	<div class="field-gr"><a href="/competition"><font color = '#0f5d6b'>Конкурс рефералов</a></div>
	<div class="field-gr"><a href="/account/referals"><font color = '#0f5d6b'>Ваши рефералы</a></div>
	<div class="field-gr"><a href="/account/bonus"><font color = '#0f5d6b'>Ежедневный бонус</a></div>



	<div class="field-gr"><a href="/account/lottery"><font color = '#0f5d6b'>Лотерея</a></div><br>
		<div class="field-gr"><a href="/account/knb"><font color = '#0f5d6b'>КНБ</a></div>
		<div class="field-gr"><a href="/account/chat"><font color = '#0f5d6b'>ЧАТ</a></div>
	<div class="field-gr"><a href="/account/swap"><font color = '#0f5d6b'>Обменник</a></div><br>


	<div class="field-gr"><a href="/account/ins"><font color = '#0f5d6b'>Пополнить баланс</a></div>
  	<div class="field-gr"><a href="/account/payment"><font color = '#0f5d6b'>Выплаты </a></div>
		<div class="field-gr"><a href="/account/config"><font color = '#0f5d6b'>Настройки</a></div>
	<div class="field-gr"><a href="/account/exit"><font color = '#0f5d6b'>Выход из профиля</a></div></b>
	
	<div style="margin-top:20px;">
	<div class="acc-title2"><font color = '000000'>Ваш баланс</div>	
	<div class="field-gr"><font color="#0a435f"><a href="/account/insert"><font color="#000000">{!BALANCE_B!}</a>  <span style="margin:3px 10px 0px 0px;">[на покупки]</span></div>
	<div class="field-gr"><a href="/account/payment"><font color="#000000">{!BALANCE_P!}</a> <span style="margin:3px 10px 0px 0px;">[на вывод]</span></div><center><a href="http://sale-script.ru/" target="_blank">
<img src="http://sale-script.ru/img/0005.jpg" /></a></center></div>

