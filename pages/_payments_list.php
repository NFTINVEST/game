                                                                                                <?PHP
$_OPTIMIZATION["title"] = "�������";
$_OPTIMIZATION["description"] = "������ ��������� ������";
$_OPTIMIZATION["keywords"] = "��������� �������";
?>
<div class="s-bk-lf">
	<div class="acc-title">������� </div>
</div>
<div class="silver-bk"><div class="clr"></div>	

<center><b>���������� ��������� 50 ������</b></center>
<BR />
<?PHP

$dt = time() - 60*60*2400;


$db->Query("SELECT * FROM db_payment WHERE status = '3' AND date_add > '$dt'");



if($db->NumRows() > 0){

$all_pay = 0;
$all_pay_sum = 0;

?>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#446633' align='center' width="99%">
  <tr bgcolor="#efefef">
    <td align="center" width="50" class="m-tb">������������</td>
	<td align="center" width="50" class="m-tb">�����</td>
	<td align="center" width="50" class="m-tb">�������</td>
	<td align="center" width="50" class="m-tb">����</td>
  </tr>


<?PHP
$db->Query("SELECT * FROM db_payment ORDER BY id DESC LIMIT 50");
	while($data = $db->FetchArray()){
	$all_pay ++;
	$all_pay_sum += $data["sum"];
	?>
	<tr class="htt">
	<td align="center"><?=$data["user"]; ?></td>
    <td align="center"><?=sprintf("%.2f",$data["sum"]); ?> <?=$data["valuta"]; ?></td>
	<td align="center"><?=substr($data["purse"],0,-3); ?><font color = 'red'>XXX</font></td>
	<td align="center"><?=date("d.m.Y H:i:s",$data["date_add"]); ?></td>
  	</tr>
	<?PHP
	
	}

?>
	<tr bgcolor="#efefef">
		<td align="center" width="50" class="m-tb" colspan=2>����� ������: <?=$all_pay; ?> ��.</td>
		<td align="center" width="50" class="m-tb" colspan=2>�� �����: <?=sprintf("%.2f",$all_pay_sum); ?> RUB</td>
	</tr>
</table>
<BR />
<?PHP


}else echo "<center><b>������ ��� :(</b></center><BR />";


?>
</div>
<div class="clr"></div>	
