<!--Autor: Emanuel Cândido -->
<!-- Todos os direitos reservados.-->
<!-- EC-Corporation-->

 <!DOCYTPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Contacto</title>
			<link rel="stylesheet" type="text/css" href="_css/styleContacto.css"/>
			<link rel="stylesheet" type="text/css" href="_css/stylePrincipal.css"/>
			<style type="text/css">
			
				#again
				{
					position: absolute;
					margin-top: -100px;
					margin-left: 255px;

				}

				span
				{
					color: red;
				}

			</style>
		</head>
		
		<body>
			<div id="corpo-da-pagina">
				<header>
					<a href="index.php"><img src="_galeria/_imagens/logotipo.png"></a>
					<nav id="menu">
						<h2>Menu Principal</h2>
						<ul>
							<li><a href="index.php">Casa |</a></li>
							<li><a href="historial.php">Historial |</a></li>
							<li><a href="servicos.php">Serviços |</a></li>
							<li><a href="projectos.php">Projectos |</a></li>
							<li><a href="contacto.php">Contacto |</a></li>
						</ul>
					</nav>
				</header>
				<section id="principal">
					<h1>Entrar</h1>
					<article id="primeiro">	
					 		<div id="div-contacto">	
								<div id="cont">
									<?php
										echo 
										'
											<form id="form-entrar" method="post" action="adm.php">
												<fieldset id="fiel-entrar">
											
													<p>
														<label for="iduser">Usuario <span class="asteristico">*</span>:</label><br>
														<input type="text" name ="Usuario" id="iduser" size="50" placeholder="Digite o seu nome...">
													</p>
													
													<p>
														<label for="idPassword">Password <span class="asteristico">*</span>: </label><br>
														<input type="password" name="Password" id="idPassword" size="50" placeholder="Digite aqui a sua Password...">
													</p>
											
													
													<p>
														<input type="submit" name="Entrar" id="idEntrar"  value="Entrar">
													</p>
								
												</fieldset>
											</form>
										';

										if (isset($_POST['Entrar'])) 
										{
											$usuario = isset($_POST['Usuario']) ? $_POST['Usuario']:0; 
											$password = isset($_POST['Password']) ? $_POST['Password']:0;

											if (($usuario == "Emanuel Cândido") and ($password == "Emanuel12")) 
											{
												header('Location: manipular.php');
											}
											else
											{
												echo '<div id="again">Tente novamente, <span><label for="iduser">usuario</label></span> ou <span><label for="idPassword">password</label></span> inválida.</div>';
											}
										}
										
									?>
								</div>
							</div>
					</article>
					<footer id="rodape">
						<p>Todos os direitos reservados <br> Copyright &copy; 2018 - by <a href="autor.php">Emanuel Cândido</a></p>
					</footer>
				</div>
			</div>
		</body>
	</html>