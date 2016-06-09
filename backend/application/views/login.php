<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<body class="homepage">
	<div id="page-wrapper">

		<!-- Banner -->
			<section id="banner">
				<header>
					<h2><strong>Login</strong></h2>
				</header>
				<form action="<?php echo base_url(); ?>/index.php/usuario_controller/login" method="post">
					<div class="form-login">
						<p>
							<input type="text" id="nomeid" placeholder="Usuário/Email" required="required" name="usuario" size="50" />
						</p>
						<p>
							<input type="password" id="senha" placeholder="Senha" required="required" name="senha" size="50" />
						</p>
						<p>
							<input type="submit" value="Submit">
						</p>
						<p>
							Não possui login? <a href="#artista">Cadastre-se</a>.
						</p>
					</div>
				</form>
			</section>

	</div>

