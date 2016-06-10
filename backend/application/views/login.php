<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<body class="homepage">
	<div id="page-wrapper">

		<!-- Banner -->
			<section id="banner" style="background: #6d7a69;color: #bec4bc !important;">
				<header>
					<h2><strong style="color: #bec4bc;">Login</strong></h2>
				</header>
				<form action="<?php echo base_url(); ?>index.php/usuario_controller/login" method="post">
					<div class="form-login">
						<?php
							if($haserro == true) {
								echo '<p class="erro">' . $erro . '</p>';
							}
						?>
						<p>
							<input type="text" id="usuario" placeholder="Usuário/Email" required name="usuario" size="50" />
						</p>
						<p>
							<input type="password" id="senha" placeholder="Senha" required name="senha" size="50" />
						</p>
						<p>
							<input type="submit" value="Login">
						</p>
						<p>
							Não possui login? <a href="<?php echo base_url(); ?>index.php/usuario_controller/entrar_cadastro">Cadastre-se</a>.
						</p>
					</div>
				</form>
			</section>

	</div>

<style>
body {
	background: #6d7a69;
}
</style>