<div class="s-bk-lf">
	<div class="acc-title">������� ����������</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
<center><a href="/?menu=myadmin72g52u8&sel=story_insert">������ ����������</a> || <a href="/?menu=myadmin72g52u8&sel=story_insert&list_day">�� ����</a> || <a href="/?menu=myadmin72g52u8&sel=story_insert&last_31">������ �� 30 ����</a></center><BR />
<?PHP
# ������
if(isset($_GET["last_31"])){
	
	$dlim = time() - 60*60*24*30;
	$db->Query("SELECT * FROM db_insert_money WHERE date_add > $dlim ORDER BY id DESC");
	
	$days_money = array();
	$days_insert = array();
	
	if($db->NumRows() > 0){
		
		while($data = $db->FetchArray()){
		$index = date("d.m.Y", $data["date_add"]);
		
			$days_money[$index] = (isset($days_money[$index])) ? $days_money[$index] + $data["money"] : $data["money"];
			$days_insert[$index] = (isset($days_insert[$index])) ? $days_insert[$index] + 1 : 1;
			
		}
	
	# �����
	if(count($days_money) > 0){
		
		$array_for_chart = array();
		$array_for_chart2 = array();
		$array_for_chart3 = array();
		
			foreach($days_money as $date => $sum){
			
				$array_for_chart[] = "['".$date."', ".round($sum)."]";
				$array_for_chart2[] = "['".$date."', ".$days_insert[$date]."]";
				$array_for_chart3[] = "['".$date."', ".round($sum / $days_insert[$date], 2)."]";
			
			}
			
			$retd = implode(", ", array_reverse($array_for_chart));
			$retd2 = implode(", ", array_reverse($array_for_chart2));
			$retd3 = implode(", ", array_reverse($array_for_chart3));
			
		?>

	
	<div id="chart_div" style="width: 100%; height: 500px;"></div>
	
	
	<div id="chart_div2" style="width: 100%; height: 500px;"></div>
	
	<div id="chart_div3" style="width: 100%; height: 500px;"></div>
	
	
		<?PHP
		
	}
	
	}else echo "<center><b>������� ���</b></center><BR />";
	
	
	
?></div><div class="clr"></div>	<?PHP
return;
}


# ����� ���������� �� ����
if(isset($_GET["list_day"])){

	$db->Query("SELECT * FROM db_insert_money ORDER BY id DESC");
	
	$days_money = array();
	$days_insert = array();
	
	if($db->NumRows() > 0){
		
		while($data = $db->FetchArray()){
		$index = date("d.m.Y", $data["date_add"]);
		
			$days_money[$index] = (isset($days_money[$index])) ? $days_money[$index] + $data["money"] : $data["money"];
			$days_insert[$index] = (isset($days_insert[$index])) ? $days_insert[$index] + 1 : 1;
			
		}
	
	# �����
	if(count($days_money) > 0){
	
		?>
		<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
		  <tr bgcolor="#efefef">
			<td align="center" class="m-tb">����</td>
			<td align="center" class="m-tb">����������</td>
			<td align="center" class="m-tb">�� �����</td>
			<td align="center" class="m-tb">AVG</td>
		  </tr>
		<?PHP
		
		$array_for_chart = array();
		
			foreach($days_money as $date => $sum){
			
				?>
				<tr class="htt">
					<td align="center"><b><?=$date; ?></b></td>
					<td align="center"><?=$days_insert[$date]; ?> ��.</td>
					<td align="center"><?=$sum; ?> <?=$config->VAL;?></td>
					<td align="center"><?=round($sum/$days_insert[$date],2); ?> <?=$config->VAL;?></td>
				</tr>
				<?PHP
				
			}
			
		?>
		</table>
		<?PHP
		
	}
	
	}else echo "<center><b>������� ���</b></center><BR />";
	
	
	
?></div><div class="clr"></div>	<?PHP
return;
}

$tdadd = time() - 5*60;
	if(isset($_POST["clean"])){
	
		$db->Query("DELETE FROM db_insert_money WHERE date_add < '$tdadd'");
		echo "<center><font color = 'green'><b>�������</b></font></center><BR />";
	}

$db->Query("SELECT * FROM db_insert_money ORDER BY id DESC");

if($db->NumRows() > 0){

?>
<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr bgcolor="#efefef">
    <td align="center" width="50" class="m-tb">ID</td>
    <td align="center" class="m-tb">������������</td>
    <td align="center" width="75" class="m-tb"><?=$config->VAL; ?></td>
	<td align="center" width="75" class="m-tb">�������</td>
	<td align="center" width="150" class="m-tb">���� ��������</td>
  </tr>


<?PHP

	while($data = $db->FetchArray()){
	
	?>
	<tr class="htt">
    <td align="center" width="50"><?=$data["id"]; ?></td>
    <td align="center"><?=$data["user"]; ?></td>
    <td align="center" width="75"><?=$data["money"]; ?></td>
	<td align="center" width="75"><?=$data["serebro"]; ?></td>
	<td align="center" width="150"><?=date("d.m.Y � H:i:s",$data["date_add"]); ?></td>
  	</tr>
	<?PHP
	
	}

?>

</table>
<BR />
<form action="" method="post">
<center><input type="submit" name="clean" value="��������" /></center>
</form>
<?PHP

}else echo "<center><b>������� ���</b></center><BR />";
?>

</div>
<div class="clr"></div>	