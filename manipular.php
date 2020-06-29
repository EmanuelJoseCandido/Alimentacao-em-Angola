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
				
				#cont2
				{
					margin-top: -450px;
					text-align: center;
				}

				#fi
				{
					margin-left: 200px;
				}

				#hh
				{
					margin-bottom: 50px;
				}

				#tabela1
				{
					margin-left: 240px;
					margin-top: 50px;
					text-align: center;
				}

				th
				{
					padding: 6px 15px 6px 15px;
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


											if(!empty($_GET['Del']))
											{
												$delId = mysql_escape_string($_GET['Del']);
												$queryDel = "DELETE FROM Contacto WHERE id = '$delId'";
												$exeqrDel = mysqli_query($db, $queryDel) or die (mysql_error());

												if ($exeqrDel) 
												{
													echo 'Removido com sucesso<br/>';
												}
											}

											$query = "SELECT * FROM Contacto WHERE Id !='' GROUP BY Id ORDER BY Id DESC LIMIT 50 OFFSET 0";
											$exeqr = mysqli_query($db, $query) or die (mysql_error());

											if (!empty($_GET['Id'])) 
											{
												$uid = mysql_escape_string($_GET['Id']);
												$queryDois = "SELECT * FROM Contacto WHERE Id ='$uid'";
												$exeqrDois = mysqli_query($db, $queryDois) or die (mysql_error());
												$assoc = mysqli_fetch_assoc($exeqrDois);

													echo '<fieldset id="fi" style="width:500px; margin-bottom:15px;">';
													echo '<h1 id="hh">'.$assoc['Nome'].'</h1>';
													echo '<p>Data de envio: '.$assoc['Data'].'</p>';
													echo '<p>Email: '.$assoc['Email'].'</p>';
													echo '<p>Mensagem: '.$assoc['Mensagem'].'</p>';
													echo '<a href="manipular.php">Voltar</a>';
													echo '</fieldset>';
											}
											

											echo 'Nossa pesquisa retornou '. mysqli_num_rows($exeqr).' resultados. Temos em nossa tabela';
											echo ' '.mysqli_num_fields($exeqr).' colunas.';

											if(mysqli_num_rows($exeqr) <= 0)
											{
												echo'<br>Tabela Vazia';
											}
											else
											{
												echo '<table border="1" id="tabela1">';
												while ($res = mysqli_fetch_assoc($exeqr))
												{
													echo '<tr>';
													echo '<th>'.$res['Nome'].'</th>';
													echo '<th><a href="manipular.php?Id='.$res['Id'].'">Ver</a></th>';
													echo '<th><a href="manipular..php?Id='.$res['Id'].'">Editar</a></th>';
													echo '<th><a href="manipular.php?Del='.$res['Id'].'">Excluir</a></th>';
													echo '</tr>';
													
												}
												echo '</table>';
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