<div class="s-bk-lf">
	<div class="acc-title">����� �������</div>
</div>
<div class="silver-bk">

<?PHP
$_OPTIMIZATION["title"] = "������� - ����� �������";
$usid = $_SESSION["user_id"];
$usname = $_SESSION["user"];

$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");
$user_data = $db->FetchArray();

$db->Query("SELECT * FROM db_confligsg WHERE id = '1' LIMIT 1");
$sonfig_site = $db->FetchArray();

$db->Query("SELECT * FROM db_payment WHERE user_id = '$usid' ORDER BY id DESC LIMIT 1");
$sonfig_purse = $db->FetchArray();

$status_array = array( 0 => "�����������", 1 => "�������������", 2 => "��������", 3 => "���������");

# ��������� ��������!
$minPay = 10;
#���������� ��������
$maxPay = 10000;

?>

<p>
<b>������� �������������� � �������������� ������ � ������ �� ��������� ������� <a href="http://payeer.com/?partner=309144" target="_BLANK" rel="nofollow">PAYEER!</a> ������� ��� ������ ���������� 0%</b> <BR /><BR />
<b>�� ��������� ������� Payeer �� ������ ������� ���� �������� � �������������� ������ �� ��� ��������� ��������� ������� � ������������� �����.</b><BR /><BR />
<b>������ �� ������� ���������:</b><BR />
 - �������� ����� � <a href="http://payeer.com/?partner=309144" target="_blank" rel="nofollow"><b>Payeer</b></a> <BR />
 - ����� ������� �� <a href="https://payeer.com/withdraw/?partner=309144" target="_blank" rel="nofollow"><b>Payeer</b></a> <BR /><BR />

<center><font color=red><b>��������! ����� ������ ������� �������� ����� �������� <font color = "blue">PAYEER</font> ����� ����������!!!!</b></font></center> <br>
<center>
<div style="width: 468px; height: 60px; text-align: center; color: #ffffff; background: url('http://www.bestchange.ru/images/banners/banner-bg.png') no-repeat; font: 12px Tahoma, Verdana, sans-serif; overflow: hidden">
  <div style="margin: 1px 0 -1px 0; font: 15px Tahoma, Verdana, sans-serif;">
    �������� ������ ���� ������
  </div>
  <div><script type="text/javascript" src="http://www.bestchange.ru/js/banner.php?p=33088"></script></div>
  <div style="margin-top: -3px">
    <a target="_blank" href="http://www.bestchange.ru/?p=33088" style="font: 11px Tahoma, Verdana, sans-serif; color: #f5f5f5" title="BestChange.ru - ������������ ���������� �������� �������"></a>&nbsp; <a target="_blank" href="http://www.bestchange.ru/partner/?p=33088" style="font: 11px Tahoma, Verdana, sans-serif; color: #f5f5f5" title="�������� ����������� ��������� ��� ���������� ������ � ��������� ����������� �����"></a>
  </div>
</div>

<?PHP
# �������� �� ����������
if($user_data["insert_sum"] <= 29.99 AND $user_data["from_referals"] <= 10000000000){

?>
<center><font color="red"><b>������� ����� ���������� ������������, ������� ��������� ������ ������� �� 30 RUB!<b></font></center><BR />
<BR />
<BR /><BR />
<div class="clr"></div>		
</div>
<?PHP

return;
}

?>

<b>�� ����� ����� <a href="/account/pay_points"><font color="green"><?=sprintf("%.2f",$user_data["pay_points"]); ?> ������</font></a></b><BR />
<b>����� ������ ������� �� ������� <?=sprintf("%.2f",$user_data["pay_points"]); ?> ���. </b>
<BR /><BR />
<center><b>����� �������:</b></center><BR />

<?PHP

$ddel = time() + 60*60*1;
$dadd = time();


	function ViewPurse($purse){

		if( substr($purse,0,1) != "P" ) return false;
		if( !ereg("^[0-9]{7}$", substr($purse,1)) AND !ereg("^[0-9]{8}$", substr($purse,1)) AND !ereg("^[0-9]{9}$", substr($purse,1)) 
		AND !ereg("^[0-9]{10}$", substr($purse,1)) AND !ereg("^[0-9]{11}$", substr($purse,1)) AND !ereg("^[0-9]{12}$", substr($purse,1))  ) return false;
		return $purse;
	}
