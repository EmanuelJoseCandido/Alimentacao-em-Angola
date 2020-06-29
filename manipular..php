<!DOCYTPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Contacto</title>
			<link rel="stylesheet" type="text/css" href="_css/styleContacto.css"/>
			<link rel="stylesheet" type="text/css" href="_css/stylePrincipal.css"/>
			<style type="text/css">

				#idMensagem
				{
					width: 300px;
					height: 100px;
				}

				form#contacto
				{
					margin-top: -400px;
					color: #000;
					height:  290px;	
					width: 500px;
					margin-left: 200px;
					border: 3px solid #7ac143;
					transition: 1s;
				}

				form#contacto:hover
				{
					background-color: #7ac143;
					transition: 1s;
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
					<h1>Aréa Administrativa</h1>
					<article id="primeiro">	
					 		<div id="div-contacto">	
								<div id="cont2">
									<?php

										if(!empty($_POST['Usuario']) and !empty($_POST['Password']))
										{
											header('Location: adm.php');
										}
										else
										{
											echo '<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>';

											$db = mysqli_connect('localhost', 'root', '') or die ('Erro ao conectar <strong>'.mysqli_error().'<strong>');
											$dados = mysqli_select_db($db,'alimenta_angola') or die ('Erro ao seleccionar o banco <strong>'.mysqli_error().'<strong>');

											$uid = mysql_real_escape_string($_GET['Id']);
											$nome = isset($_POST['Nome']) ? $_POST['Nome']:0; 
											$email = isset($_POST['Email']) ? $_POST['Email']:0;
											$mensagem = isset($_POST['Mensagem']) ? $_POST['Mensagem']:0;

											if(isset($_POST['Cadastar']))
											{
												$qrr = "UPDATE Contacto SET Nome = '$nome', Email = '$email', Mensagem = '$mensagem' WHERE Id = '$uid' ";

												$exe = mysqli_query($db, $qrr) or die (mysql_error());

												if($exe)
												{
													echo 'Actualizado com sucesso';
													header('Location: manipular.php');
												}

												echo "<hr/>";
											}

											$query = "SELECT * FROM Contacto WHERE Id = '$uid' ";
											$exeqr = mysqli_query($db, $query) or die (mysql_error());

											if (mysqli_num_rows($exeqr) <= 0) 
											{
												header('Location: manipular.php');
											}

											$res = mysqli_fetch_assoc($exeqr);


											echo 
												'
												<form id="contacto" method="post" action="">
													<fieldset id="fiel-contacto">
												
														<p>
															<label for="idNome">Nome: </label><br>
															<input type="text" name ="Nome" id="idNome" size="50" placeholder="Digite os seu nome completo..." value="'.$res['Nome'].'">
														</p>
														
														<p>
															<label for="idEmail">Email<span class="asteristico">*</span>: </label><br>
															<input type="email" name="Email" id="idEmail" size="50" placeholder="exemplo@exemplo.com" value="'.$res['Email'].'">
														</p>
														
														<p>
															<label for="idMensagem">Mensagem<span class="asteristico">*</span>: </label><br>
															<textarea type="text" name="Mensagem" id="idMensagem" cols="35" rows="5" placeholder="Digite a sua mensagem aqui...">'.$res['Mensagem'].'</textarea
														</p>
														
														<p>
															<input type="submit" name="Cadastar" id="idEnviar" value="Editar">
														</p>
													
													</fieldset>
												</form>
											';
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