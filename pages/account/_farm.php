                                                                <div class="s-bk-lf">

<div class="acc-title">�������</div>

</div>



							   <div class="silver-bk">

<font color="#000000"><h4>����� �� ������ ������ ���� ������ �������, ������� ����� �������� ������� ������������, � ������������� ���������� �� � ������. ��� ������ ������, ��� ������ ������� � ���� ����� �� ��� ��������. </h></font>
<?PHP

$_OPTIMIZATION["title"] = "������� - �����";

$usid = $_SESSION["user_id"];

$refid = $_SESSION["referer_id"];

$usname = $_SESSION["user"];



$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");

$user_data = $db->FetchArray();



$db->Query("SELECT * FROM db_confligsg WHERE id = '1' LIMIT 1");

$sonfig_site = $db->FetchArray();



# ������� ������ ������

if(isset($_POST["item"])){



$array_items = array(1 => "a_t", 2 => "b_t", 3 => "c_t", 4 => "d_t", 5 => "e_t");

$array_name = array(1 => "��� ��������", 2 => "���� ��������", 3 => "����� �������", 4 => "������ �����", 5 => "���� �����");

$item = intval($_POST["item"]);

$citem = $array_items[$item];



	if(strlen($citem) >= 3){

		

		# ��������� �������� ������������

		$need_money = $sonfig_site["amount_".$citem];

		if($need_money <= $user_data["money_b"]){

		

			if($user_data["last_sbor"] == 0 OR $user_data["last_sbor"] > ( time() - 60*20) ){

				

				$to_referer = $need_money * 0.1;

				# ��������� ������ � ��������� ������

				$db->Query("UPDATE db_users_b SET money_b = money_b - $need_money, $citem = $citem + 1,  

				last_sbor = IF(last_sbor > 0, last_sbor, '".time()."') WHERE id = '$usid'");

				

				# ������ ������ � �������

				$db->Query("INSERT INTO db_stats_btree (user_id, user, tree_name, amount, date_add, date_del) 

				VALUES ('$usid','$usname','".$array_name[$item]."','$need_money','".time()."','".(time()+60*60*24*15)."')");

				

				echo "<center><font color = 'green'><b>�� ������� ������ ������.</b></font></center><BR />";

				

				$db->Query("SELECT * FROM db_users_b WHERE id = '$usid' LIMIT 1");

				$user_data = $db->FetchArray();

				

			}else echo "<center><font color = 'red'><b>����� ��� ��� ������� ������ - �������� �������!</b></font></center><BR />";

		

		}else echo "<center><font color = 'red'><b>������������ �������!</b></font></center><BR />";

	

	}else echo 222;



}



?>







<div class="fr-block">

	<form action="" method="post">

	<div class="cl-fr-lf">

		<img src="/img/fruit/1.png" />

	</div>

	

	<div class="cl-fr-rg" style="padding-left:20px;">

		<div class="fr-te-gr-title"><b>Miner Mini</b></div>

		<div class="fr-te-gr">��������: <font color="#000000"><?=$sonfig_site["a_in_h"]; ?> ����� � ���</font></div>

		<div class="fr-te-gr">���������: <font color="#000000"><?=$sonfig_site["amount_a_t"]; ?> �������</font></div>

		<div class="fr-te-gr">������ ��: <font color="#000000"><?=$user_data["a_t"]; ?> </font></div>

		<input type="hidden" name="item" value="1" />

		<input type="submit" value="������" style="height: 30px; margin-top:10px;" />

	</div>

	</form>

</div>



<div class="fr-block">

	<form action="" method="post">

	<div class="cl-fr-lf">

		<img src="/img/fruit/2.png" />

	</div>

	

	<div class="cl-fr-rg" style="padding-left:20px;">

		<div class="fr-te-gr-title"><b>Miner Normal</b></div>

		<div class="fr-te-gr">��������: <font color="#000000"><?=$sonfig_site["b_in_h"]; ?> ����� � ���</font></div>

		<div class="fr-te-gr">���������: <font color="#000000"><?=$sonfig_site["amount_b_t"]; ?> �������</font></div>

		<div class="fr-te-gr">������ ��: <font color="#000000"><?=$user_data["b_t"]; ?> </font></div>

		<input type="hidden" name="item" value="2" />

		<input type="submit" value="������" style="height: 30px; margin-top:10px;">

	</div>

	</form>

</div>



<div class="fr-block">

	<form action="" method="post">

	<div class="cl-fr-lf">

		<img src="/img/fruit/3.png" />

	</div>

	

	<div class="cl-fr-rg" style="padding-left:20px;">

		<div class="fr-te-gr-title"><b>Miner Standart</b></div>

		<div class="fr-te-gr">��������: <font color="#000000"><?=$sonfig_site["c_in_h"]; ?> ����� � ���</font></div>

		<div class="fr-te-gr">���������: <font color="#000000"><?=$sonfig_site["amount_c_t"]; ?> �������</font></div>

		<div class="fr-te-gr">������ ��: <font color="#000000"><?=$user_data["c_t"]; ?> </font></div>

		<input type="hidden" name="item" value="3" />

		<input type="submit" value="������" style="height: 30px; margin-top:10px;">

	</div>

	</form>

</div>



<div class="fr-block">

	<form action="" method="post">

	<div class="cl-fr-lf">

		<img src="/img/fruit/4.png" />

	</div>

	

	<div class="cl-fr-rg" style="padding-left:20px;">

		<div class="fr-te-gr-title"><b>Miner Farm</b></div>

		<div class="fr-te-gr">��������: <font color="#000000"><?=$sonfig_site["d_in_h"]; ?> ����� � ���</font></div>

		<div class="fr-te-gr">���������: <font color="#000000"><?=$sonfig_site["amount_d_t"]; ?> �������</font></div>

		<div class="fr-te-gr">������ ��: <font color="#000000"><?=$user_data["d_t"]; ?> </font></div>

		<input type="hidden" name="item" value="4" />

		<input type="submit" value="������" style="height: 30px; margin-top:10px;">

	</div>

	</form>

</div>



<div class="fr-block">

	<form action="" method="post">

	<div class="cl-fr-lf">

		<img src="/img/fruit/5.png" />

	</div>

	

	<div class="cl-fr-rg" style="padding-left:20px;">

		<div class="fr-te-gr-title"><b></b>Miner Mega Farm</div>

		<div class="fr-te-gr">��������: <font color="#000000"><?=$sonfig_site["e_in_h"]; ?> ����� � ���</font></div>

		<div class="fr-te-gr">���������: <font color="#000000"><?=$sonfig_site["amount_e_t"]; ?> �������</font></div>

		<div class="fr-te-gr">������ ��: <font color="#000000"><?=$user_data["e_t"]; ?> </font></div>

		<input type="hidden" name="item" value="5" />

		<input type="submit" value="������" style="height: 30px; margin-top:10px;">

	</div>

	</form>

</div>

<div class="clr"></div>

</div>





                            

                            