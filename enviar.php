<?php 
 
 $para = "mateusbcb@gmail.com";
 
 $name = $_POST['name'];
 $email = $_POST['email'];
 $subject = $_POST['subject'];
 $assunto = "[IMPORTANTE] Formulário de Contato - Site Mateus Brandt";
 $message = $_POST['message'];
 $captcha = $_POST['captcha'];
 
	$body = "Olá,<br /><br />Esta é uma mensagem automática.<br />Caso sinta necessidade você pode respondê-la e o e-mail será encaminhado à minha caixa de entrada.<br /><br />
			<strong>Confira abaixo as informações enviadas:</strong><br /><br /> 
			<strong>Nome: </strong>$name<br /> 
			<strong>E-mail: </strong>$email<br /> 
			<strong>Assunto: </strong>$subject<br />
			<strong>Mensagem: </strong>$message<br /><br />
			Atenciosamente,<br />
			<strong>Mateus Brandt";
	 
	//5 – agora inserimos as codificações corretas e tudo mais. 
	$headers = "Content-Type:text/html; charset=UTF-8\r\n"; 
	//mostrado que o email partiu deste email e seguido do nome 
	$headers .= "From: " . "=?UTF-8?B?".base64_encode("Mateus Brandt")."?=" . "<$para>" . PHP_EOL;
	$headers .= "CC: " . "=?UTF-8?B?".base64_encode($email)."?=" . "<$email>" . PHP_EOL;
	$headers .= "X-Sender: <contato@mateusbrandt.com.br>\r\n"; //email do servidor //que enviou 
	$headers .= "X-Mailer: PHP v".phpversion()."\r\n"; 
	$headers .= "X-IP: ".$_SERVER['REMOTE_ADDR']."\r\n"; 
	$headers .= "Return-Path: <mateusbcb@gmail.com>\r\n"; //caso a msg //seja respondida vai para este email.  
	$headers .= "MIME-Version: 1.0\r\n"; 

	if ($captcha == 2) {
		mail($para, "=?utf-8?B?".base64_encode($assunto)."?=", $body, $headers);
		echo "<script>alert('Mensagem enviada com sucesso!\\n\\nFoi enviada uma cópia da mensagem para seu email.');</script>";
		echo "<script>window.location.href='index.html'</script>";
	}
	else{
		echo "<script>alert('Captcha Inválido!.');</script>";
		echo "<script>window.location.href='index.html'</script>";
	}
	
?>
