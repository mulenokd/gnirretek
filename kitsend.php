<?php
	require_once("phpmail.php");

	$email_admin = "mulenokd@gmail.com";
	// $email_admin = "soc.taxi.35@gmail.com";

	$from = "“Кейтеринг Томск”";
	$email_from = "robot@keterring.ru";

	$deafult = array("name"=>"Имя","phone"=>"Телефон", "email"=>"E-mail", "comment" => "Комментарий");

	$fields = array();

	if( count($_POST) ){

		foreach ($deafult  as $key => $value){
			if( isset($_POST[$key]) ){
				$fields[$value] = $_POST[$key];
			}
		}

		$i = 1;
		while( isset($_POST[''.$i]) ){
			$fields[$_POST[$i."-name"]] = $_POST[''.$i];
			$i++;
		}


		$title = "Поступила заявка с сайта ".$from.":\n";

		$message = "<div><h3 style=\"color: #333;\">".$title."</h3>";

		$name = "Имя";

		foreach ($fields  as $key => $value){
			$message .= "<div><p><b>".$key.": </b>".$value."</p></div>";
		}
			
		$message .= "</div>";
		
		if(send_mime_mail("Сайт ".$from,$email_from,$name,$email_admin,'UTF-8','UTF-8',$message,true)){
			echo "1";
		}else{
			echo "0";
		}
	}
?>