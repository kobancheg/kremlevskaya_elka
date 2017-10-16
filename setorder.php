<?php
//	header("Content-Type: text/html; charset=utf-8");
	
	//userdata = "cpos="+count_pos+topt_4all+"&fam="+$('#fam').val() +"&nam="+$('#nam').val()+"&pronam="+$('#pronam').val()+"&email="+$('#email').val()+"&tel="+$('#tel').val()+"&org="+$('#org').val();
	if (isset($_POST['cpos'])){	$cpos = $_POST['cpos']; } 
	
	if(strlen($cpos) > 10 ){$respond="Ошибка: нельзя заказать более 10 позиций!"; echo $respond; exit;}
	
	if (isset($_POST['fam'])){$fam = $_POST['fam']; }
	if (isset($_POST['nam'])){$nam = $_POST['nam']; }
	if (isset($_POST['pronam'])){$pronam = $_POST['pronam']; }
	if (isset($_POST['email'])){$emailcl = $_POST['email']; }
	if (isset($_POST['tel'])){$tel = $_POST['tel']; }
	if (isset($_POST['org'])){$org = $_POST['org']; }
	if (isset($_POST['pagtype'])){$pagtype = $_POST['pagtype']; }
	
	//ticket_opt = "&dayz"+iter+"="+$('#dayz :selected').val()+"&timez"+iter+"="+$('#timez :selected').val()+"&typeb"+iter+"="+$('#typeb :selected').val()+"&rx"+iter+"="+$('#rx').val();
/* --------------------------------- График ------------------------------ */
$evtA['242016'] = array('0' => 1,'1' => 1,'2' => 0,'3' => 0,'4' => 1);
$evtA['252016'] = array('0' => 0,'1' => 0,'2' => 0,'3' => 0,'4' => 0); 
$evtA['262016'] = array('0' => 0,'1' => 0,'2' => 0,'3' => 0,'4' => 1); 
$evtA['272016'] = array('0' => 1,'1' => 0,'2' => 0,'3' => 0,'4' => 0);
$evtA['282016'] = array('0' => 1,'1' => 1,'2' => 0,'3' => 0,'4' => 0);
$evtA['292016'] = array('0' => 0,'1' => 1,'2' => 1,'3' => 0,'4' => 0);
$evtA['302016'] = array('0' => 0,'1' => 0,'2' => 1,'3' => 1,'4' => 0);
$evtA['312016'] = array('0' => 0,'1' => 0,'2' => 1,'3' => 1,'4' => 0);

$evtA['012017'] = array('0' => 0,'1' => 0,'2' => 0,'3' => 0,'4' => 1);
$evtA['022017'] = array('0' => 0,'1' => 0,'2' => 1,'3' => 1,'4' => 1);
$evtA['032017'] = array('0' => 1,'1' => 1,'2' => 0,'3' => 0,'4' => 1); 
$evtA['042017'] = array('0' => 1,'1' => 1,'2' => 0,'3' => 0,'4' => 1);
$evtA['052017'] = array('0' => 1,'1' => 1,'2' => 0,'3' => 0,'4' => 1); 
$evtA['062017'] = array('0' => 1,'1' => 1,'2' => 0,'3' => 0,'4' => 1); 
$evtA['072017'] = array('0' => 0,'1' => 1,'2' => 1,'3' => 0,'4' => 1); 
$evtA['082017'] = array('0' => 0,'1' => 0,'2' => 1,'3' => 0,'4' => 1);	
	
	for($i=0;$i<$cpos;$i++){
		
		if (isset($_POST['dayz'.$i])){$param['dayz'.$i] = $_POST['dayz'.$i]; }
		if (isset($_POST['timez'.$i])){$param['timez'.$i] = $_POST['timez'.$i]; }
		if (isset($_POST['typeb'.$i])){$param['typeb'.$i] = $_POST['typeb'.$i]; }
		if (isset($_POST['rx'.$i])){$param['rx'.$i] = $_POST['rx'.$i]; }
	}
	
	if (get_magic_quotes_gpc()){
		$fam = stripcslashes($fam);
		$nam = stripcslashes($nam);
		$pronam = stripcslashes($pronam);
		$emailcl = stripcslashes($email);
		$tel = stripcslashes($tel);
		$org = stripcslashes($org);
	
		for($i=0;$i<$cpos;$i++){
			$param['dayz'.$i] = stripcslashes($param['dayz'.$i]);
			$param['timez'.$i] = stripcslashes($param['timez'.$i]);
			$param['typeb'.$i] = stripcslashes($param['typeb'.$i]);
			$param['rx'.$i] = stripcslashes($param['rx'.$i]);
		}
	}
	
	
			$dayz = $param['dayz'.$i];
			$timez = $param['timez'.$i];
			$rr = $param['typeb'.$i];
			$rx = $param['rx'.$i];
