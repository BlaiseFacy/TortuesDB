<?php

if (!isset($_SESSION["theme"]))
{
	// access prix
	$_SESSION["accesPrix"] = "non";
	// tableau des signets
	$_SESSION["tableauSignets"] = array();
	// background
	$_SESSION["theme"] = 'EscherIrise';
}
echo "

<style>

body {
	color: ".$theme["color-text"].";
}
a, a:hover, a:visited {
	color: ".$theme["color-text"].";
}
.bootbox-body {
	color: #000;
}
@media (max-width: 767px) {
	#bs-navbar-collapse-turtle ul li a {
		font-size: 1.5em;
	}
}

/* Barre de navigation claire <nav class=navbar navbar-default role=navigation></nav> */
/* Barre de navigation foncée <nav class=navbar navbar-inverse role=navigation></nav> */

/* Classe principale de la barre de navigation */
.navbar-inverse {
/* Couleur de fond de la barre de navigation */
background-image: url(./pics/fondNav50_marron.png);
border-color: #000;
}
/* Couleur des titres affichés dans la barre */
.navbar-inverse .navbar-brand {
color: #000;
}
/* Couleur utilisée lors du passage de la souris sur un titre de la barre */
.navbar-inverse .navbar-brand:hover,
.navbar-inverse .navbar-brand:focus {
color: #000;
}
/* Couleur utilisée pour les liens */
.navbar-inverse .navbar-nav > li > a {
color: #777;
font-weight: bold;
}
/* Couleur utilisée pour les liens lorsque la souris passe dessus */
.navbar-inverse .navbar-nav > li > a:hover,
.navbar-inverse .navbar-nav > li > a:focus {
color: #000;
font-weight: bold;
}
/* Couleur utilisée pour le lien actif (celui qui est affiché sur la page) */
.navbar-default .navbar-nav > .active > a, 
.navbar-default .navbar-nav > .active > a:hover, 
.navbar-default .navbar-nav > .active > a:focus {
color: #555;
background-color: #E7E7E7;
}
/* Couleur utilisée pour un menu dépliant lorsqu'il est ouvert */
.navbar-default .navbar-nav > .open > a, 
.navbar-default .navbar-nav > .open > a:hover, 
.navbar-default .navbar-nav > .open > a:focus {
color: #555;
background-color: #FFF;
}
/* Caret */
.navbar-inverse .navbar-nav > .dropdown > a .caret {
border-top-color: #000;
border-bottom-color: #777;
}
.navbar-default .navbar-nav > .dropdown > a:hover .caret,
.navbar-default .navbar-nav > .dropdown > a:focus .caret {
border-top-color: #333;
border-bottom-color: #333;
}
.navbar-default .navbar-nav > .open > a .caret, 
.navbar-default .navbar-nav > .open > a:hover .caret, 
.navbar-default .navbar-nav > .open > a:focus .caret {
border-top-color: #555;
border-bottom-color: #555;
}
/* Version mobile, le menu devient une icône qui déroule une liste avec le menu en vertical */
.navbar-inverse .navbar-toggle {
border-color: #000;
}
.navbar-inverse .navbar-toggle:hover,
.navbar-inverse .navbar-toggle:focus {
background-color: transparent;
}
.navbar-inverse .navbar-toggle .icon-bar {
background-color: #000;
}
@media (min-width: 768px) {
	.navbar-inverse .navbar-nav > li > a:hover,
	.navbar-inverse .navbar-nav > li > a:focus {
	text-shadow: 0px 0px 5px #FFF;
	}
}
@media (max-width: 767px) {
	.navbar-inverse .navbar-nav > li > a {
	color: #999;
	}
	.navbar-inverse .navbar-nav > li > a:hover,
	.navbar-inverse .navbar-nav > li > a:focus {
	color: #FFF;
	}
}

</style>

	<nav class='navbar navbar-inverse' style='margin-bottom:0px;' id='navbar-bootstrap'> <script>/*navbar-fixed-top'>*/</script>
		<div class='container-fluid'>
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class='navbar-header'>
				<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-navbar-collapse-turtle' aria-expanded='false'>
					<span class='sr-only'>Toggle navigation</span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
					<span class='icon-bar'></span>
				</button>
				<a class='navbar-brand' href='./index.php'><img alt='' src='./pics/curseur_turtle32vert.png'></a>
				<a class='navbar-brand' style='font-size:1.5em;' id='titrePage'></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class='collapse navbar-collapse' id='bs-navbar-collapse-turtle' align='center'>
				<ul class='nav navbar-nav'>
					<li><a href='./index.php'>".TXT_HOME."</a></li>
					<li role='separator' class='divider'></li>
					<li><a href='./recherche.php'>".TXT_SEARCH."</a></li>
					<li role='separator' class='divider'></li>
					<li><a href='./statistiques.php'>".TXT_STATS."</a></li>
					<li role='separator' class='divider'></li>
					<li><a href='./infos.php'>Infos</a></li>";
					if (isset($_SESSION["accesPrix"]) && $_SESSION["accesPrix"] == "oui") echo "
						<li class='dropdown'>
						  <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Admin<span class='caret'></span></a>
						  <ul class='dropdown-menu'>
							<li><a href='./maj.php'>Mises à jour</a></li>
							<li><a href='./gestionCouleurs.php'>Gestion Couleurs</a></li>
						  </ul>
						</li>
					";
echo "
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<!-- /#navbar -->
";
?>

<script>
	function checkBackground()
	{
		var bground = '<?php echo $_SESSION["theme"]; ?>';
		if (parent.window.innerWidth < parent.window.innerHeight) document.getElementsByTagName('body')[0].className = bground + '_portrait';
		else document.getElementsByTagName('body')[0].className = bground;
	}
	setTimeout('checkBackground();',200);
</script>
