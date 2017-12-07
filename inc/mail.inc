<?php
if(isset($_POST['submit'])){/*submit되어 Reload될때*/ 
	$userName = $_POST['userName'];
	$to = $_POST['mail'];
	$phone = $_POST['phone'];
	if(!isset($to)){
		$to  = 'lacuca@naver.com' . ', '; // note the comma
	}
	// subject
	$subject = '[PHP.TAXI] 문의메일입니다.';
	// message
	$message ='<p><em>보낸사람:</em> '.$userName.'</p>
			<p><em>메일주소:</em> '.$to.'</p>
			<p><em>전화번호:</em> '.$phone.'</p>
			<p><em>컨텐츠내용:</em></p>
			<p><hr>'.$_POST['message'].'</p>';
	// To send HTML mail, the Content-type header must be set
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From:'.$userName.'<'.$to.'>' . "\r\n";
	$result = mail($to, $subject, $message, $headers);
	if($result){
		echo '<script>alert("전송완료되었습니다");</script>';
		echo '<script>location.href="/";</script>';
		//header('Location: http://php.taxi/');
	}else{		
	}
}else{
}
?>
<style>
.mail p{display:block;margin-bottom:5px;}
.mail p em {display:none;}
.mail p input , .mail p textarea {display:block;width:100%;padding:5px 20px; box-sizing:border-box;}
.mail p textarea {height:100px;}
.mail input[type="submit"] {border:0;color:#fff;background:#333;}

</style>
<form class="mail" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
	<p><em>name</em><input name="userName" type="text" placeHolder="Insert name"/></p>
	<p><em>mail</em><input name="mail" type="email" placeHolder="Insert E-mail"/></p>
	<p><em>mobile</em><input name="phone" type="tel" placeHolder="Insert mobile number"/></p>
	<p><em>text</em><textarea name="message" placeHolder="Insert TEXT"></textarea></p>
	<p><input name="submit" type="submit" value="SEND"></p>
</form>