# �������� �� ���� �������
$db->Query("SELECT COUNT(*) FROM db_pay_dat WHERE user_id = '$usid' AND date_del > '$dadd'");

 if($db->FetchRow() == 0){

   echo "$purse $sum";
		# ������� �������
		if(isset($_POST["purse"])){

		$purse = ViewPurse($_POST["purse"]);
		$sum = intval($_POST["sum"]);
		$val = "RUB";



      if ($sum <= $maxPay){

		if($purse !== false){

				if($sum >= $minPay){

					if($sum <= $user_data["money_p"]){

						# ��������� �� ������������ ������
						$db->Query("SELECT COUNT(*) FROM db_payment WHERE user_id = '$usid' AND (status = '0' OR status = '1')");
						if($db->FetchRow() == 0){


							### ������ ������� ###
							$payeer = new rfs_payeer($config->AccountNumber, $config->apiId, $config->apiKey);
							if ($payeer->isAuth())
							{

								$arBalance = $payeer->getBalance();
								if($arBalance["auth_error"] == 0)
								{

									$sum_pay = round( ($sum / $sonfig_site["ser_per_wmr"]), 2);
                                    if($user_data["pay_points"] >= $sum_pay){
                                        
									$balance = $arBalance["balance"]["RUB"]["DOSTUPNO"];
									if( ($balance) >= ($sum_pay+0)){



									$arTransfer = $payeer->transfer(array(
									'curIn' => 'RUB', // ���� ��������
									'sum' => $sum_pay, // ����� ���������
									'curOut' => 'RUB', // ������ ���������
									'to' => $purse, // ���������� (email)
									//'to' => '+71112223344',  // ���������� (�������)
									//'to' => 'P1000000',  // ���������� (����� �����)
									'comment' => iconv('windows-1251', 'utf-8', "������� ������������ {$usname} � ������� Angry birds")
									//'anonim' => 'Y', // ��������� �������
									//'protect' => 'Y', // ��������� ������
									//'protectPeriod' => '3', // ������ ��������� (�� 1 �� 30 ����)
									//'protectCode' => '12345', // ��� ���������
									));

										if (!empty($arTransfer["historyId"]))
										{


											# ������� � ������������
											$db->Query("UPDATE db_users_b SET money_p = money_p - '$sum', payment_sum = payment_sum + '$sum_pay',  pay_points = pay_points - '$sum_pay' WHERE id = '$usid'");

											# ��������� ������ � �������
											$da = time();
											$dd = $da + 60*60*24*15;

											$ppid = $arTransfer["historyId"];

											$db->Query("INSERT INTO db_payment (user, user_id, purse, sum, valuta, serebro, payment_id, date_add, status)
											VALUES ('$usname','$usid','$purse','$sum_pay','RUB', '$sum','$ppid','".time()."', '3')");

											$db->Query("UPDATE db_users_b SET payment_sum = payment_sum + '$sum_pay' WHERE id = '$usid'");
											$db->Query("UPDATE db_stats SET all_payments = all_payments + '$sum_pay' WHERE id = '1'");


														# ������� ������ �� ������� ������� � ����
														$db->Query("INSERT INTO db_pay_dat (user, user_id, sum, date_add, date_del) VALUES ('$uname','$usid','$sum','$dadd','$ddel')");
                                                        # ��������� ������� ���������� �������
														$db->Query("DELETE FROM db_pay_dat WHERE date_del < '$dadd'");

											echo "<center><font color = 'green'><b>���������!</b></font></center><BR />";

										}
										else
										{

											echo "<center><font color = 'red'><b>��������� ������ - �������� � ��� ��������������!</b></font></center><BR />";

										}


									}else echo "<center><font color = 'red'><b>��������� ������ - �������� � ��� ��������������!</b></font></center><BR />";
	}else echo "<center><font color = 'red'><b>������������ <a href='/pay_points'>��������� ������</a></b></font></center><BR />";
								}else echo "<center><font color = 'red'><b>�� ������� ���������! ���������� �����</b></font></center><BR />";

							}else echo "<center><font color = 'red'><b>�� ������� ���������! ���������� �����</b></font></center><BR />";


						}else echo "<center><font color = 'red'><b>� ��� ������� �������������� ������. ��������� �� ����������.</b></font></center><BR />";


					}else echo "<center><font color = 'red'><b>�� ������� ������, ��� ������� �� ����� �����</b></font></center><BR />";

				}else echo "<center><b><font color = 'red'>������� �� �������������� �� ������ �������!!!</font></b></center><BR />";


		}else echo "<center><b><font color = 'red'>������� Payeer ������ �������! �������� �������!</font></b></center><BR />";

		}else echo "<center><font color = 'red'><b>�� �� ������ ��������� ����� 100 ������ �� ���� ���</b></font></center><BR />";

	}


	}else echo "<center><font color = 'red'><b>������� ����� ��������� �� ���� ��� 1 ��� � 1 ���</b></font></center><BR />";

?>

<form action="" method="post">
<table width="99%" border="0" align="center">
  <tr>
    <td><font color="#000;"><b>������� ������� Payeer [������: P1234567]</b></font>: </td>
<?php

	IF($sonfig_purse["purse"])
	{$pur=$sonfig_purse["purse"];
	echo"<td><input type='text' name='purse' size='15' value='".$pur."' readonly='readonly'";
	echo"</td>";
	}

	else echo"<td><input type='text' name='purse' size='15'/> </td>";


?>


  </tr>
  <tr>
    <td><font color="#000;"><b>������� ������� ��� ������</font> [���. 100]<font color="#000;">:<b></font> </td>
	<td><input type="text" name="sum" id="sum" value="<?=round($user_data["money_p"]); ?>" size="15" onkeyup="PaymentSum();" /></td>
  </tr>
  <tr>
    <td><font color="#000;"><b>��������� ������ <span id="res_val"></span></font><font color="#000;">:</b></font> </td>
	<td>
	<input type="text" name="res" id="res_sum" value="0" size="15" disabled="disabled"/>
	<input type="hidden" name="per" id="RUB" value="<?=$sonfig_site["ser_per_wmr"]; ?>" disabled="disabled"/>
	<input type="hidden" name="per" id="min_sum_RUB" value="0.5" disabled="disabled"/>
	<input type="hidden" name="val_type" id="val_type" value="RUB" />
	</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="swap" value="�������� �������" style="height: 30px; margin-top:10px;" /></td>
  </tr>
</table>
</form>
<script language="javascript">PaymentSum(); SetVal();</script>



<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr>
    <td colspan="5" align="center"><h4>��������� 10 ������</h4></td>
    </tr>
  <tr>
    <td align="center" class="m-tb">�������</td>
    <td align="center" class="m-tb">���������</td>
	<td align="center" class="m-tb">�������</td>
	<td align="center" class="m-tb">����</td>
	<td align="center" class="m-tb">������</td>
  </tr>
  <?PHP

  $db->Query("SELECT * FROM db_payment WHERE user_id = '$usid' ORDER BY id DESC LIMIT 20");

	if($db->NumRows() > 0){

  		while($ref = $db->FetchArray()){

		?>
		<tr class="htt">
    		<td align="center"><?=$ref["serebro"]; ?></td>
    		<td align="center"><?=sprintf("%.2f",$ref["sum"] - $ref["comission"]); ?> <?=$ref["valuta"]; ?></td>
    		<td align="center"><?=$ref["purse"]; ?></td>
			<td align="center"><?=date("d.m.Y",$ref["date_add"]); ?></td>
    		<td align="center"><?=$status_array[$ref["status"]]; ?></td>
  		</tr>
		<?PHP

		}

	}else echo '<tr><td align="center" colspan="5">��� �������</td></tr>'

  ?>


</table><div class="clr"></div>
</div>
