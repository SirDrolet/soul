<!DOCTYPE html>
<html lang="es-ES">
<head>
    <!-- META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Pagina creada por DROLET">
    <!-- TITULO -->
	<title>ElJyps • Inicio</title>
	<!-- ICONO -->
	<link rel="shortcut icon" href="https://cdn.discordapp.com/attachments/974789490516303882/1174987878305112135/jypsiconoside.png?ex=656997bc&is=655722bc&hm=cd2b9feeb0c3b7ebbe9cf07d67a8d9d50b4f565ef77e4b4a3d2f6977f141e357&">
	<!-- lINKS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link href="css/sidebar.css?v1.0.15" rel="stylesheet">
	<link href="css/theme.css?v1.0.15" rel="stylesheet">
	<link href="css/libraries/responsive.css?v1.0.15" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- SCRIPTS -->
	<script src="js/theme.js?v1.0.15"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
	<!--SCRIPT DE LOADER-->
	<script>
		$(window).on('load', function () {
			  setTimeout(function () {
			$(".loader-page").css({visibility:"hidden",opacity:"0"})
		  }, 2000);
			 
		});
	</script>
	<!-- ESTILO -->
	<style>
    :root {
    --color-1:#050e14;
    --color-2:#441c49;
    --color-3:#570765;
    --color-4:#000000;
    --color-5:rgba(0, 0, 0, 0.85);
    --text-color-1: #ffffff;
    --text-color-2:  #ffffff;
    --text-color-3:  #ffffff;
    --text-color-4:  #ffffff;
    --text-color-5:  #ffffff;
    --text-color-6:  #fef3e1;
    }
    </style>
	<?php
	$archivo = "archivo.txt";
	$contador = intval(trim(file_get_contents($archivo)));

	$file = fopen($archivo, "w");
	fwrite($file, $contador+1 . PHP_EOL);

	$file = fopen($archivo, "r");
	echo '<div style="position:fixed;bottom:20px;z-index:9;right:20px;background: #ff5a19;padding: 2px 10px;color: #fff;font-size: 30px;border-radius: 20px;">'. fgets($file). '</div>' ;
	fclose($file);
	?>
</head>
<body>
	<div id="app" class="home">
		<div class="loader-page" ><img class="loaderimagen" src="https://cdn.discordapp.com/attachments/1148161567142203432/1168380502621814874/nav.png?ex=65518e23&is=653f1923&hm=5a32a26ad6bf8755a182d71f98dc190600b8b7510b6a82aa88b2a1c4bafe8d2c&%22" alt="Sin Conexcion"></div>
		<nav id="sidebar">
			<div class="sidebar-start">
				<a class="sidebar-image sidebar-link">
				    <span class="icon"><img src="https://cdn.discordapp.com/attachments/974789490516303882/1174987878305112135/jypsiconoside.png?ex=656997bc&is=655722bc&hm=cd2b9feeb0c3b7ebbe9cf07d67a8d9d50b4f565ef77e4b4a3d2f6977f141e357&"></span>
				    <span class="text">JYPS</span>
                </a>
			</div>
			<div class="sidebar-middle">
				<a href="index.php" class="sidebar-link opacity-0 "><i class="icon bi bi-house"></i><span class="text">Inicio</span></a>
				<a href="eventos.htm" class="sidebar-link opacity-0 "><i class="icon bi bi-archive"></i><span class="text">Eventos</span> </a>
				<a href="staff.htm" class="sidebar-link opacity-0  active "><i class="icon bi bi-person-circle"></i><span class="text">Staff</span></a>
				<a href="creaciones.html" class="sidebar-link opacity-0  active "><i class="icon bi bi-bug"></i><span class="text">Descargas</span></a>
				<a href="servicios.html" class="sidebar-link "><i class="icon bi bi-person-fill"></i><span class="text">Contacto</a>
				<button data-toggle="sidebar-dropdown" data-dropdown-target="more" class="sidebar-link opacity-0"></button>
			</div>
			<div class="sidebar-end"></div>
			<div class="sidebar-dropdown-body hide_noanim" data-dropdown-state="no" data-dropdown-id="more"></div>
		</nav>
		<nav id="sidebar-mobile" class="pb-4">
			<a class="sidebar-image sidebar-link" href="index.php"><span class="icon py-4"><img src="https://cdn.discordapp.com/attachments/974789490516303882/1174987878305112135/jypsiconoside.png?ex=656997bc&is=655722bc&hm=cd2b9feeb0c3b7ebbe9cf07d67a8d9d50b4f565ef77e4b4a3d2f6977f141e357&"></span></a>
			<a href="index.php" class="sidebar-link "><i class="icon bi bi-bell-fill"></i><span class="text">Inicio</span></a>
			<a href="eventos.htm" class="sidebar-link "><i class="icon bi bi-balloon-fill"></i><span class="text">Eventos</span></a>
			<a href="staff.htm" class="sidebar-link "><i class="icon bi bi-bag-fill"></i><span class="text">Staff</span></a>
			<a href="creaciones.html" class="sidebar-link "><i class="icon bi bi-bookmark-fill"></i><span class="text">Descargas</span></a>
			<a href="servicios.html" class="sidebar-link "><i class="icon bi bi-person-fill"></i><span class="text">Contacto</a>
            <div data-toggle="close-sidebar" class="sidebar-close"><i class="bi bi-x-lg"></i></div>
        </nav>
</body>
<main id="content">
    <div class="content-wrapper">
		<div class="position-absolute top-50 end-0 translate-middle-y"><img class="imagen" id="imagen" src="https://cdn.discordapp.com/attachments/974789490516303882/1174987929085542441/image0.jpg?ex=656997c8&is=655722c8&hm=d1ddac71104b7652ad1d6b5227aab080735cf3cf8d7e188c93e982c03979cb32&"></div>
		<div style="padding-bottom:100px;" class="area">
			<div id="topbar-mobile">
                <div class="d-flex align-items-center">
                    <button data-toggle="open-sidebar" class="btn" type="button">
                        <i class="bi bi-list"></i>
                    </button>
                </div>
            </div>
        </div>
		<div id="a">
			<div id="jyps">
			  <p>Quien Soy Y Que Hago?</p>
			</div>
			<div id="textot">
			  <p>Yo soy Jhon Yepes, pero todos mis amigos me llaman Jyps. Tengo 26 años, soy colombiano pero vivo actualmente en Alemania. Por ahora, estoy trabajando normalmente como todos los mortales hacemos y también hago streaming y creo contenido en las tardes/noches para interactuar con ustedes y disfrutar de las cosas que hago. De verdad, me alegra mucho que seas parte de nuestra comunidad. </p>
			</div>
		</div>
		<div id="a2">
			<div id="drolet">
			  <p>DROLET</p>
			</div>
			<div id="textot2">
			  <p>Hola soy Drolet,Soy programador semi senior y he querido ayudar a jyps obviamente no le pedi dinero y no este no es mi trabajo un 100% diria que es un 20% no mucho la verdad tambien se los lenguajes PHP,CSS,JS,JAVA,C+,C#,HTML y tambien soy desarollador de video juegos tambien creo eventos de minecraft ahora mismo estoy estudiando ING de sistemas,tambien soy informatico</p>
			</div>
		</div>
    </div>
</main>
</html>