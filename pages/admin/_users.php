<div class="s-bk-lf">
	<div class="acc-title">������������</div>
</div>
<div class="silver-bk"><div class="clr"></div>	
<?PHP
# �������������� ������������
if(isset($_GET["edit"])){

$eid = intval($_GET["edit"]);

$db->Query("SELECT *, INET_NTOA(al_polzov_a.ip) uip FROM al_polzov_a, db_users_b WHERE al_polzov_a.id = db_users_b.id AND db_users_b.id = '$eid' LIMIT 1");

# ��������� �� �������������
if($db->NumRows() != 1){ echo "<center><b>��������� ������������ �� ������</b></center><BR />"; }

# ��������� 
if(isset($_POST["set_tree"])){

$tree = $_POST["set_tree"];
$type = ($_POST["type"] == 1) ? "-1" : "+1";

	$db->Query("UPDATE db_users_b SET {$tree} = {$tree} {$type} WHERE id = '$eid'");
	$db->Query("SELECT *, INET_NTOA(al_polzov_a.ip) uip FROM al_polzov_a, db_users_b WHERE al_polzov_a.id = db_users_b.id AND db_users_b.id = '$eid' LIMIT 1");
	echo "<center><b>������� ���������</b></center><BR />";
	
}


# ��������� ������
if(isset($_POST["balance_set"])){

$sum = intval($_POST["sum"]);
$bal = $_POST["schet"];
$type = ($_POST["balance_set"] == 1) ? "-" : "+";

$string = ($type == "-") ? "� ������������ ����� {$sum} ������� " : "������������ ��������� {$sum} ������� ";

	$db->Query("UPDATE db_users_b SET {$bal} = {$bal} {$type} {$sum} WHERE id = '$eid'");
	$db->Query("SELECT *, INET_NTOA(al_polzov_a.ip) uip FROM al_polzov_a, db_users_b WHERE al_polzov_a.id = db_users_b.id AND db_users_b.id = '$eid' LIMIT 1");
	echo "<center><b>$string</b></center><BR />";
	
}


# �������� ������������
if(isset($_POST["banned"])){

	$db->Query("UPDATE al_polzov_a SET banned = '".intval($_POST["banned"])."' WHERE id = '$eid'");
	$db->Query("SELECT *, INET_NTOA(al_polzov_a.ip) uip FROM al_polzov_a, db_users_b WHERE al_polzov_a.id = db_users_b.id AND db_users_b.id = '$eid' LIMIT 1");
	echo "<center><b>������������ ".($_POST["banned"] > 0 ? "�������" : "��������")."</b></center><BR />";
	
}

$data = $db->FetchArray();

?>

<table width="100%" border="0">
  <tr bgcolor="#efefef">
    <td style="padding-left:10px;">ID:</td>
    <td width="200" align="center"><?=$data["id"]; ?></td>
  </tr>
  <tr>
    <td style="padding-left:10px;">�����:</td>
    <td width="200" align="center"><?=$data["user"]; ?></td>
  </tr>
  <tr bgcolor="#efefef">
    <td style="padding-left:10px;">Email:</td>
    <td width="200" align="center"><?=$data["email"]; ?></td>
  </tr>
  <tr>
    <td style="padding-left:10px;">������:</td>
    <td width="200" align="center"><?=$data["pass"]; ?></td>
  </tr>
  
  
  <tr bgcolor="#efefef">
    <td style="padding-left:10px;">������� �� (�������):</td>
    <td width="200" align="center"><?=sprintf("%.2f",$data["money_b"]); ?></td>
  </tr>
  
  <tr>
    <td style="padding-left:10px;">������� �� (�����):</td>
    <td width="200" align="center"><?=sprintf("%.2f",$data["money_p"]); ?></td>
  </tr>
  
  
  
  
  
  <tr>
    <td style="padding-left:10px;">(���-44):</td>
    <td width="200" align="center">
	
		<table width="100%" border="0">
		  <tr>
			<td>
			<form action="" method="post">
				<input type="hidden" name="set_tree" value="a_t" />
				<input type="hidden" name="type" value="1" />
				<input type="submit" value="-1" />
			</form>
			</td>
			<td align="center"><?=$data["a_t"]; ?> ��.</td>
			<td>
			<form action="" method="post">
				<input type="hidden" name="set_tree" value="a_t" />
				<input type="hidden" name="type" value="2" />
				<input type="submit" value="+1" />
			</form>
			</td>
		  </tr>
		</table>

	</td>
  </tr>

  <tr bgcolor="#efefef">
    <td style="padding-left:10px;"> (������� ��-20):</td>
    <td width="200" align="center">
	
		<table width="100%" border="0">
		  <tr>
			<td>
			<form action="" method="post">
				<input type="hidden" name="set_tree" value="b_t" />
				<input type="hidden" name="type" value="1" />
				<input type="submit" value="-1" />
			</form>
			</td>
			<td align="center"><?=$data["b_t"]; ?> ��.</td>
			<td>
			<form action="" method="post">
				<input type="hidden" name="set_tree" value="b_t" />
				<input type="hidden" name="type" value="2" />
				<input type="submit" value="+1" />
			</form>
			</td>
		  </tr>
		</table>

	</td>
  </tr>

  <tr>
    <td style="padding-left:10px;">(���� T-34):</td>
    <td width="200" align="center">
	
		<table width="100%" border="0">
		  <tr>
			<td>
			<form action="" method="post">
				<input type="hidden" name="set_tree" value="c_t" />
				<input type="hidden" name="type" value="1" />
				<input type="submit" value="-1" />
			</form>
			</td>
			<td align="center"><?=$data["c_t"]; ?> ��.</td>
			<td>
			<form action="" method="post">
				<input type="hidden" name="set_tree" value="c_t" />
				<input type="hidden" name="type" value="2" />
				<input type="submit" value="+1" />
			</form>
			</td>
		  </tr>
		</table>

	</td>
  </tr>

  <tr bgcolor="#efefef">
    <td style="padding-left:10px;">(������ ��-13):</td>
    <td width="200" align="center">
	
		<table width="100%" border="0">
		  <tr>
			<td>
			<form action="" method="post">
				<input type="hidden" name="set_tree" value="d_t" />
				<input type="hidden" name="type" value="1" />
				<input type="submit" value="-1" />
			</form>
			</td>
			<td align="center"><?=$data["d_t"]; ?> ��.</td>
			<td>
			<form action="" method="post">
				<input type="hidden" name="set_tree" value="d_t" />
				<input type="hidden" name="type" value="2" />
				<input type="submit" value="+1" />
			</form>
			</td>
		  </tr>
		</table>

	</td>
  </tr>

  <tr>
    <td style="padding-left:10px;">(������� �-16):</td>
    <td width="200" align="center">
	
		<table width="100%" border="0">
		  <tr>
			<td>
			<form action="" method="post">
				<input type="hidden" name="set_tree" value="e_t" />
				<input type="hidden" name="type" value="1" />
				<input type="submit" value="-1" />
			</form>
			</td>
			<td align="center"><?=$data["e_t"]; ?> ��.</td>
			<td>
			<form action="" method="post">
				<input type="hidden" name="set_tree" value="e_t" />
				<input type="hidden" name="type" value="2" />
				<input type="submit" value="+1" />
			</form>
			</td>
		  </tr>
		</table>

	</td>
  </tr>
  
  
  

  
  
  <tr>
    <td style="padding-left:10px;">Referer:</td>
    <td width="200" align="center">[<?=$data["referer_id"]; ?>]<?=$data["referer"]; ?></td>
  </tr>
  <tr bgcolor="#efefef">
    <td style="padding-left:10px;">���������:</td>
	
	<?PHP
	$db->Query("SELECT COUNT(*) FROM al_polzov_a WHERE referer_id = '".$data["id"]."'");
	$counter_res = $db->FetchRow();
	?>
	
    <td width="200" align="center"><?=$data["referals"]; ?> [<?=$counter_res; ?>] ���.</td>
  </tr>
  
  <tr>
    <td style="padding-left:10px;">��������� �� ���������:</td>
    <td width="200" align="center"><?=sprintf("%.2f",$data["from_referals"]); ?> ���.</td>
  </tr>
  <tr bgcolor="#efefef">
    <td style="padding-left:10px;">������ ��������:</td>
    <td width="200" align="center"><?=sprintf("%.2f",$data["to_referer"]); ?> ���.</td>
  </tr>
  
  
  
  <tr>
    <td style="padding-left:10px;">���������������:</td>
    <td width="200" align="center"><?=date("d.m.Y � H:i:s",$data["date_reg"]); ?></td>
  </tr>
  <tr bgcolor="#efefef">
    <td style="padding-left:10px;">��������� ����:</td>
    <td width="200" align="center"><?=date("d.m.Y � H:i:s",$data["date_login"]); ?></td>
  </tr>
  <tr>
    <td style="padding-left:10px;">��������� IP:</td>
    <td width="200" align="center"><?=$data["uip"]; ?></td>
  </tr>
  
  
  <tr bgcolor="#efefef">
    <td style="padding-left:10px;">��������� �� ������:</td>
    <td width="200" align="center"><?=sprintf("%.2f",$data["insert_sum"]); ?> <?=$config->VAL; ?></td>
  </tr>
  <tr>
    <td style="padding-left:10px;">��������� �� �������:</td>
    <td width="200" align="center"><?=sprintf("%.2f",$data["payment_sum"]); ?> <?=$config->VAL; ?></td>
  </tr>
 
  <tr bgcolor="#efefef">
    <td style="padding-left:10px;">������� (<?=($data["banned"] > 0) ? '<font color = "red"><b>��</b></font>' : '<font color = "green"><b>���</b></font>'; ?>):</td>
    <td width="200" align="center">
	<form action="" method="post">
	<input type="hidden" name="banned" value="<?=($data["banned"] > 0) ? 0 : 1 ;?>" />
	<input type="submit" value="<?=($data["banned"] > 0) ? '���������' : '��������'; ?>" />
	</form>
	</td>
  </tr>
  
  
</table>
<BR />
<BR />
<form action="" method="post">
<table width="100%" border="0">
  <tr bgcolor="#EFEFEF">
    <td align="center" colspan="4"><b>�������� � ��������:</b></td>
  </tr>
  <tr>
    <td align="center">
		<select name="balance_set">
			<option value="2">�������� �� ������</option>
			<option value="1">����� � �������</option>
		</select>
	</td>
	<td align="center">
		<select name="schet">
			<option value="money_b">��� �������</option>
			<option value="money_p">��� ������</option>
	

		</select>
	</td>
    <td align="center"><input type="text" name="sum" value="100" size="7"/></td>
    <td align="center"><input type="submit" value="���������" /></td>
  </tr>
</table>
</form>
</div>
<div class="clr"></div>	
<?PHP

return;
}

