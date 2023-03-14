<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Орел и решка";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];



?>
<div class="s-bk-lf">
	<div class="acc-title">Орел и решка</div>
</div>
<div class="silver-bk">
<div class="clr"></div>	

<BR />
<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Ежедневный бонус";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];
$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();
if (isset($_POST['stavka'])) {
$naper = intval($_POST['naper']);
$stavka = intval($_POST['stavka']);
$nap = rand(1,3);
$time = time();
		if($stavka <= $user_data['money_b']) {
			if($stavka >= 10) {
				if($naper == 1 or $naper ==  2 ) {
					if($naper == $nap) {
					$sum = $stavka * 2;
					$win = 1;
						echo "<center><font color='green'>Выиграли :) </font>";
						
						$db->Query("UPDATE db_users_b SET money_b = money_b + '$sum' where id = '$usid'");
						$db->Query("INSERT INTO db_nap (user_id, login, date, summa, win) VALUES ('$usid', '$uname', '$time', '$sum', '$win')");
						
					} else {
						echo "<center><font color='red'>Проиграли! :)</font>";
						$win = 0;
						$db->Query("UPDATE db_users_b SET money_b = money_b - '$stavka' where id = '$usid'");
						$db->Query("INSERT INTO db_nap (user_id, login, date, summa, win) VALUES ('$usid', '$uname', '$time', '$stavka', '$win')");
					}
				}else echo "<center><font color='red'>Выберете сторону монеты!</font>";
			}else echo "<center><font color='red'>Минимальная ставка 10 серебра!</font>";
		}else echo "<center><font color='red'>недостаточно средств на балансе!</font>";
}
?>



<div class="clr"></div>	

Суть игры очень проста <BR />Необходимо угадать какая из сторон монеты выпадет!<BR />
В случае выигрыша ваша ставка увеличивается в 2 раза и зачисляется на баланс для покупок!
<BR /><BR />
<center>

<form method="post" action="">

<input class="lg" type="text" name="stavka" value="100"><br>
<center>
<table align="center">
<tr>
<td>
<?php
if ($win == 1 and $naper == 1) {
?>
<img src="/img/arel.png">
<? } else { ?>
<img src="/img/arel.png">
<? } ?>
</td>
<td>
&nbsp;
</td>
<td>
<?php
if ($win == 1 and $naper == 2) {
?>
<img src="/img/reshka.png">
<? } else { ?>
<img src="/img/reshka.png">
<? } ?>
</td>
<td>
&nbsp;
</td>
<td>
&nbsp;
</td>
</tr>


<tr>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="naper" value="1">
</td>
<td>
&nbsp;
</td>
<td>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="naper" value="2">
</td>
<td>
&nbsp;
</td>
<td>
&nbsp;
</td>
</tr>

</table>
</center>
<br>
<input class="btn_kup" type="submit" value="Играть">

</form>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h1>Ваши последние игры</h1></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">Сумма</td>
	<td align="center" class="m-tb">Дата</td>
	<td align="center" class="m-tb">Статус</td>
	
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_nap WHERE user_id = '$usid' ORDER BY id DESC LIMIT 20");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		if ($ref["win"] == 1) { 
		$winn = '<font color="green">Победа</font>'; 
		} else { 
		$winn = '<font color="red">Проигрыш</font>'; 
		}
		$date = date('d-m-Y', $ref["date"]);
		?>
		<tr class="htt">
    		<td align="center"><?=$ref["summa"]; ?> </td>
			<td align="center"><?=$date; ?></td>
			<td align="center"><?=$winn; ?></td>
    		
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="5">Нет записей</td></tr>'
  
  ?>

  
</table>

<div class="clr"></div>		
</div>



