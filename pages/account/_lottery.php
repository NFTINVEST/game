<?PHP
$_OPTIMIZATION["title"] = "������� - �������";
$usid = $_SESSION["user_id"];
$uname = $_SESSION["user"];

# ��������� �������
$amount_lottery = 100; // ��������� ����������� ������
$num_bil = 10; // ���������� �������

?>
<div class="s-bk-lf">
	<div class="acc-title">�������</div>
</div>
<div class="silver-bk">

<?PHP

# ������ ���������� �������
if(isset($_GET["winners"])){ ?>

<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="6" align="center"><h4>����������� �������</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">�</td>
    <td align="center" class="m-tb">������������<BR />[�����]</td>
	<td align="center" class="m-tb">������������<BR />[�����]</td>
	<td align="center" class="m-tb">������������<BR />[�����]</td>
	<td align="center" class="m-tb">����</td>
	<td align="center" class="m-tb">����</td>
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_lottery_winners ORDER BY id DESC");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>
		<tr class="htt">
    		<td align="center"><?=$ref["id"]; ?></td>
			<td align="center"><?=$ref["user_a"]; ?><BR />�����: <?=$ref["bil_a"]; ?></td>
			<td align="center"><?=$ref["user_b"]; ?><BR />�����: <?=$ref["bil_b"]; ?></td>
			<td align="center"><?=$ref["user_c"]; ?><BR />�����: <?=$ref["bil_c"]; ?></td>
			<td align="center"><?=$ref["bank"]; ?></td>
			<td align="center"><?=date("d.m.Y",$ref["date_add"]); ?></td>
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="6">��� �������</td></tr>'
  ?>

  
</table>

<div class="clr"></div></div>
<?PHP return; } ?>

<b>�������</b> - ��� ����� ���� :) ����� ������� <?=$num_bil; ?> �������. ����� ����, ��� ��� ������ ����� ������� ��������� �������� ���������� �������. ������� ��������� ������� ������� 3 ������ ���������� ������� � �������� �� �����. <BR />
1 ����� - 50% �� ������ ����� [<?=($amount_lottery * $num_bil) * 0.5; ?> �������]. <BR />
2 ����� - 25% �� ������ ����� [<?=($amount_lottery * $num_bil) * 0.25; ?> �������]. <BR />
3 ����� - 20% �� ������ ����� [<?=($amount_lottery * $num_bil) * 0.2; ?> �������]. <BR />
��������� 5% ���������� �������� �������.
<BR />
<u>��������� ������ = <?=$amount_lottery; ?> �������</u>.
<BR />
<a href="/account/lottery/winners">������ ����������� �������</a>
<BR /><BR />
<script type="text/javascript" src="/wheel_data/swfobject.js"></script>
<center><div id="flash"><embed type="application/x-shockwave-flash" src="/wheel_data/wheel.swf" width="624" height="581" style="" id="flash" name="flash" quality="high"></div></center>
<script type="text/javascript">
var so = new SWFObject('/wheel_data/wheel.swf', 'flash', '624', '581', 9);
so.write("flash");
</script>

<?PHP


	if(isset($_POST["set_lottery"], $_POST["hash"]) AND $_SESSION["lot_hash"] == $_POST["hash"]){
	
		$db->Query("SELECT money_b FROM db_users_b WHERE id = '{$usid}' LIMIT 1");
		if($db->FetchRow() >= $amount_lottery){
		
			$db->Query("UPDATE db_users_b SET money_b = money_b - '$amount_lottery' WHERE id = '{$usid}'");
			$db->Query("INSERT INTO db_lottery (user_id, user, date_add) VALUE ('$usid','$uname','".time()."')");
			$lid = $db->LastInsert();
			
			if( $lid >= $num_bil){
			
				# ����������� �����
				while(true){
				
					$winner_a = rand(1, $num_bil);
					$winner_b = rand(1, $num_bil);
					$winner_c = rand(1, $num_bil);
					
					if($winner_a != $winner_b AND $winner_b != $winner_c AND $winner_c != $winner_a) break;
					
				}
				
				# ������������ 1
				$db->Query("SELECT user FROM db_lottery WHERE id = '$winner_a'");
				$user_a = $db->FetchRow();
				
				# ������������ 2
				$db->Query("SELECT user FROM db_lottery WHERE id = '$winner_b'");
				$user_b = $db->FetchRow();
				
				# ������������ 3
				$db->Query("SELECT user FROM db_lottery WHERE id = '$winner_c'");
				$user_c = $db->FetchRow();
				
				# ������ �������
				$db->Query("TRUNCATE TABLE db_lottery");
				
				# ��������� ������ � �����������
				$all_bank = ($num_bil * $amount_lottery);
				$db->Query("INSERT INTO db_lottery_winners (user_a, bil_a, user_b, bil_b, user_c, bil_c, bank, date_add) 
				VALUES ('$user_a','$winner_a','$user_b','$winner_b','$user_c','$winner_c','$all_bank','".time()."')");
				
				# ��������� �������� �������������
				# 1 �����
				$money_a = $all_bank * 0.5;
				$db->Query("UPDATE db_users_b SET money_b = money_b + '$money_a' WHERE user = '$user_a'");
				
				# 2 �����
				$money_b = $all_bank * 0.25;
				$db->Query("UPDATE db_users_b SET money_b = money_b + '$money_b' WHERE user = '$user_b'");
				
				# 3 �����
				$money_c = $all_bank * 0.20;
				$db->Query("UPDATE db_users_b SET money_b = money_b + '$money_c' WHERE user = '$user_c'");
				
				echo "<center><b><font color='green'>������� ��������</font></b></center><BR />";
				
			}else echo "<center><b><font color='green'>����� ������� ������</font></b></center><BR />";
			
		}else echo "<center><b><font color='red'>������������ ������� ��� ������� ������</font></b></center><BR />";
		
	}

?>


<center>
<?PHP
$_SESSION["lot_hash"] = rand(1, 9999999);
?>
<form action="" method="post">
<input type="submit" name="set_lottery" value="������ �����" style="padding:7px;" />
<input type="hidden" name="hash" value="<?=$_SESSION["lot_hash"]; ?>" />
</form>
</center>


<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h4>������������ �������� ������</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">� ������</td>
    <td align="center" class="m-tb">������������</td>
	<td align="center" class="m-tb">����</td>
  </tr>
  <?PHP
  
  $db->Query("SELECT * FROM db_lottery ORDER BY id DESC");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>
		<tr class="htt">
    		<td align="center"><?=$ref["id"]; ?></td>
			<td align="center"><?=$ref["user"]; ?></td>
			<td align="center"><?=date("d.m.Y",$ref["date_add"]); ?></td>
  		</tr>
		<?PHP
		
		}
  
	}else echo '<tr><td align="center" colspan="3">��� �������</td></tr>'
  ?>

  
</table><div class="clr"></div>	


</div>