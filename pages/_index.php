<?PHP
$db->Query("SELECT * FROM db_confligsg WHERE id = '1'");
$data_c = $db->FetchArray();



# ����������
if(isset($_POST["admin"])){

	$admin = $func->IsLogin($_POST["admin"]);
	$pass = $func->IsLogin($_POST["pass"]);
	
	
	$ser_per_wmr = intval($_POST["ser_per_wmr"]);
	$ser_per_wmz = intval($_POST["ser_per_wmz"]);
	$ser_per_wme = intval($_POST["ser_per_wme"]);
	$percent_swap = intval($_POST["percent_swap"]);
	$percent_sell = intval($_POST["percent_sell"]);
	$items_per_coin = intval($_POST["items_per_coin"]);
        $pirog = intval($_POST["pirog"]);
	$pirog_cen = intval($_POST["pirog_cen"]);
	$keks = intval($_POST["keks"]);
	$keks_cena = intval($_POST["keks_cena"]);
	
	$tomat_in_h = intval($_POST["a_in_h"]);
	$straw_in_h = intval($_POST["b_in_h"]);
	$pump_in_h = intval($_POST["c_in_h"]);
	$peas_in_h = intval($_POST["d_in_h"]);
	$pean_in_h = intval($_POST["e_in_h"]);
	$peanf_in_h = intval($_POST["f_in_h"]);
	$peang_in_h = intval($_POST["g_in_h"]);
	$peanh_in_h = intval($_POST["h_in_h"]);
	$peanj_in_h = intval($_POST["j_in_h"]);
	
	$amount_tomat_t = intval($_POST["amount_a_t"]);
	$amount_straw_t = intval($_POST["amount_b_t"]);
	$amount_pump_t = intval($_POST["amount_c_t"]);
	$amount_peas_t = intval($_POST["amount_d_t"]);
	$amount_pean_t = intval($_POST["amount_e_t"]);
	$amount_peanf_t = intval($_POST["amount_f_t"]);
	$amount_peang_t = intval($_POST["amount_g_t"]);
	$amount_peanh_t = intval($_POST["amount_h_t"]);
	$amount_peanj_t = intval($_POST["amount_j_t"]);
 

	

	
	# ����������
	if($errors){
	
		$db->Query("UPDATE db_confligsg SET 
		
		admin = '$admin',
		pass = '$pass',
		ser_per_wmr = '$ser_per_wmr',
		ser_per_wmz = '$ser_per_wmz',
		ser_per_wme = '$ser_per_wme',
		percent_swap = '$percent_swap',
		percent_sell = '$percent_sell',
		items_per_coin = '$items_per_coin',
		a_in_h = '$tomat_in_h',
		b_in_h = '$straw_in_h',
		c_in_h = '$pump_in_h',
		d_in_h = '$peas_in_h',
		e_in_h = '$pean_in_h',
		f_in_h = '$peanf_in_h',
		g_in_h = '$peang_in_h',
		h_in_h = '$peanh_in_h',
		j_in_h = '$peanj_in_h',
		amount_a_t = '$amount_tomat_t',
		amount_b_t = '$amount_straw_t',
		amount_c_t = '$amount_pump_t',
		amount_d_t = '$amount_peas_t',
		amount_e_t = '$amount_pean_t',
		amount_f_t = '$amount_peanf_t',
		amount_g_t = '$amount_peang_t',
		amount_h_t = '$amount_peanh_t',
		amount_j_t = '$amount_peanj_t'
		
		WHERE id = '1'");
		

	}
	
}

?>

<br><br>


<div class="silver-bk"> 



<h3> <font color="109a05">������������ �� ����� ������� </font><br> 



<br>
�� ������������� ������� �������� �������<br> <br>

� ��� <font color="e55506"><?=$data_c["percent_sell"]; ?>% </font> �� ����� <br><br>

� ��� <font color="e55506">1 �����</font> �� ������� ������������� �������� <br><br>

� ��� <font color="e55506">10% </font> ����������� ����� �� ����� <br><br>

� ��� ��� <font color="e55506">������!</font><br><br>

� ��� ��� ����������� �� �����<br><br>

� ��� <font color="e55506">���� �������<br><br>



</font>



</font></b> 
</font></p>
                              </div>






