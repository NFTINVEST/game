<div class="s-bk-lf">
	<div class="acc-title">Статистика проекта</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
<?PHP

$db->Query("SELECT 
	COUNT(id) all_users, 
	SUM(money_b) money_b, 
	SUM(money_p) money_p, 
	
	SUM(a_t) a_t, 
	SUM(b_t) b_t, 
	SUM(c_t) c_t, 
	SUM(d_t) d_t, 
	SUM(e_t) e_t, 
	SUM(f_t) f_t, 
	SUM(g_t) g_t, 
	SUM(h_t) h_t, 
	SUM(j_t) j_t, 
	
	SUM(a_b) a_b, 
	SUM(b_b) b_b, 
	SUM(c_b) c_b, 
	SUM(d_b) d_b, 
	SUM(e_b) e_b, 
	SUM(f_b) f_b, 
	SUM(g_b) g_b, 
	SUM(h_b) h_b, 
	SUM(j_b) j_b, 
	
	SUM(all_time_a) all_time_a, 
	SUM(all_time_b) all_time_b, 
	SUM(all_time_c) all_time_c, 
	SUM(all_time_d) all_time_d, 
	SUM(all_time_e) all_time_e,
	SUM(all_time_f) all_time_f,
	SUM(all_time_g) all_time_g,
	SUM(all_time_h) all_time_h,
	SUM(all_time_j) all_time_j,
	
	SUM(payment_sum) payment_sum, 
	SUM(insert_sum) insert_sum
	
	
	FROM db_users_b");
$data_stats = $db->FetchArray();

?>

<table width="450" border="0" align="center">
  <tr class="htt">
    <td><b>Зарегистрировано пользователей:</b></td>
	<td width="100" align="center"><?=$data_stats["all_users"]; ?> чел.</td>
  </tr>
  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Серебра на счетах (Для покупок):</b></td>
	<td width="100" align="center"><?=sprintf("%.0f",$data_stats["money_b"]); ?></td>
  </tr>
  
  <tr class="htt">
    <td><b>Серебра на счетах (На вывод):</b></td>
	<td width="100" align="center"><?=sprintf("%.0f",$data_stats["money_p"]); ?></td>
  </tr>
  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Куплено (БТР-44):</b></td>
	<td width="100" align="center"><?=intval($data_stats["a_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено (Гаубица МЛ-20):</b></td>
	<td width="100" align="center"><?=intval($data_stats["b_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено (Танк T-34):</b></td>
	<td width="100" align="center"><?=intval($data_stats["c_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено (Катюша БМ-13):</b></td>
	<td width="100" align="center"><?=intval($data_stats["d_t"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>Куплено (Самолет И-16):</b></td>
	<td width="100" align="center"><?=intval($data_stats["e_t"]); ?> шт.</td>
  </tr>



 



  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>На складах монет от (БТР-44):</b></td>
	<td width="100" align="center"><?=intval($data_stats["a_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах монет от (Гаубица МЛ-20):</b></td>
	<td width="100" align="center"><?=intval($data_stats["b_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах монет от (Танк T-34):</b></td>
	<td width="100" align="center"><?=intval($data_stats["c_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах монет от (Катюша БМ-13):</b></td>
	<td width="100" align="center"><?=intval($data_stats["d_b"]); ?> шт.</td>
  </tr>
  
  <tr class="htt">
    <td><b>На складах монет от (Самолет И-16):</b></td>
	<td width="100" align="center"><?=intval($data_stats["e_b"]); ?> шт.</td>
  </tr>

 

 
 


  
  <tr> <td colspan="2" align="center"><b>- - - - -</b></td> </tr>
  
  <tr class="htt">
    <td><b>Введено пользователями:</b></td>
	<td width="100" align="center"><?=sprintf("%.2f",$data_stats["insert_sum"]); ?> <?=$config->VAL; ?></td>
  </tr>
  
  <tr class="htt">
    <td><b>Выплачено пользователям:</b></td>
	<td width="100" align="center"><?=sprintf("%.2f",$data_stats["payment_sum"]); ?> <?=$config->VAL; ?></td>
  </tr>
  
</table>

</div>
<div class="clr"></div>	