?>
<form action="/?menu=myadmin72g52u8&sel=users&search" method="post">
<table width="250" border="0" align="center">
  <tr>
    <td><b>�����:</b></td>
    <td><input type="text" name="sear" /></td>
	<td><input type="submit" value="�����" /></td>
  </tr>
</table>
</form>
<BR />
<?PHP

function sort_b($int_s){
	
	$int_s = intval($int_s);
	
	switch($int_s){
	
		case 1: return "al_polzov_a.user";
		case 2: return "all_serebro";
		case 3: return "all_trees";
		case 4: return "al_polzov_a.date_reg";
		
		default: return "al_polzov_a.id";
	}

}
$sort_b = (isset($_GET["sort"])) ? intval($_GET["sort"]) : 0;

$str_sort = sort_b($sort_b);


$num_p = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"]) -1) : 0;
$lim = $num_p * 100;

if(isset($_GET["search"])){
$search = $_POST["sear"];
$db->Query("SELECT *, (db_users_b.a_t + db_users_b.b_t + db_users_b.c_t + db_users_b.d_t + db_users_b.e_t) all_trees, (db_users_b.money_b + db_users_b.money_p) all_serebro 
FROM al_polzov_a, db_users_b WHERE al_polzov_a.id = db_users_b.id AND al_polzov_a.user = '$search' ORDER BY {$str_sort} DESC LIMIT {$lim}, 100");

}else $db->Query("SELECT *, (db_users_b.a_t + db_users_b.b_t + db_users_b.c_t + db_users_b.d_t + db_users_b.e_t) all_trees, (db_users_b.money_b + db_users_b.money_p) all_serebro 
FROM al_polzov_a, db_users_b WHERE al_polzov_a.id = db_users_b.id ORDER BY {$str_sort} DESC LIMIT {$lim}, 100");



if($db->NumRows() > 0){

?>
<table cellpadding='3' cellspacing='0' border='0' bordercolor='#336633' align='center' width="99%">
  <tr bgcolor="#efefef">
    <td align="center" width="50" class="m-tb"><a href="/?menu=myadmin72g52u8&sel=users&sort=0" class="stn-sort">ID</a></td>
    <td align="center" class="m-tb"><a href="/?menu=myadmin72g52u8&sel=users&sort=1" class="stn-sort">User</a></td>
    <td align="center" width="90" class="m-tb"><a href="/?menu=myadmin72g52u8&sel=users&sort=2" class="stn-sort">�������</a></td>
	<td align="center" width="75" class="m-tb"><a href="/?menu=myadmin72g52u8&sel=users&sort=3" class="stn-sort">����</a></td>
	<td align="center" width="100" class="m-tb"><a href="/?menu=myadmin72g52u8&sel=users&sort=4" class="stn-sort">���������������</a></td>
  </tr>


<?PHP

	while($data = $db->FetchArray()){
	
	?>
	<tr class="htt">
    <td align="center"><?=$data["id"]; ?></td>
    <td align="center"><a href="/?menu=myadmin72g52u8&sel=users&edit=<?=$data["id"]; ?>" class="stn"><?=$data["user"]; ?></a></td>
    <td align="center"><?=sprintf("%.2f",$data["all_serebro"]); ?></td>
	<td align="center"><?=$data["all_trees"]; ?></td>
	<td align="center"><?=date("d.m.Y",$data["date_reg"]); ?></td>
  	</tr>
	<?PHP
	
	}

?>

</table>
<BR />
<?PHP


}else echo "<center><b>�� ������ �������� ��� �������</b></center><BR />";

	if(isset($_GET["search"])){
	
	?>
	</div>
	<div class="clr"></div>	
	<?PHP
	
		return;
	
	}
	
$db->Query("SELECT COUNT(*) FROM al_polzov_a");
$all_pages = $db->FetchRow();

	if($all_pages > 100){
	
	$sort_b = (isset($_GET["sort"])) ? intval($_GET["sort"]) : 0;
	
	$nav = new navigator;
	$page = (isset($_GET["page"]) AND intval($_GET["page"]) < 1000 AND intval($_GET["page"]) >= 1) ? (intval($_GET["page"])) : 1;
	
	echo "<BR /><center>".$nav->Navigation(10, $page, ceil($all_pages / 100), "/?menu=myadmin72g52u8&sel=users&sort={$sort_b}&page="), "</center>";
	
	}
?>
</div>
<div class="clr"></div>	