<!DOCTYPE html>
<html lang="pt-br" ng-app="Corporativo">
<head>
	<title>Music Park - Eventos Corporativos</title>

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
	<link rel="stylesheet" type="text/css" href="css/font-awesome-4.3.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/cadastro_style.css">

	<!--[if lt IE 9]>
		<script src = "js/html5shiv.min"></script>
	<![endif]-->

	<script>
	function msieversion() { // If Internet Explorer  
	    var ua = window.navigator.userAgent;
	    var msie = ua.indexOf("MSIE ");
	    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:9\./)){
	    	alert("Este site não suporta essa versão do Internet Explorer!\nPor favor atualize seu browser ou tente com outro browser.");
	    };
	};
	</script>

	<script src="js/angular.js"></script>
	<script src="js/ngMask.min.js"></script>

	<script>
		angular.module("Corporativo", ["ngMask"]);
		angular.module("Corporativo").controller("CorporativoCtrl", function ($scope){
			$scope.infos = [
				{nomes: ""}
			];
			$scope.localEvento = [
				{local: "Jurerê"},
				{local: "Balneário Camboriú"}
			];
			$scope.tipoEvento = [
				{tipo: "Casamento"},
				{tipo: "Jantar"},
				{tipo: "Desfile"},
				{tipo: "Formatura"},
				{tipo: "Aniversário"},
				{tipo: "Congresso"},
				{tipo: "Convenção"},
				{tipo: "Workshop"},
				{tipo: "Coquetel"},
				{tipo: "Personalize"}
			];
			$scope.mensagemArmazenada = [
				{mensagemModel: ""}
			];
		});
	</script>

</head>

