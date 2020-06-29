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
					<h1>Contacte-nos</h1>
					<article id="primeiro">	
					 		<div id="div-contacto">	
								<div id="cont">
									<?php

										echo '<meta http-equiv="Content-Type" content="text/html"; charset="utf-8"/>';

										$db = mysqli_connect('localhost', 'root', '') or die ('Erro ao conectar <strong>'.mysqli_error().'<strong>');
										$dados = mysqli_select_db($db,'alimenta_angola') or die ('Erro ao seleccionar o banco <strong>'.mysqli_error().'<strong>');

										$nome = isset($_POST['Nome']) ? $_POST['Nome']:0; 
										$email = isset($_POST['Email']) ? $_POST['Email']:0;
										$mensagem = isset($_POST['Mensagem']) ? $_POST['Mensagem']:0;
										#date_default_timezone_set("Africa/Luanda");
										date_default_timezone_set("Europe/Amsterdam");
										$data = date('Y-m-d // H:i:s');

										if (empty($nome))
										{
											$n2 = "<br>Sr(a). Anónimo.";
											$n1 = 'Anónimo';
											$nome = $n1;
										}
										else
										{
											$n2 = "<br>Sr(a). $nome.";
											$n1 = $nome;
										}
										
										if(($email == "") && ($mensagem == ""))
										{
											echo '
											<form id="form-contacto" method="post" action="contacto..php">
												<fieldset id="fiel-contacto">
											
													<p>
														<label for="idNome">Nome: </label><br>
														<input type="text" name ="Nome" id="idNome" size="50" value="'.$n1.'" placeholder="Digite os seu nome completo...">
													</p>
													
													<p>
														<label for="idEmail">Email<span class="asteristico">*</span>: </label><br>
														<input type="email" name="Email" id="idEmail" size="50" placeholder="Este Campo é Obrigatório, Digite o seu Email.">
													</p>
													
													<p>
														<label for="idMensagem">Mensagem<span class="asteristico">*</span>: </label><br>
														<textarea name="Mensagem" id="idMensagem" cols="35" rows="5" placeholder="Este Campo é Obrigatório, Digite a sua mensagem aqui..."></textarea>
													</p>
													
													<p>
														<input type="submit" name="Cadastar" id="idEnviar" value="Enviar">
													</p>
												
												</fieldset>
											</form>';
										}
										else if (($email == "") && ($mensagem != "")) 
										{
											echo '
											<form id="form-contacto" method="post" action="contacto..php">
												<fieldset id="fiel-contacto">
											
													<p>
														<label for="idNome">Nome: </label><br>
														<input type="text" name ="Nome" id="idNome" size="50" value="'.$n1.'" placeholder="Digite os seu nome completo...">
													</p>
													
													<p>
														<label for="idEmail">Email<span class="asteristico">*</span>: </label><br>
														<input type="email" name="Email" id="idEmail" size="50" placeholder="Este Campo é Obrigatório, Digite o seu Email.">
													</p>
													
													<p>
														<label for="idMensagem">Mensagem<span class="asteristico">*</span>: </label><br>
														<textarea name="Mensagem" id="idMensagem" cols="35" rows="5" placeholder="Este Campo é Obrigatório, Digite a sua mensagem aqui...">'.$mensagem.'</textarea>
													</p>
													
													<p>
														<input type="submit" name="Cadastar" id="idEnviar" value="Enviar">
													</p>
												
												</fieldset>
											</form>

											<p>
												<a href="adm.php"><input type="submit" name="Adm" id="idAdm" value="ADM"></a>
											</p>';
										}
										else if (($email != "") && ($mensagem == "")) 
										{
											echo '
											<form id="form-contacto" method="post" action="contacto..php">
												<fieldset id="fiel-contacto">
											
													<p>
														<label for="idNome">Nome: </label><br>
														<input type="text" name ="Nome" id="idNome" size="50" value="'.$n1.'" placeholder="Digite os seu nome completo...">
													</p>
													
													<p>
														<label for="idEmail">Email<span class="asteristico">*</span>: </label><br>
														<input type="email" name="Email" id="idEmail" size="50" value="'.$email.'" placeholder="Este Campo é Obrigatório, Digite o seu Email.">
													</p>
													
													<p>
														<label for="idMensagem">Mensagem<span class="asteristico">*</span>: </label><br>
														<textarea name="Mensagem" id="idMensagem" cols="35" rows="5" placeholder="Este Campo é Obrigatório, Digite a sua mensagem aqui..."></textarea>
													</p>
													
													<p>
														<input type="submit" name="Cadastar" id="idEnviar" value="Enviar">
													</p>
												
												</fieldset>
											</form>

											<p>
												<a href="adm.php"><input type="submit" name="Adm" id="idAdm" value="ADM"></a>
											</p>
											';
										}
										else
										{
											if(isset($_POST['Cadastar']))
											{
												$cadastra = mysqli_query($db,"INSERT INTO Contacto (Nome, Email, Mensagem, Data) VALUES ('$nome', '$email', '$mensagem', '$data')") or die ('Erro ao cadastrar'.mysql_error());

												if ($cadastra) 
												{
													echo '<div id="cad2">';
													echo  $n2;
													echo "<br>Enviaremos a resposta em seu email: $email.";
										   			echo "<br>A mensagem será analizada pelos nossos especialista e posteriomente será enviada a sua resposta.";
										   			echo '</div>';
												}
												else
												{
													echo'Erro ao cadastrar os dados!';
												}

													echo 
										   			'
										   				<form id="form-contacto" method="post" action="contacto..php">
															<fieldset id="fiel-contacto">
														
																<p>
																	<label for="idNome">Nome: </label><br>
																	<input type="text" name ="Nome" id="idNome" size="50" placeholder="Digite os seu nome completo...">
																</p>
																
																<p>
																	<label for="idEmail">Email<span class="asteristico">*</span>: </label><br>
																	<input type="email" name="Email" id="idEmail" size="50" placeholder="exemplo@exemplo.com">
																</p>
																
																<p>
																	<label for="idMensagem">Mensagem<span class="asteristico">*</span>: </label><br>
																	<textarea name="Mensagem" id="idMensagem" cols="35" rows="5" placeholder="Digite a sua mensagem aqui..."></textarea>
																</p>
																
																<p>
																	<input type="submit" name="Cadastar" id="idEnviar" value="Enviar">
																</p>
															
															</fieldset>
														</form>

														<p>
															<a href="adm.php"><input type="submit" name="Adm" id="idAdm" value="ADM"></a>
														</p>
										   			';
											}
										}
									?>
								</div>
							</div>
					</article>

					<article id="segundo">
						<div id="segundo1">
							<h2>Escritório</h2>
							<p>Telefone: <a href="tel:+244921815882">+244 921 815 882</a></p>
							<p>Telefone: <a href="tel:+244917815882">+244 917 815 882</a></p>
							<p>Email: <a href="mailto:info@alimentacaoangola.co.ao">info@alimentacaoangola.co.ao</a></p>
						</div>
							
						<div id="segundo2">
							<h2>Perguntas Gerais</h2>
							<p>Telefone: <a href="tel:+244921888705">+244 921 888 705</a></p>
							<p>Telefone: <a href="tel:+244917888705">+244 917 888 705</a></p>
							<p>Email: <a href="mailto:infogeral@alimentacaoangola.co.ao">infogeral@alimentacaoangola.co.ao</a></p>
						</div>
					</article>
				</section>
				
					<footer id="rodape">
						<p><span>Localização da Sede:</span> Benfica, Autodrómo, Rua do N'guvulo, Travessa do Kuito.</p>
						<p>Todos os direitos reservados <br> Copyright &copy; 2018 - by <a href="autor.php">Emanuel Cândido</a></p>
					</footer>
				</div>
			</div>
		</body>
	</html>