/* ############################################################### ИСКЛЮЧЕНИЯ ###############################################*/	

		for($i=0;$i<$cpos;$i++){
			$dayz = $param['dayz'.$i];
			$timez = $param['timez'.$i];
			$rr = $param['typeb'.$i];
			$rx = $param['rx'.$i];
			
				if ($rr !== "rx"){ // взрослые
					if ($timez == "10"){
						if ($evtA[$dayz]['2'] == "0"){ $respond="На ".$dayz[0].$dayz[1]." число - в 10.00  НЕТ данного типа билета!"; echo $respond; exit; }
					}
					if ($timez == "14"){
						if ($evtA[$dayz]['3'] == "0"){ $respond="На ".$dayz[0].$dayz[1]." число - в 14.00  НЕТ данного типа билета!"; echo $respond; exit; }
					}
					if ($timez == "18"){
						if ($evtA[$dayz]['4'] == "0"){ $respond="На ".$dayz[0].$dayz[1]." число - в 18.00  НЕТ данного типа билета!"; echo $respond; exit; }
					}
				} else{ // ребенок
					if ($timez == "10"){
						if ($evtA[$dayz]['0'] == "0"){ $respond="На ".$dayz[0].$dayz[1]." число - в 10.00  НЕТ данного типа билета!"; echo $respond; exit; }
					}
					if ($timez == "14"){
						if ($evtA[$dayz]['1'] == "0"){ $respond="На ".$dayz[0].$dayz[1]." число - в 14.00  НЕТ данного типа билета!"; echo $respond; exit; }
					}
					if ($timez == "18"){
						$respond="Нет детских билетов на вечерний сеанс (18.00)!"; echo $respond; exit; 
					}					
				}			
		}

//	if($dayz=="252016" AND $timez=="14"){$respond="На выбранное время НЕТ БИЛЕТОВ!"; echo $respond; exit;}

	

	//if($ticket_sum < 10){$respond="Минимальное кол-во билетов предзаказа 10 штук!"; echo $respond; exit;}	
	if(strlen($dayz) > 7 ){$respond="Ошибка: Некорректные данные - ДЕНЬ"; echo $respond; exit;}
	if(strlen($timez) > 7 ){$respond="Ошибка: Некорректные данные - ВРЕМЯ"; echo $respond; exit;}
	if(strlen($rr) > 4 ){$respond="Ошибка: Некорректные данные - КОЛ-ВО РР"; echo $respond; exit;}
	if(strlen($rx) > 4 ){$respond="Ошибка: Некорректные данные - КОЛ_ВО РХ"; echo $respond; exit;}
/* ############################################################### ИСКЛЮЧЕНИЯ ###############################################*/			
	

//$msg =$msg. '_0)-'.$param['dayz0'].'+'.$param['timez0'];
	
	if ($fam == ""){$respond="Не указана ФАМИЛИЯ!"; echo $respond; exit;}
	if ($emailcl ==""){ $respond="Не указан АДРЕС ЭЛЕКТРОННОЙ ПОЧТЫ!"; echo $respond; exit;}
	if ($tel == ""){$respond="Не указан ТЕЛЕФОН!"; echo $respond; exit; }
	if ($org ==""){$respond="Не указано НАЗВАНИЕ ОРГАНИЗАЦИИ"; echo $respond; exit; }	
	
	/* от переполнения буфера*/

	if(strlen($fam) > 60 ){$respond="Ошибка: Слишком длинная ФАМИЛИЯ"; echo $respond; exit;}
	if(strlen($nam) > 60 ){$respond="Ошибка: Слишком длинное ИМЯ"; echo $respond; exit;}
	if(strlen($pronam) > 60 ){$respond="Ошибка: Слишком длинное ОТЧЕСТВО"; echo $respond; exit;}
	if(strlen($emailcl) > 45 ){$respond="Ошибка: Слишком длинный АДРЕС ЭЛЕКТРОННОЙ ПОЧТЫ"; echo $respond; exit;}
	if(strlen($tel) > 40 ){$respond="Ошибка: Слишком длинный НОМЕР ТЕЛЕФОНА"; echo $respond; exit;}
	if(strlen($org) > 70 ){$respond="Ошибка: Слишком длинное НАЗВАНИЕ ОРГАНИЗАЦИИ"; echo $respond; exit;}
