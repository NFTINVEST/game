<div class="s-bk-lf">
	<div class="acc-title">������� ������ �� �����</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
<?PHP
$tdadd = time() - 5*60;
	if(isset($_POST["clean"])){
	
		$db->Query("DELETE FROM db_sell_items WHERE date_add < '$tdadd'");
		echo "<center><font color = 'green'><b>�������</b></font></center><BR />";
	}

$db->Query("SELECT * FROM db_sell_items ORDER BY id DESC");

if($db->NumRows() > 0){

?>
<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr bgcolor="#efefef">
    <td align="center" width="50" class="m-tb">ID</td>
    <td align="center" class="m-tb">������������</td>
    <td align="center" width="80" class="m-tb">������</td>
	<td align="center" width="80" class="m-tb">�������</td>
	<td align="center" width="150" class="m-tb">���� ��������</td>
  </tr>


<?PHP

	while($data = $db->FetchArray()){
	
	?>
	<tr class="htt">
    <td align="center" width="50"><?=$data["id"]; ?></td>
    <td align="center"><?=$data["user"]; ?></td>
    <td align="center" width="80"><?=$data["all_sell"]; ?></td>
	<td align="center" width="80"><?=sprintf("%.2f",$data["amount"]); ?></td>
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