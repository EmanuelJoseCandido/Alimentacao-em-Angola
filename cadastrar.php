<!DOCYTPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Cadastrar</title>
			<link rel="stylesheet" type="text/css" href="_css/styleContacto.css"/>
			<link rel="stylesheet" type="text/css" href="_css/stylePrincipal.css"/>
			<style type="text/css">
			
				#again
				{
					position: absolute;
					margin-top: -100px;
					margin-left: 255px;

				}

				#again1
				{
					position: absolute;
					margin-top: -110px;
					margin-left: 325px;

				}

				#again2
				{
					position: absolute;
					margin-top: -110px;
					margin-left: 340px;

				}

				#again3
				{
					position: absolute;
					margin-top: -90px;
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
					<h1>Cadastrar Usuários</h1>
					<article id="primeiro">	
					 		<div id="div-contacto">	
								<div id="cont">
									<?php

										echo 
										'
											<form id="form-entrar" method="post" action="">
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
														<input type="submit" name="Cadastrar" id="idEntrar"  value="Cadastrar">
													</p>

												</fieldset>
											</form>
										';

										if (isset($_POST['Cadastrar'])) 
										{
											$db = mysqli_connect('localhost', 'root', '') or die ('Erro ao conectar <strong>'.mysqli_error().'<strong>');
											$dados = mysqli_select_db($db,'alimenta_angola') or die ('Erro ao seleccionar o banco <strong>'.mysqli_error().'<strong>');
											
											$usuario = isset($_POST['Usuario']) ? $_POST['Usuario']:0; 
											$password = md5(isset($_POST['Password']) ? $_POST['Password']:0);
											$pass = (isset($_POST['Password']) ? $_POST['Password']:0);

											if (empty($usuario) and (empty($pass))) 
											{
												echo '';
											}
											else if (empty($usuario) and (!empty($pass))) 
											{
												echo '<div id="again">Tente novamente, <span><label for="iduser">usuario</label></span> ou <span><label for="idPassword">password</label></span> inválida.</div>';
											}
											else if (!empty($usuario) and (empty($pass))) 
											{
												echo '<div id="again">Tente novamente, <span><label for="iduser">usuario</label></span> ou <span><label for="idPassword">password</label></span> inválida.</div>';
											}
											else
											{

												$cadastra = mysqli_query($db,"INSERT INTO Conta (Usuario, Password) VALUES ('$usuario', '$password')");

												if ($cadastra) 
												{
													echo '<div id="again1">';
													echo "<br>Conta cadastrada com sucesso!";
										   			echo '</div>';
												}
												else
												{
													echo '<div id="again2"><span>Erro ao cadastrar os dados!</span></div>';
													echo '<div id="again3">Este usuário já está cadastrado, tente outro nome.</div>'; 
												}
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