/* ############################################################### ИСКЛЮЧЕНИЯ ###############################################*/	


		$GETBD = @mysql_connect("localhost","kremlin_user","f4testb2yxz");
		mysql_select_db("kremlin_elka");
		mysql_set_charset('utf8');

		$fam = mysql_real_escape_string($fam);
		$nam = mysql_real_escape_string($nam);
		$pronam = mysql_real_escape_string($pronam);
		$emailcl = mysql_real_escape_string($emailcl);
		$tel = mysql_real_escape_string($tel);
		$org = mysql_real_escape_string($org);

		for($i=0;$i<$cpos;$i++){
			$param['dayz'.$i] = mysql_real_escape_string($param['dayz'.$i]);
			$param['timez'.$i] = mysql_real_escape_string($param['timez'.$i]);
			$param['typeb'.$i] = mysql_real_escape_string($param['typeb'.$i]);
			$param['rx'.$i] = mysql_real_escape_string($param['rx'.$i]);
		}
		if (GETBD){
			$newcl = mysql_query('INSERT INTO `kremlin_elka`.`organization` (`id`, `fam`, `nam`, `pronam`, `email`, `tel`, `orgname`, `reg`) VALUES (NULL, \''.$fam.'\', \''.$nam.'\', \''.$pronam.'\', \''.$emailcl.'\', \''.$tel.'\', \''.$org.'\', 0)');
			$newcl_id = mysql_insert_id(); 

			if ($newcl){
				for($i=0;$i<$cpos;$i++){
					$a = $param['dayz'.$i];
					$b = $param['timez'.$i];
					$c = $param['typeb'.$i];
					$d = $param['rx'.$i];
					
					$clorder = mysql_query('INSERT INTO `kremlin_elka`.`clorder` (`id`, `id_org`, `day`, `time`, `type`, `count`) VALUES (NULL, \''.$newcl_id.'\', \''.$a.'\', \''.$b.'\', \''.$c.'\', \''.$d.'\')');
				}
			}
		}
		
	//$date1 = date("Y-m-d H:i:s",time());
	
	$email = 'elka@mtuf.ru';
		
		$msg = $msg.'Заказ билетов на Кремлёвскую Ёлку:<br />ФИО: '.$fam.' '.$nam.' '.$pronam.' <br /> Адрес электронной почты: '.$emailcl.'<br />Телефон: '.$tel.'<br />Организация: '.$org.'<br />Способ оплаты:'.$pagtype.'<br />';
				
				for($i=0;$i<$cpos;$i++){
					
					$a = $param['dayz'.$i];
					$b = $param['timez'.$i];
					$c = $param['typeb'.$i];
					$d = $param['rx'.$i];
					$tmpcash = ' <strong>День:</strong> '.$a.' <strong>Время:<strong> '.$b.' <strong>Тип билета:<strong> '.$c.' <strong>Кол-во:<strong> '.$d.'<br />';
					$msg = $msg.$tmpcash;
				}
				
		$msg =  iconv("utf-8", "cp1251", $msg);
		
	//	$header = 'Content-Type: text/html; charset=utf-8\r\n';
	    $header = "Content-Type: text/html; charset=windows-1251\r\n";
		$header .= "From: ELKA 2016 <elka@mtuf.ru>\r\n";
		$tema = "=?UTF-8?B?".base64_encode('Заказ билетов на Ёлку 2016')."?=";
		
		mail($email, $tema, $msg, $header);
/* ###################################################################################################################### */
		$msg = "";
	$email = $emailcl;
		$msg = 'Ваша заявка принята!<br />Для выставления счета оплаты, а также обсуждения наличия интересующих Вас дат и времени сеансов с Вами свяжутся по телефону, указанному в заявке.';
				
		$msg =  iconv("utf-8", "cp1251", $msg);

	    $header = "Content-Type: text/html; charset=windows-1251\r\n";
		$header .= "From: ELKA 2016 <elka@mtuf.ru>\r\n";
		$tema = "=?UTF-8?B?".base64_encode('Информация по билетам на Кремлёвскую Ёлку 2016')."?=";
		
		mail($email, $tema, $msg, $header);
/* ##################################################################################################################### */
		
		$respond = 'Ok!';
			
	if ($GETBD){
		mysql_close($GETBD);
	}
	echo $respond;
?>