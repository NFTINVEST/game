<?PHP
######################################
# ����� Sale-script.ru
# ICQ:27837023
######################################
$_OPTIMIZATION["title"] = "�������";
$_OPTIMIZATION["description"] = "������� ������������";
$_OPTIMIZATION["keywords"] = "�������, ������ �������, ������������";

# ���������� ������
if(!isset($_SESSION["user_id"])){ Header("Location: /"); return; }

if(isset($_GET["sel"])){
		
	$smenu = strval($_GET["sel"]);
			
	switch($smenu){
		

case "knb": include("pages/_knb.php"); break; // ���
case "ins": include("pages/account/_ins.php"); break; // insertf
case "insertf": include("pages/account/_insertf.php"); break; // insertf
case "flash": include("pages/account/_flash.php"); break; // flash
case "benzokolonka": include("pages/_benzokolonka.php"); break; // benzokolonka
case "fight": include("pages/account/_fight.php"); break; // fight
case "chess": include("pages/account/_chess.php"); break; // chess
case "rul": include("pages/account/_rul.php"); break;
		case "stats": include("pages/account/_story.php"); break; // ����������
		case "referals": include("pages/account/_referals.php"); break; // ��������
		case "farm": include("pages/account/_farm.php"); break; // ��� �����
		case "store": include("pages/account/_store.php"); break; // �����
		case "chat": include("pages/account/_chat.php"); break; // CHAT
		case "swap": include("pages/account/_swap.php"); break; // �������� �����
		case "market": include("pages/account/_market.php"); break; // �����
		case "payment": include("pages/account/_payment.php"); break; // ������� WM
		case "paymentt": include("pages/account/_paymentt.php"); break; // ������� WM
		case "paymentt_my": include("pages/account/_paymentt_my.php"); break; // ������� WM
                case "qiwi_insert": include("pages/account/_qiwi_insert.php"); break; // qiwi 
		case "payment_qiwi": include("pages/account/_payment_qiwi.php"); break; // ������� QIWI
		case "insert": include("pages/account/_insert.php"); break; // ���������� �������
		case "config": include("pages/account/_config.php"); break; // ���������
		case "bonus": include("pages/account/_bonus.php"); break; // ���������� �����
		case "wheel": include("pages/account/_wheel.php"); break; // ������ �������
                case "bux4ik": include("pages/account/_bux4ik.php"); break; // ������� �����
		case "lott": include("pages/account/_lott.php"); break; // �������
		case "lottery": include("pages/account/_lottery.php"); break; // �������
		case "lottery2": include("pages/account/_lottery2.php"); break; // �������
		case "lottery2_winners": include("pages/account/_lottery2.php"); break; // �������
		case "lottery3": include("pages/account/_lottery3.php"); break; // �������
				case "pay_points": include("pages/account/_pay_points.php"); break; // ��������� �����
		case "exit": @session_destroy(); Header("Location: /"); return; break; // �����
				
	# �������� ������
	default: @include("pages/_404.php"); break;
			
	}
			
}else @include("pages/account/_user_account.php");

?>