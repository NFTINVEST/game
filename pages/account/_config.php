<?PHP
$_OPTIMIZATION["title"] = "������� - ���������";
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM al_polzov_a WHERE id = '$usid'");
$user_data = $db->FetchArray();
?>
<div class="s-bk-lf">
	<div class="acc-title">���������</div>
</div>
<div class="silver-bk">
<div class="clr"></div>	

<center><b>����� ������</b></center>
<BR />
<?PHP
	if(isset($_POST["old"])){
	
		$old = $func->IsPassword($_POST["old"]);
		$new = $func->IsPassword($_POST["new"]);
		
			if($old !== false AND strtolower($old) == strtolower($user_data["pass"])){
			
				if($new !== false){
				
					if( strtolower($new) == strtolower($_POST["re_new"])){
					
						$db->Query("UPDATE al_polzov_a SET pass = '$new' WHERE id = '$usid'");
						
						echo "<center><font color = 'green'><b>����� ������ ������� ����������</b></font></center><BR />";
					
					}else echo "<center><font color = 'red'><b>������ � ������ ������ �� ���������</b></font></center><BR />";
				
				}else echo "<center><font color = 'red'><b>����� ������ ����� �������� ������</b></font></center><BR />";
			
			}else echo "<center><font color = 'red'><b>������ ������ �������� �������</b></font></center><BR />";
		
	}
?>


<form action="" method="post">
<table width="330" border="0" align="center">
  <tr>
    <td><b>������ ������:</b></td>
    <td align="center"><input type="password" name="old" /></td>
  </tr>
  <tr>
    <td><b>����� ������:</b></td>
    <td align="center"><input type="password" name="new" /></td>
  </tr>
  <tr>
    <td><b>������ ������:</b></td>
    <td align="center"><input type="password" name="re_new" /></td>
  </tr>
  <tr>
    <td align="center" colspan="2"><BR /><input type="submit" value="������� ������" /></td>
  </tr>
</table>
</form>
<BR />
���� ������ ������ ����� �� 6 �� 20 �������� (������ ����. �������)
<div class="clr"></div>		
</div>




