<html>
<head>
	<title>Music Park - Cadastros Corporativo</title>

	<meta charset = "utf-8">
	<meta name = "description" content = "Cadastro para eventos corportivos"/>
	<meta name="author" content="Tony Virgili">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

	<link rel="apple-touch-icon" sizes="57x57" href="http://www.musicpark.com.br/five_icon_music_park/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://www.musicpark.com.br/five_icon_music_park/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://www.musicpark.com.br/five_icon_music_park/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="http://www.musicpark.com.br/five_icon_music_park/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://www.musicpark.com.br/five_icon_music_park/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="http://www.musicpark.com.br/five_icon_music_park/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://www.musicpark.com.br/five_icon_music_park/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="http://www.musicpark.com.br/five_icon_music_park/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="http://www.musicpark.com.br/five_icon_music_park/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="http://www.musicpark.com.br/five_icon_music_park/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://www.musicpark.com.br/five_icon_music_park/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="http://www.musicpark.com.br/five_icon_music_park/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://www.musicpark.com.br/five_icon_music_park/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/resultado_style.css">

	<!--[if lt IE 9]>
		<script src = "js/html5shiv.min"></script>
	<![endif]-->

	<style type="text/css">
		.jumbotron{
			width: 600px;
			margin-left: auto;
			margin-right: auto;
			padding-left: 20px;
			padding-right: 20px;
		}
	</style>

</head>
<body>

	<header>
			<div class="cabecalho">
				<div class="logo-music-park"></div>
			</div>
	</header>

	<?

		//conecta com o BD
			try {
				$connection = new PDO("mysql:host=ecorp8940.whmserver.net;dbname=musicpar_corporativo", "musicpar_corpo", "music2015park");
			}
			catch (PDOException $e) {
				echo "Falha: " . $e->getMessage();
				exit();
			}

			$resultSet = $connection->prepare("SELECT * FROM CADASTROS WHERE ID = $_GET[id]");

			if ($resultSet->execute()) {
				while ($registro = $resultSet->fetch(PDO::FETCH_OBJ)) {
					
					echo "<div class='jumbotron'>";
						echo "<i>Nome:&nbsp;</i> <b>".$registro->NOME."</b><br/>";
						echo "<i>Email:&nbsp;</i> <b>".$registro->EMAIL."</b><br/>";
						echo "<i>Telefone:&nbsp;</i> <b>".$registro->TELEFONE."</b><br/>";
						echo "<i>Data:&nbsp;</i> <b>".$registro->DATA_."</b><br/>";
						echo "<i>Local:&nbsp;</i> <b>".$registro->LOCAL_."</b><br/>";
						echo "<i>Tipo de evento:&nbsp;</i> <b>".$registro->TIPODEEVENTO."</b><br/>";
						echo "<i>Número de pessoas:&nbsp;</i> <b>".$registro->PESSOAS."</b><br/>";
						echo "<i>Mensagem:&nbsp;</i> <b>".$registro->MENSAGEM."<br/>"."</b><br/>";
					echo "</div>";
				}
			}
			else {
				echo "Falha na seleção de cadastrados.";
			}
		?>

		<!--OK-->
		<div class="botao">
			<div class="botaoin">
				<input type="button" value="OK" class="btn btn-info-enviar" name="ok" onclick="history.back(-1);">
			</div>
		</div>
		

</body>
</html>