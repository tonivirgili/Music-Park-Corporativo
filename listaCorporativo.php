<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Music Park - Lista Cadastro Corporativo</title>

	<meta charset="utf-8" />
	<meta name = "description" content = "Lista de cadastro para eventos corportivos"/>
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
	<link rel="stylesheet" type="text/css" href="css/font-awesome-4.3.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/lista_style.css">

	<!--[if lt IE 9]>
		<script src = "js/html5shiv.min"></script>
	<![endif]-->

	<style type="text/css">

	.fa-refresh{
		color: #41397b;
		font-size: 22px;
		margin-bottom: 22px;
		text-decoration: none;
		}

	.fa-refresh:hover{
		color: #fbae17;
		text-decoration: none;
	}
	.fa-filter{
		color: #41397b;
		font-size: 22px;
		margin-bottom: 22px;
		text-decoration: none;
	}

	</style>


</head>

<body>

<div class="main">
	<header>
			<div class="cabecalho">
				<div class="logo-music-park"></div>
				<a href="http://www.musicpark.com.br" class="btn btn-primary btn-lg">IR PARA O INÍCIO</a>
			</div>
	</header>

	<div class="jumbotron">
		<h3>Lista de cadastro corporativo</h3>
	</div>
	<table class="table table-striped" id="tabela">
		

		<?

		echo '<a href="javascript: history.go(0)" class="fa fa-refresh"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '<i class="fa fa-filter"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '<a href="http://www.musicpark.com.br/corporativo/listaCorporativo.php?local=jurere" class="">Jurerê |&nbsp;';
		echo '<a href="http://www.musicpark.com.br/corporativo/listaCorporativo.php?local=BC" class="">Balneário Camburiú |&nbsp;';
		echo '<a href="http://www.musicpark.com.br/corporativo/listaCorporativo.php?local=Todos" class="">Todos';

			if ($_GET['local'] == 'jurere') {
				include "tabelaCorporativo_Jurere.php";
			}
			else if ($_GET['local'] == 'BC') {
				include "tabelaCorporativo_BC.php";
			}
			else if ($_GET['local'] == 'Todos') {
				include "tabelaCorporativo.php";
			}
			else{
				include "tabelaCorporativo.php";
			}


		?>



	</table>
</div>

</body>
</html>