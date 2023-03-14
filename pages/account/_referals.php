<div class="s-bk-lf">
	<div class="acc-title">Партнерская программа</div>
</div>

<?PHP
$_OPTIMIZATION["title"] = "Аккаунт - Партнерская программа";
$user_id = $_SESSION["user_id"];
$db->Query("SELECT COUNT(*) FROM al_polzov_a WHERE referer_id = '$user_id'");
$refs = $db->FetchRow();
?>  

<div class="silver-bk">Приглашайте в игру своих друзей и знакомых, Вы будете получать 10% от каждого пополнения баланса приглашенным Вами человеком на счет для ВЫВОДА. Доход ни чем не ограничен. Даже несколько приглашенных могут 
принести вам более 100 000 серебра. 
Ниже представлена ссылка для привлечения Вами людей.<br /><br />


<center>Реферальная ссылка: <font color="#000;">http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?></font></center><p>

<center>Ссылка на баннер: <font color="#000;"> http://<?=$_SERVER['HTTP_HOST']; ?>/img/468x60.gif</font></center><p>

<center><font color="blue;">Или баннер:</font></center>
<center><font color="#5ca028"><h2>Баннер 468х60</h></font><p>
<img src="/img/468x60.gif">
<br>
<p><textarea onmouseover="this.select()" style="width: 495px; height: 55px;">&lt;a href="http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?>" target="_blank"&gt;
&lt;img src="http://<?=$_SERVER['HTTP_HOST']; ?>/img/468x60.gif" /&gt;&lt;/a&gt;
</textarea>
<br>
</center><p>
<p><center>Количество ваших рефералов: <font color="#000;"><?=$refs; ?> чел.</font></center></p>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width='98%'>
<tr height='25' valign=top align=center>
	<td class="m-tb"> Логин </td>
	<td class="m-tb"> Дата регистрации </td>
	<td class="m-tb"> Доход от партнера </td>
</tr>

<?PHP
  $all_money = 0;
  $db->Query("SELECT al_polzov_a.user, al_polzov_a.date_reg, db_users_b.to_referer FROM al_polzov_a, db_users_b 
  WHERE al_polzov_a.id = db_users_b.id AND al_polzov_a.referer_id = '$user_id' ORDER BY to_referer DESC");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>
		<tr height="25" class="htt" valign="top" align="center">
			<td align="center"> <?=$ref["user"]; ?> </td>
			<td align="center"> <?=date("d.m.Y в H:i:s",$ref["date_reg"]); ?> </td>
			<td align="center"> <?=sprintf("%.2f",$ref["to_referer"]); ?> </td>
		</tr>

		<?PHP
		$all_money += $ref["to_referer"];
		}
  
	}else echo '<tr><td align="center" colspan="3">У вас нет рефералов</td></tr>'
  ?>

</table>

<div class="clr"></div>	
</div>

<div class="clr"></div>	