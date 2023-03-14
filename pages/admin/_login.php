<center><h2><font color = 'red'>Авторизация</font></h2></center>

<?PHP
if(isset($_SESSION["admin"])){ Header("Location: /?menu=myadmin72g52u8"); return; }

if(isset($_POST["admlogin"])){

	$db->Query("SELECT * FROM db_confligsg WHERE id = 1 LIMIT 1");
	$data_log = $db->FetchArray();
	
	if(strtolower($_POST["admlogin"]) == strtolower("admin75n5yb") AND strtolower($_POST["admpass"]) == strtolower("admih7ik9DSjnE7") ){
	
		$_SESSION["admin"] = true;
		Header("Location: /?menu=myadmin72g52u8");
		return;
	}else echo "<center><font color = 'red'><b>Неверно введен логин и/или пароль</b></font></center><BR />";
	
}

?>
<form action="" method="post">
<table width="300" border="0" align="center">
  <tr>
    <td><b><font color = 'red'>Логин:</font></b></td>
	<td align="center"><input type="text" name="admlogin" value="" /></td>
  </tr>
  <tr>
    <td><b><font color = 'red'>Пароль:</font></b></td>
	<td align="center"><input type="password" name="admpass" value="" /></td>
  </tr>
  <tr>
	<td style="padding-top:5px;" align="center" colspan="2"><input type="submit" value="Войти" /></td>
  </tr>
</table>
</form>