<body onload="msieversion()">

	<main ng-controller="CorporativoCtrl" class="main-class">
		<header>
			<div class="cabecalho">
				<div class="logo-music-park"></div>
				<a href="http://www.musicpark.com.br" class="btn btn-primary btn-lg">IR PARA O INÍCIO</a>
			</div>
		</header>

		<section>
			<div class="formulario">
				<div class="formulario-central">
					<h1>Faça seu evento no Music Park</h1>
					<div class="eventos">
						<div class="linha-eventos"></div>
						<div class="seta-lista-eventos"></div>
						<ul class="eventos-lista">
							<li class="eventos-icones"><img src="img/casamento.png"> 	&nbsp;Casamento</li>
							<li class="eventos-icones"><img src="img/jantar.png"> 		&nbsp;Jantar</li>
							<li class="eventos-icones"><img src="img/desfile.png"> 		&nbsp;Desfile</li>
							<li class="eventos-icones"><img src="img/formatura.png"> 	&nbsp;Formatura</li>
							<li class="eventos-icones"><img src="img/aniversario.png"> 	&nbsp;Aniversário</li>
							<li class="eventos-icones"><img src="img/congresso.png"> 	&nbsp;Congresso</li>
							<li class="eventos-icones"><img src="img/convencao.png"> 	&nbsp;Convenção</li>
							<li class="eventos-icones"><img src="img/workshop.png"> 	&nbsp;Workshop</li>
							<li class="eventos-icones"><img src="img/coquetel.png"> 	&nbsp;Coquetel</li>
							<li class="eventos-icones"><img src="img/personalize.png"> 	&nbsp;Personalize</li>
						</ul>
					</div>
					
					<form name="formInfo" action="infoCorporativos.php?validar=true" method="post">
						<!--Nome-->
						<div style = "position:relative;">
							<input class="form-control" type="text" placeholder="Nome" ng-model="nomes" name="nomeCampo" ng-required="true" ng-minlength="4" ng-maxlength="35" maxlength="36" ng-pattern="^[\\p{L} .'-]+$">
							<div ng-show = "formInfo.nomeCampo.$invalid && formInfo.nomeCampo.$dirty" class = "fa fa-times" style = "color: red; width: 20px; heigth: 20px; position:absolute; top: 20px; right:30px; font-size:30px;"/></div>
							<div ng-show = "formInfo.nomeCampo.$error.pattern" class = "alert alert-danger" style="top: 10px; left: 640px; position: absolute;">O nome não deve conter números ou caracteres especiais.</div>
							<div ng-show = "formInfo.nomeCampo.$error.maxlength && formInfo.nomeCampo.$dirty" class = "alert alert-danger" style="top: 10px; left: 520px; position: absolute;">O número máximo de caracteres foi excedido!</div>
							<div ng-show = "formInfo.nomeCampo.$valid" class = "fa fa-check" style = "color: green; top: 20px; right: 30px; width: 20px; heigth:20px; position: absolute; font-size:30px;"></div>
						</div>
						<!--Email-->
						<div style = "position:relative;">
							<input class="form-control" type="text" placeholder="Email" ng-model="email" name="emailCampo" ng-required="true" ng-pattern="/\b[\w]+@[\w]+\.[\w]+/" ng-maxlength="60" maxlenght="61">
							<div ng-show = "formInfo.emailCampo.$error.maxlength && formInfo.nomeCampo.$dirty" class = "alert alert-danger" style="top: 10px; left: 520px; position: absolute;">O número máximo de caracteres foi excedido!</div>
							<div ng-show = "formInfo.emailCampo.$invalid && formInfo.emailCampo.$dirty" class = "fa fa-times" style = "color: red; width: 20px; heigth: 20px; position:absolute; top: 20px; right:30px; font-size:30px;"/></div>
							<div ng-show = "formInfo.emailCampo.$valid" class = "fa fa-check" style = "color: green; top: 20px; right: 30px; width: 20px; heigth:20px; position: absolute; font-size:30px;"></div>
						</div>
						<!--Telefone-->
						<div style = "position:relative;">
							<input class="form-control" type="text" placeholder="Telefone" ng-model="telefone" name="telefoneCampo" ng-required="true" mask="(99) 9?9999-9999">
							<div ng-show = "formInfo.telefoneCampo.$error.mask" class = "alert alert-danger" style="top: 10px; left: 520px; position: absolute;">Digite somente números.</div>
							<div ng-show = "formInfo.telefoneCampo.$invalid && formInfo.telefoneCampo.$dirty" class = "fa fa-times" style = "color: red; width: 20px; heigth: 20px; position:absolute; top: 20px; right:30px; font-size:30px;"/></div>
							<div ng-show = "formInfo.telefoneCampo.$valid" class = "fa fa-check" style = "color: green; top: 20px; right: 30px; width: 20px; heigth:20px; position: absolute; font-size:30px;"></div>
						</div>
						<!--Data do Evento-->
						<div style = "position:relative;">
							<input class="form-control" type="text" placeholder="Data do Evento" ng-model="dataEvento" name="datEventoCampo" ng-required="true" mask="99/99/9999" ng-pattern="/^((((0?[1-9]|1\d|2[0-8])\/(0?[1-9]|1[0-2]))|((29|30)\/(0?[13456789]|1[0-2]))|(31\/(0?[13578]|1[02])))\/((20|20)?([1][5-9]|[2-9][0-9])))$|((29\/0?2\/)((20|20)?(0[48]|[2468][048]|[13579][26])|(20)00))$/">
							<div ng-show = "formInfo.datEventoCampo.$error.pattern" class = "alert alert-danger" style="top: 10px; left: 520px; position: absolute;">Digite somente números e uma data válida.</div>
							<div ng-show = "formInfo.datEventoCampo.$invalid && formInfo.datEventoCampo.$dirty" class = "fa fa-times" style = "color: red; width: 20px; heigth: 20px; position:absolute; top: 20px; right:30px; font-size:30px;"/></div>
							<div ng-show = "formInfo.datEventoCampo.$valid" class = "fa fa-check" style = "color: green; top: 20px; right: 30px; width: 20px; heigth:20px; position: absolute; font-size:30px;"></div>
						</div>
						<!--Local-->
						<div style = "position:relative;">
							<select class="form-control" style="color:#e7af19;" name="localEvento" ng-model="localEventoModel" ng-options="itemLocalEvento.local for itemLocalEvento in localEvento" ng-required="true">
								<option value = "">Selecione um local</option>
							</select>
						</div>
						<!--Tipo de Evento-->
						<div style = "position:relative;">
							<select class="form-control" style="color:#e7af19;" name="tipoEvento" ng-model="tipoEventoModel" ng-options="itemTipoEvento.tipo for itemTipoEvento in tipoEvento" ng-required="true">
								<option value = "">Selecione o tipo de evento</option>
							</select>
						</div>
						<!--Numero de Pessoas-->
						<div style = "position:relative;">
							<input class="form-control" type="text" placeholder="Número de pessoas" ng-model="numeroPessoasModel" name="numeroPessoasCampo" ng-required="true" maxlength="5" ng-pattern="/^\d{2,5}$/" mask="9?9?9?9?9?">
							<div ng-show = "formInfo.numeroPessoasCampo.$error.pattern" class = "alert alert-danger" style="top: 10px; left: 520px; position: absolute;">Digite somente números.</div>
							<div ng-show = "formInfo.numeroPessoasCampo.$invalid && formInfo.numeroPessoasCampo.$dirty" class = "fa fa-times" style = "color: red; width: 20px; heigth: 20px; position:absolute; top: 20px; right:30px; font-size:30px;"/></div>
							<div ng-show = "formInfo.numeroPessoasCampo.$valid" class = "fa fa-check" style = "color: green; top: 20px; right: 30px; width: 20px; heigth:20px; position: absolute; font-size:30px;"></div>
						</div>
						<!--Mensagem-->
						<div style = "position:relative;">
							<textarea class="form-control" style="resize:none; height:200px;" type="text" placeholder="Mensagem" ng-model="mensagemModel" name="mensagemCampo" maxlength="240"></textarea>
							<div ng-show = "formInfo.mensagemCampo" style="top: 175px; left: 465px; position: absolute; color: #fbae17;">{{240 - mensagemModel.length}}</div>
						</div>


						<!--ENVIAR-->
						<input type="submit" value="ENVIAR" class="btn btn-info-enviar" name="sender" ng-disabled="formInfo.$invalid">

						<div class="download-icone">
							<p class="texto-download">Envie seus dados para fazer o download do mapa das casas. </p>
							<p class="fa fa-cloud-download"></p>
						</div>
					</form>	

					<section>
						<div class="videos">
							<figure class="video-jurere">
								<iframe width="400" height="225" src="https://www.youtube.com/embed/o3T9zbTykKE?wmode=transparent;autohide=1" frameborder="0" allowfullscreen></iframe>
							</figure>
							<figure class="video-bc">
								<iframe width="400" height="225" src="https://www.youtube.com/embed/MGY0tY43d74?wmode=transparent;autohide=1" frameborder="0" allowfullscreen></iframe></iframe>
							</figure>
						</div>
					</section>
				</div>	
			</div>
		</section>

		<footer class="rodape">
			<div class="linha"></div>
			<div class="texto-rodape">
				<p class="cidade-class">Music Park Jurerê Internacional&nbsp;-&nbsp;</p>
				<a class="telefone-class">48 3028 9400&nbsp;-</a>
				<a class="email-class">contato@musicpark.com.br</a>
			</div>
			<div class="texto-rodape">
				<p class="cidade-class">Music Park Balneário Camboriú&nbsp;-&nbsp;</p>
				<a class="telefone-class">48 3366 6330&nbsp;-</a>
				<a class="email-class">contato@musicparkbc.com.br</a>
			</div>
		</footer>

	</main>

</body>
</html>