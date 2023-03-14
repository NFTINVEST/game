<?PHP
$tfstats = time() - 60*60*24;
$db->Query("SELECT 
(SELECT COUNT(*) FROM al_polzov_a) all_users,
(SELECT SUM(insert_sum) FROM db_users_b) all_insert, 
(SELECT SUM(payment_sum) FROM db_users_b) all_payment, 
(SELECT COUNT(*) FROM al_polzov_a WHERE date_reg > '$tfstats') new_users");
$stats_data = $db->FetchArray();

?>
	<br>
<div class="stat">
	<div class="h-title">Статистика</div>
	<div class="st-lf">
	<div class="line"><font color="#000000">Всего участников: </div>
	<div class="line"><font color="#000000">Новых за 24 часа: </div>
	<div class="line"><font color="#000000">Выплачено всего: </div>
	<div class="line"><font color="#000000">Резерв проекта: </div>
	</div>
	<div class="st-rg">
	<div class="line-st"><?=$stats_data["all_users"]; ?> чел.</div>
	<div class="line-st"><?=$stats_data["new_users"]; ?> чел.</div>
	<div class="line-st"><a href="/payments" style="text-decoration:none; color: blue;"><?=sprintf("%.2f",$stats_data["all_payment"]); ?></a> р.</div>
	<div class="line-st"><?=sprintf("%.2f",$stats_data["all_insert"]-$stats_data["all_payment"]); ?> р.</div>
	</div>
	<div class="clr"></div>
	<div class="line"><img style="vertical-align:-5px; margin-right:5px;" src="/img/clock.png" /><font color="#000000">Мы работаем: 			<script type="text/javascript" language="javascript">
				/* <![CDATA[ */
				getPassedTime = (function () {
				  var
					nowDate = new Date( ),
					words = [
					  [365.25, ['год', 'года', 'лет']],
					  [30, ['месяц', 'месяца', 'месяцев']],
					  [1, ['день', 'дня', 'дней']]
					],
					getRightWord = function( num, wordsArr ) {
					  var decNum = num % 10;
					  if (num >= 100) num = num % 100;
					  if (num < 21 && num >= 5) return wordsArr[2];
					  if (decNum >= 5) return wordsArr[2]
					  if (decNum > 1 && decNum < 5) return wordsArr[1];
					  return wordsArr[0]
					}
				  ;
				  return function (date) {
					var 
					  x, difference, 
					  result = "", 
					  days = (nowDate - date) / 1000 / 60 / 60 / 24;
					for (x = 0; x < words.length; x++) {
					  if (days >= words[x][0]) {
						difference = days;
						days = days % words[x][0];
						difference = (difference - days) / words[x][0];
						result += "<span>" + (result ? " " : "") + parseInt(difference) + "</span> " + getRightWord( difference, words[x][1] )
					  }
					}
					return result
				  }
				})()
				document.write(getPassedTime(new Date("2019/12/02")));
				/* ]]> */
			</script> </div>
</div>
<br>

<div class="stat">
	<div class="h-title">Платежные системы</div>
	<div class="cntrl-ps">
	<s style="background-position:0px 0px;"></s>
	<s style="background-position:-56px 0px;"></s>
	<s style="background-position:-112px 0px;"></s>
	<s style="background-position:-168px 0px;"></s>
	<s style="background-position:-224px 0px;"></s>
	<s style="background-position:-280px 0px;"></s>
	<s style="background-position:-336px 0px;"></s>
	<s style="background-position:-392px 0px;"></s>
	<s style="background-position:-448px 0px;"></s>
	<div class="clr"></div>
	</div>



</div>

<br>
<div class="statistic2">
  <div class="h-title"><b>Последние 7 пополнений</b></div>
  <div class="st-rg1" >


<?PHP

  $db->Query("SELECT * FROM db_insert_money ORDER BY id DESC LIMIT 7");

  if($db->NumRows() > 0){

      while($last = $db->FetchArray()){

    ?>
  <div class="line-st"><?=$last["user"]; ?></div>

    <?PHP

    }

  }else echo '<tr><td align="center" colspan="6">Нет записей</td></tr>'
  ?>
</div>
<div class="st-rg1">
  <?PHP

  $db->Query("SELECT * FROM db_insert_money ORDER BY id DESC LIMIT 7");

  if($db->NumRows() > 0){

      while($last = $db->FetchArray()){

    ?>
   <div class="line-st"><?=$last["money"]; ?> р</div>
    <?PHP

    }

  }else echo '<tr><td align="center" colspan="6">Нет записей</td></tr>'
  ?>

<div class="clr"></div>

</div>

</div>


<center><a href="http://www.free-kassa.ru/"><img src="http://www.free-kassa.ru/img/fk_btn/15.png"></a></center>












