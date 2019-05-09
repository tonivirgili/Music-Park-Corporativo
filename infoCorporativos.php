<?

$erro = null;

$nome = $_POST["nomeCampo"];
$email = $_POST["emailCampo"];
$telefone = $_POST["telefoneCampo"];
$dataEvento = $_POST["datEventoCampo"];
$local = $_POST["localEvento"];
switch ($local) {
	case '0':
		$local = "Jurerê";
		$emailDestino = "marcelo.bohrer@grupoall.com.br, thaisa.negrao@grupoall.com.br";
		break;
	case '1':
		$local = "BC";
		$emailDestino = "alexandra.cunha@grupoall.com.br, thaisa.negrao@grupoall.com.br";
		break;
}
$tipoEvento = $_POST["tipoEvento"];
switch ($tipoEvento) {
	case '0':
		$tipoEvento = "Casamento";
		break;
	case '1':
		$tipoEvento = "Jantar";
		break;
	case '2':
		$tipoEvento = "Desfile";
		break;
	case '3':
		$tipoEvento = "Formatura";
		break;
	case '4':
		$tipoEvento = "Aniversário";
		break;
	case '5':
		$tipoEvento = "Congresso";
		break;
	case '6':
		$tipoEvento = "Convenção";
		break;
	case '7':
		$tipoEvento = "Workshop";
		break;
	case '8':
		$tipoEvento = "Coquetel";
		break;
	case '9':
		$tipoEvento = "Personalize";
		break;
}
$numeroPessoas = $_POST["numeroPessoasCampo"];
$mensagem = $_POST["mensagemCampo"];

//Montagem email
$emailRemetente = "cadastro_corporativo@musicpark.com.br";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "From: " . $emailRemetente . "\r\n"; 
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$assunto = "Contato enviado do Music Park Corporativo";
$corpo = "Nome: $nome\r\nEmail: $email\r\nTelefone: $telefone\r\nData do Evento: $dataEvento\r\n
Local: $local\r\n
Tipo de evento: $tipoEvento\r\nNúmero de pessoas: $numeroPessoas\r\nMensagem: $mensagem";

//Validacoes

if (strlen($nome) == 0 || strlen($nome) > 35) {
	echo "<script type='text/javascript'>alert('O campo não foi preenchido corretamente.'); window.history.back();</script>";
	return;
}
if (strlen($email) == 0 || strlen($email) > 35) {
	echo "<script type='text/javascript'>alert('O campo não foi preenchido corretamente.'); window.history.back();</script>";
	return;
}
if (strlen($telefone) == 0 || strlen($telefone) > 35) {
	echo "<script type='text/javascript'>alert('O campo não foi preenchido corretamente.'); window.history.back();</script>";
	return;
}
if (strlen($local) == 0 || strlen($local) > 35) {
	echo "<script type='text/javascript'>alert('O campo não foi preenchido corretamente.'); window.history.back();</script>";
	return;
}
if (strlen($tipoEvento) == 0 || strlen($tipoEvento) > 35) {
	echo "<script type='text/javascript'>alert('O campo não foi preenchido corretamente.'); window.history.back();</script>";
	return;
}
if (strlen($numeroPessoas) == 0 || strlen($numeroPessoas) > 8) {
	echo "<script type='text/javascript'>alert('O campo não foi preenchido corretamente.'); window.history.back();</script>";
	return;
}

//Enviando
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true) {
	if (mail($emailDestino, $assunto, $corpo, $header, "-f$emailRemetente")){
			echo "<script type='text/javascript'>alert('Seus dados foram enviados com sucesso!'); </script>";
			//conecta com o BD
			try {
				$connection = new PDO("mysql:host=ecorp8940.whmserver.net;dbname=musicpar_corporativo", "musicpar_corpo", "music2015park");
			}
			catch (PDOException $e) {
				echo "Falha: " . $e->getMessage();
				exit();
			}
			$stmt = $connection->prepare("INSERT INTO CADASTROS (NOME, EMAIL, TELEFONE, DATA_, LOCAL_, TIPODEEVENTO, PESSOAS, MENSAGEM) values (?, ?, ?, ?, ?, ?, ?, ?)");
			$stmt->bindParam(1, $_POST["nomeCampo"]);
			$stmt->bindParam(2, $_POST["emailCampo"]);
			$stmt->bindParam(3, $_POST["telefoneCampo"]);
			$stmt->bindParam(4, $_POST["datEventoCampo"]);
			$stmt->bindParam(5, $local);
			$stmt->bindParam(6, $tipoEvento);
			$stmt->bindParam(7, $_POST["numeroPessoasCampo"]);
			$stmt->bindParam(8, $_POST["mensagemCampo"]);

			$stmt->execute();

			if ($stmt->errorCode() != "00000") {
				$validar = false;
				$erro = "Erro código " . $stmt->errorCode() . ": ";
				$erro .= implode(", ", $stmt->errorInfo());
				echo $erro;
			}
			else
			{
				echo "<script type='text/javascript'>window.location = 'http://www.musicpark.com.br/corporativo/agradecimento.html'; </script>";
			}
	}
	else{
		echo "<script type='text/javascript'>alert('Ouve alguma falha no envio de seus dados. Por favor tente novamente ou entre em contato por um de nossos telefones.');</script>";
	}
}

?>